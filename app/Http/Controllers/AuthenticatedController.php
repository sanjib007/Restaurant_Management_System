<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Models\Order;
use App\Models\OrderCancelRequest;
use App\Models\Permission;
use App\Models\Review;
use App\Models\Role;
use App\Models\User;
//use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
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

    public function forgotPassword()
    {
        return view('pages.forgot_password');
    }

    public function postForgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email'
        ], [
            'email.exists' => 'No account found with this email address.'
        ]);

        $token = Str::random(64);

        DB::table('password_resets')->where('email', $request->email)->delete();
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => now()
        ]);

        // Generate immediate reset link for local/developer access or email fallback
        $resetUrl = route('password.reset', ['token' => $token, 'email' => $request->email]);

        return redirect()->back()->with([
            'success' => 'Password reset link generated successfully!',
            'reset_url' => $resetUrl
        ]);
    }

    public function resetPassword(Request $request, $token)
    {
        $email = $request->input('email');
        return view('pages.reset_password', compact('token', 'email'));
    }

    public function postResetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6|confirmed',
            'token' => 'required'
        ]);

        $resetRecord = DB::table('password_resets')
            ->where('email', $request->email)
            ->where('token', $request->token)
            ->first();

        if (!$resetRecord) {
            return redirect()->back()->withErrors(['email' => 'Invalid or expired password reset link.']);
        }

        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        DB::table('password_resets')->where('email', $request->email)->delete();

        return redirect()->route('login')->withSuccess('Your password has been reset successfully! You can now login.');
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
    public function dashboard(Request $request)
    {
        if(Auth::check()){

            $getAllItem = Session::get('orderedItem');
            $deliveryOrders = null;

            $searchOrderNo    = $request->input('search_order_no');
            $searchOrderDate  = $request->input('search_order_date');
            $searchCustomer   = $request->input('search_customer');

            $pendingCancelCount = 0;
            $newOrdersCount = 0;
            $processingOrdersCount = 0;
            $takeawayOrdersCount = 0;
            $presentCustomerOrdersCount = 0;

            if(Auth::user()->isAdmin()){
                $pendingCancelCount = OrderCancelRequest::where('status', 'Pending')->count();
                $newOrdersCount = Order::where('order_status', 'New')->count();
                $processingOrdersCount = Order::where('order_status', 'processing')->count();
                $takeawayOrdersCount = Order::where('order_position', 'takeaway')->count();
                $presentCustomerOrdersCount = Order::where('order_position', 'present')->count();

                $query = Order::with(['user', 'cancelRequest'])->orderBy('orders.id', 'desc');

                if($searchOrderNo) {
                    $query->where('order_number', 'like', '%' . $searchOrderNo . '%');
                }
                if($searchOrderDate) {
                    $query->whereDate('orders.created_at', $searchOrderDate);
                }
                if($searchCustomer) {
                    $query->whereHas('user', fn($q) =>
                        $q->where('name', 'like', '%'.$searchCustomer.'%')
                          ->orWhere('email', 'like', '%'.$searchCustomer.'%')
                    );
                }

                $orderHistory = $query->paginate(7)->appends(
                    $request->only(['search_order_no','search_order_date','search_customer'])
                );
            }else{
                $orderHistory = Order::with(['user', 'cancelRequest'])
                    ->orderBy('id', 'desc')
                    ->where('user_id', '=', Auth::user()->id)
                    ->when($searchOrderNo,   fn($q) => $q->where('order_number', 'like', '%'.$searchOrderNo.'%'))
                    ->when($searchOrderDate, fn($q) => $q->whereDate('created_at', $searchOrderDate))
                    ->paginate(7)
                    ->appends($request->only(['search_order_no','search_order_date']));
            }

            // Delivery staff land on a dashboard listing the home-delivery orders
            // they are responsible for.
            if(!Auth::user()->isAdmin() && Auth::user()->hasRole('delivery')){
                $deliveryOrders = Order::with('user')
                    ->where('order_position', 'home_delivery')
                    ->whereIn('order_status', ['New', 'Processing', 'Completed'])
                    ->orderBy('id', 'desc')
                    ->paginate(10);
            }

            $reportFromDate = $request->input('report_from_date');
            $reportToDate   = $request->input('report_to_date');

            $baseReportQuery = Auth::user()->isAdmin()
                ? Order::query()
                : Order::where('user_id', Auth::user()->id);

            $calcStat = function($q) {
                return [
                    'count' => (clone $q)->count(),
                    'money' => (clone $q)->where('order_status', '!=', 'Cancel')->sum('total_amount')
                ];
            };

            $reportStats = [
                'today'    => $calcStat((clone $baseReportQuery)->whereDate('created_at', now()->toDateString())),
                'weekly'   => $calcStat((clone $baseReportQuery)->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])),
                'monthly'  => $calcStat((clone $baseReportQuery)->whereMonth('created_at', now()->month)->whereYear('created_at', now()->year)),
                'yearly'   => $calcStat((clone $baseReportQuery)->whereYear('created_at', now()->year)),
                'all_time' => $calcStat(clone $baseReportQuery),
            ];

            $customQuery = clone $baseReportQuery;
            if ($reportFromDate) {
                $customQuery->whereDate('created_at', '>=', $reportFromDate);
            }
            if ($reportToDate) {
                $customQuery->whereDate('created_at', '<=', $reportToDate);
            }
            $reportStats['custom'] = $calcStat($customQuery);

            return view('pages.secure.dashboard', compact(
                'getAllItem', 'orderHistory', 'deliveryOrders',
                'searchOrderNo', 'searchOrderDate', 'searchCustomer', 'pendingCancelCount',
                'newOrdersCount', 'processingOrdersCount', 'takeawayOrdersCount', 'presentCustomerOrdersCount',
                'reportStats', 'reportFromDate', 'reportToDate'
            ));
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
            $reviews = DB::select('SELECT r.id as reviewId, r.review_text, r.review_name, r.created_at, u.image, u.name FROM reviews r INNER JOIN users u on u.id = r.user_id WHERE u.id = '.Auth::user()->id.' ORDER BY r.id DESC LIMIT 20');
            return view('pages.secure.profile', compact('orderHistory', 'reviews'));
        }
        return redirect("login")->withSuccess('Opps! You do not have access');
    }

    public function order(Request $request)
    {
        if(Auth::check()){

            $searchOrderNo   = $request->input('search_order_no');
            $searchOrderDate = $request->input('search_order_date');

            $pendingCancelCount = OrderCancelRequest::where('status', 'Pending')->count();

            $baseQuery = fn() => Order::with(['user', 'cancelRequest'])
                ->orderBy('id', 'desc')
                ->when($searchOrderNo,   fn($q) => $q->where('order_number', 'like', '%'.$searchOrderNo.'%'))
                ->when($searchOrderDate, fn($q) => $q->whereDate('created_at', $searchOrderDate));

            $newOrderHistory        = (clone $baseQuery())->where('order_status', 'New')
                                        ->paginate(7, '*', 'new')
                                        ->appends($request->only(['search_order_no','search_order_date']));

            $processingOrderHistory = (clone $baseQuery())->where('order_status', 'processing')
                                        ->paginate(7, '*', 'processing')
                                        ->appends($request->only(['search_order_no','search_order_date']));

            $completedOrderHistory  = (clone $baseQuery())->whereIn('order_status', ['Completed','Cancel'])
                                        ->paginate(7, '*', 'completed')
                                        ->appends($request->only(['search_order_no','search_order_date']));

            return view('pages.secure.order', compact(
                'newOrderHistory', 'processingOrderHistory', 'completedOrderHistory',
                'searchOrderNo', 'searchOrderDate', 'pendingCancelCount'
            ));

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
    public function showItemAndCat(Request $request)
    {
        if(Auth::check()){
            $categories = Category::all();
            $searchFoodName = $request->input('search_food_name');
            $searchCategory = $request->input('search_category');

            $items = Item::select('items.*', 'categories.category_name')
                ->join('categories', 'items.category_id', '=', 'categories.id')
                ->when($searchFoodName, fn($q) => $q->where('items.item_name', 'like', '%'.$searchFoodName.'%'))
                ->when($searchCategory, fn($q) => $q->where('items.category_id', $searchCategory))
                ->orderBy('items.id', 'desc')
                ->paginate(8)
                ->appends($request->only(['search_food_name', 'search_category']));

            return view('pages.secure.Item-insert', compact('categories', 'items', 'searchFoodName', 'searchCategory'));
        }
        return redirect("login")->withSuccess('Opps! You do not have access');
    }
    public function userShow()
    {
        if(Auth::check()){

            $roles = Role::all();
            $permissions = Permission::orderBy('name')->get()->groupBy(function ($permission) {
                return explode('.', $permission->name)[0];
            });

            $users = DB::select('SELECT u.id, u.name as userName, u.email, u.image, r.name as roleName, r.description FROM users u INNER JOIN role_user ru on u.id = ru.user_id INNER JOIN roles r on r.id = ru.role_id');

            return view('pages.secure.user-manage', compact('roles', 'users', 'permissions'));
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
       $sliders = \App\Models\Slider::where('is_active', true)->orderBy('sort_order')->get();
       $featuredItems = \App\Models\Item::take(6)->get();
       $categories = \App\Models\Category::take(4)->get();
       $reviews = \App\Models\Review::orderBy('id', 'desc')->take(3)->get();
       return view('pages.guest.home', compact('sliders', 'featuredItems', 'categories', 'reviews'));
    }
}
