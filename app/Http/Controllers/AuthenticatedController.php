<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Review;
use App\Models\Role;
use App\Models\User;
//use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Session;

class AuthenticatedController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function login()
    {
        return view('pages.login');
    }

    public function register()
    {
        return view('pages.register');
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                        ->withSuccess('You have Successfully loggedin');
        }
  
        return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
    }
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'min:6|required_with:confirm_Password|same:confirm_Password',
            'confirm_Password' => 'min:6'
        ]);
        $imageName = '';
        if($request->has('image')){
            if($image = $request->file('image')){      
              $imageName = time()."-".$image->getClientOriginalName();      
              $image->move("assets/img/profile", $imageName);
      
            }
        }
        $roleName = 'customer';
        if($request->has('roleName')){
            $roleName = $request->roleName;
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'image' => $imageName,
          ]);
          $role = Role::where('name', $roleName)->firstOrFail();
          $user->roles()->attach($role);
    
         if($roleName == 'customer' && $imageName == ''){
            return redirect("dashboard")->withSuccess('Great! You have Successfully loggedin');
         }
         else
         {
            return redirect()->route('user')->withSuccess('Great! You have Successfully loggedin');
         }
        
    }

    public function userImageUpload(Request $request){
        $request->validate([
            'user_image' => 'required',
            'user_id' => 'required',
        ]);

        $getUser = User::findorfail($request->user_id);

        $imageName = '';

        $newImage = $request->file('user_image');

        if($newImage != ''){
            if(file_exists($getUser->image)){
                File::delete($getUser->image);
            }
            $imageName = time()."-".$newImage->getClientOriginalName();
            $newImage->move("assets/img/profile", $imageName);
        }
        $getUser->update([
            'image' => $imageName
        ]);

        return redirect()->route('profile')->withSuccess('Great! You have Successfully.');
    }
    
    public function editUser($id){
        $user = DB::select('SELECT u.id, u.name as userName, u.email, u.image, 
                            r.name as roleName, r.description FROM users u 
                            INNER JOIN role_user ru on u.id = ru.user_id 
                            INNER JOIN roles r on r.id = ru.role_id
                            where u.id ='.$id);
        $roles = Role::all();

        return view('pages.secure.user.editUser', compact('user', 'roles'));
    }

    public function updateUserInfo(Request $request, $id)
    {  
        
        $user = User::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'email' => 'required'
        ]);

        $oldImage = "assets/img/profile/".$user->picture;

        $imageName = '';

        $newImage = $request->file('image');

        if($newImage != ''){
            if(file_exists($oldImage)){
                File::delete($oldImage);
            }
            $imageName = time()."-".$newImage->getClientOriginalName();
            $newImage->move("assets/img/profile", $imageName);
        }else{
            $imageName = $user->image;
        }
        
        
        User::where('id', $id)->update(
            [
              'name' => $request->name,
              'email' => $request->email,
              'password' => $request->file('password') != '' ? Hash::make($request->password) : $user->password,
              'image' => $imageName
            ]
        );

          $role = Role::where('name', $request->roleName)->firstOrFail();

        DB::statement("UPDATE `role_user` SET role_id = '$role->id' WHERE user_id = '$id';");

        return redirect()->route('user')->withSuccess('Great! You have Successfully loggedin');        
    }

    public function deleteUser($id){
        $user = User::findorfail($id);
        $user->delete();
        DB::statement("DELETE From `role_user` WHERE user_id = '$id';");

        return redirect()->route('user')->withSuccess('Great! You have Successfully loggedin');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function dashboard()
    {
        if(Auth::check()){

            $getAllItem = Session::get('orderedItem');
            if(Auth::user()->roles->pluck('name')[0] == "admin"){
                $orderHistory = Order::orderBy('id', 'desc')->paginate(7);
                //dd($orderHistory);
            }else{
                $orderHistory = Order::orderBy('id', 'desc')->where('user_id', '=', Auth::user()->id)->paginate(7);
            }            

            return view('pages.secure.dashboard', compact('getAllItem', 'orderHistory'));
        }
        return redirect("login")->withSuccess('Opps! You do not have access');
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function profile()
    {
        if(Auth::check()){
            $orderHistory = Order::orderBy('id', 'desc')->where('user_id', '=', Auth::user()->id)->paginate(7);
            $reviews = DB::select('SELECT r.id as reviewId, r.review_text, r.review_name, u.image, u.name FROM reviews r INNER JOIN users u on u.id = r.user_id WHERE u.id = '.Auth::user()->id.' ORDER BY r.id DESC LIMIT 20');
            return view('pages.secure.profile', compact('orderHistory', 'reviews'));
        }
        return redirect("login")->withSuccess('Opps! You do not have access');
    }

    public function order()
    {
        if(Auth::check()){

            $newOrderHistory = Order::orderBy('id', 'desc')->where('order_status', '=', 'New')->paginate(7, '*', 'new');
            $processingOrderHistory = Order::orderBy('id', 'desc')->where('order_status', '=', 'processing')->paginate(7, '*', 'processing');
            $completedOrderHistory = Order::orderBy('id', 'desc')->whereIn('order_status', array('Completed','Cancel'))->paginate(7, '*', 'completed');
            return view('pages.secure.order', compact('newOrderHistory', 'processingOrderHistory', 'completedOrderHistory'));

        }
        return redirect("login")->withSuccess('Opps! You do not have access');
    }

    public function reviewInsert(Request $request)
    {
        if(Auth::check()){
            $request->validate([
                'review_text' => 'required'
            ]);

            Review::create([
                'review_text' => $request->review_text,
                'review_name' => Auth::user()->name,
                'user_id' => Auth::user()->id
            ]);           

            return redirect()->route('review')->withSuccess('Review Insert Successfull.');;
        }
        return redirect("login")->withSuccess('Opps! You do not have access');
    }

    public function review()
    {
        if(Auth::check()){

            $reviews = DB::select('SELECT r.id as reviewId, r.review_text, r.review_name, u.image, u.name FROM reviews r INNER JOIN users u on u.id = r.user_id ORDER BY r.id DESC LIMIT 20');
            return view('pages.secure.review', compact('reviews'));
        }
        return redirect("login")->withSuccess('Opps! You do not have access');
    }
    public function showItemAndCat()
    {
        if(Auth::check()){
            $categories = Category::all();
            $items = DB::select("SELECT i.*, c.category_name FROM items i INNER JOIN categories c on i.category_id = c.id");
            return view('pages.secure.Item-insert', compact('categories', 'items'));
        }
        return redirect("login")->withSuccess('Opps! You do not have access');
    }
    public function userShow()
    {
        if(Auth::check()){

            $roles = Role::all();

            $users = DB::select('SELECT u.id, u.name as userName, u.email, u.image, r.name as roleName, r.description FROM users u INNER JOIN role_user ru on u.id = ru.user_id INNER JOIN roles r on r.id = ru.role_id');

            return view('pages.secure.user-manage', compact('roles', 'users'));
        }
        return redirect("login")->withSuccess('Opps! You do not have access');
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */


    public function user_create(array $data)
    {
      $user = User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'image' => $data['image'],
        'password' => Hash::make($data['password'])
      ]);
      $role = Role::where('name', 'customer')->firstOrFail();
      $user->roles()->attach($role);

      return $user;
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }

    public function show_food(){
       return view('pages.guest.food');
    }
}
