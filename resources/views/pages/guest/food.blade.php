@extends('main-layout.main')



@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Our Menu</h1>
          </div>
          <div class="col-sm-6">
            
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="accordion" id="accordionExample">
                <div class="card">
                  <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                      <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Rice Bowl
                      </button>
                    </h2>
                  </div>
              
                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <div class="col-12">
                            <div>
                                <div class="btn-group w-100 mb-2">
                                  <a class="btn btn-info active" href="javascript:void(0)" data-filter="all"> All items </a>
                                  <a class="btn btn-info" href="javascript:void(0)" data-filter="1"> Rice  </a>
                                  <a class="btn btn-info" href="javascript:void(0)" data-filter="2"> Brackfase </a>
                                  <a class="btn btn-info" href="javascript:void(0)" data-filter="3"> Chicken </a>
                                  <a class="btn btn-info" href="javascript:void(0)" data-filter="4"> Salad </a>
                                </div>
                              </div>
                              <div>
                                <div class="filter-container p-0 row">
                                  <div class="filtr-item col-sm-2" data-category="1" data-sort="white sample">
                                    <a href="{{ asset("assets/img/rice/bcr.jfif") }}" data-toggle="lightbox" data-title="BBQ Rice">
                                      <img src="{{ asset("assets/img/rice/bcr.jfif") }}" class="img-fluid mb-2" alt="BBQ Rice"/>
                                    </a>
                                  </div>
                                  <div class="filtr-item col-sm-2" data-category="1" data-sort="black sample">
                                    <a href="#" data-toggle="lightbox" data-title="Biryani">
                                      <img src="{{ asset("assets/img/rice/birayni.jfif") }}" class="img-fluid mb-2" alt="black sample"/>
                                    </a>
                                  </div>
                                  <div class="filtr-item col-sm-2" data-category="1" data-sort="red sample">
                                    <a href="https://via.placeholder.com/1200/FF0000/FFFFFF.png?text=3" data-toggle="lightbox" data-title="sample 3 - red">
                                      <img src="{{ asset("assets/img/rice/plain.jfif") }}" class="img-fluid mb-2" alt="red sample"/>
                                    </a>
                                  </div>
                                  <div class="filtr-item col-sm-2" data-category="1" data-sort="red sample">
                                    <a href="https://via.placeholder.com/1200/FF0000/FFFFFF.png?text=4" data-toggle="lightbox" data-title="sample 4 - red">
                                      <img src="{{ asset("assets/img/rice/veg.jfif") }}" class="img-fluid mb-2" alt="red sample"/>
                                    </a>
                                  </div>
                                  <div class="filtr-item col-sm-2" data-category="2, 4" data-sort="black sample">
                                    <a href="https://via.placeholder.com/1200/000000.png?text=5" data-toggle="lightbox" data-title="sample 5 - black">
                                      <img src="https://via.placeholder.com/300/000000?text=5" class="img-fluid mb-2" alt="black sample"/>
                                    </a>
                                  </div>
                                  <div class="filtr-item col-sm-2" data-category="1" data-sort="white sample">
                                    <a href="https://via.placeholder.com/1200/FFFFFF.png?text=6" data-toggle="lightbox" data-title="sample 6 - white">
                                      <img src="https://via.placeholder.com/300/FFFFFF?text=6" class="img-fluid mb-2" alt="white sample"/>
                                    </a>
                                  </div>
                                  <div class="filtr-item col-sm-2" data-category="1" data-sort="white sample">
                                    <a href="https://via.placeholder.com/1200/FFFFFF.png?text=7" data-toggle="lightbox" data-title="sample 7 - white">
                                      <img src="https://via.placeholder.com/300/FFFFFF?text=7" class="img-fluid mb-2" alt="white sample"/>
                                    </a>
                                  </div>
                                  <div class="filtr-item col-sm-2" data-category="2, 4" data-sort="black sample">
                                    <a href="https://via.placeholder.com/1200/000000.png?text=8" data-toggle="lightbox" data-title="sample 8 - black">
                                      <img src="https://via.placeholder.com/300/000000?text=8" class="img-fluid mb-2" alt="black sample"/>
                                    </a>
                                  </div>
                                  <div class="filtr-item col-sm-2" data-category="3, 4" data-sort="red sample">
                                    <a href="https://via.placeholder.com/1200/FF0000/FFFFFF.png?text=9" data-toggle="lightbox" data-title="sample 9 - red">
                                      <img src="https://via.placeholder.com/300/FF0000/FFFFFF?text=9" class="img-fluid mb-2" alt="red sample"/>
                                    </a>
                                  </div>
                                  <div class="filtr-item col-sm-2" data-category="1" data-sort="white sample">
                                    <a href="https://via.placeholder.com/1200/FFFFFF.png?text=10" data-toggle="lightbox" data-title="sample 10 - white">
                                      <img src="https://via.placeholder.com/300/FFFFFF?text=10" class="img-fluid mb-2" alt="white sample"/>
                                    </a>
                                  </div>
                                  <div class="filtr-item col-sm-2" data-category="1" data-sort="white sample">
                                    <a href="https://via.placeholder.com/1200/FFFFFF.png?text=11" data-toggle="lightbox" data-title="sample 11 - white">
                                      <img src="https://via.placeholder.com/300/FFFFFF?text=11" class="img-fluid mb-2" alt="white sample"/>
                                    </a>
                                  </div>
                                  <div class="filtr-item col-sm-2" data-category="2, 4" data-sort="black sample">
                                    <a href="https://via.placeholder.com/1200/000000.png?text=12" data-toggle="lightbox" data-title="sample 12 - black">
                                      <img src="https://via.placeholder.com/300/000000?text=12" class="img-fluid mb-2" alt="black sample"/>
                                    </a>
                                  </div>
                                </div>
                              </div>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="headingTwo">
                    <h2 class="mb-0">
                      <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Checken Item
                      </button>
                    </h2>
                  </div>
                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                        <form>
                            <div class="form-row">
                              <div class="col-7">
                                Checken Masala .......... 300/-
                              </div>
                              <div class="col">
                                <input type="text" class="form-control" placeholder="State">
                              </div>
                              <div class="col">
                                <input type="text" class="form-control" placeholder="Zip">
                              </div>
                            </div>
                          </form>
                          <form>
                            <div class="form-row">
                              <div class="col-7">
                                Fried Checken .......... 300/-
                              </div>
                              <div class="col">
                                <input type="text" class="form-control" placeholder="State">
                              </div>
                              <div class="col">
                                <input type="text" class="form-control" placeholder="Zip">
                              </div>
                            </div>
                          </form>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                      <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Collapsible Group Item #3
                      </button>
                    </h2>
                  </div>
                  <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                      And lastly, the placeholder content for the third and final accordion panel. This panel is hidden by default.
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->


    

  </div>
  <!-- /.content-wrapper -->



@endsection

