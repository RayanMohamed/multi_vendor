@extends('admin.layout.layout')
@section('content')

<div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Settings</h3>        
                </div>
                <div class="col-12 col-xl-4">
                 <div class="justify-content-end d-flex">
                  <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                    <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                     <i class="mdi mdi-calendar"></i> Today (10 Jan 2021)
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                      <a class="dropdown-item" href="#">January - March</a>
                      <a class="dropdown-item" href="#">March - June</a>
                      <a class="dropdown-item" href="#">June - August</a>
                      <a class="dropdown-item" href="#">August - November</a>
                    </div>
                  </div>
                 </div>
                </div>
              </div>
            </div>
          </div>
          @if($slug=="personal")
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Update Personal Information</h4>
                  @if(Session::has('success_message'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success:</strong>
                    {{Session::get('success_message')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  @endif

                  @if ($errors->any())
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  
                      
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
              @endif
                    <form class="forms-sample" action="{{url('admin/update-vendor-details/personal')}}" method="post">@csrf
                    <div class="form-group">
                      <label for="exampleInputUsername1">Vendor Email</label>
                      <input  class="form-control" value="{{ Auth::guard('admin')->user()->email}}" readonly="" >
                    </div>
                    <!-- <div class="form-group">
                      <label for="exampleInputEmail1">Admin Type</label>
                      <input  class="form-control"  value="{{Auth::guard('admin')->user()->type }}" readonly="">
                    </div> -->
                    <div class="form-group">
                      <label for="vendor_name">Name </label>
                      <input type="text" class="form-control" id="vendor_name"  name="vendor_name" value="{{ Auth::guard('admin')->user()->name}}" >
                      
                    </div>
                   <div class="form-group">
                      <label for="vendor_mobile">Mobile </label>
                      <input type="text" class="form-control" placeholder="Enter mobile number" id="vendor_mobile"  name="vendor_mobile" value="{{Auth::guard('admin')->user()->mobile}}">
                      
                    </div>
                    
                    
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
          @elseif($slug=="business")
           <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Update Business Information</h4>
                  @if(Session::has('success_message'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success:</strong>
                    {{Session::get('success_message')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  @endif

                  @if ($errors->any())
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  
                      
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  @endif
                    <form class="forms-sample" action="{{url('admin/update-vendor-details/business')}}" method="post">@csrf
                    <div class="form-group">
                      <label>Vendor Email</label>
                      <input  class="form-control" value="{{ Auth::guard('admin')->user()->email}}" readonly="" >
                    </div>
                    
                    <div class="form-group">
                      <label for="shop_name"> Shop name </label>
                      <input type="text" class="form-control" placeholder="Enter shop name" id="shop_name"  name="shop_name" value="{{ $vendorDetails['shop_name']}}">
                      
                    </div>

                    <div class="form-group">
                      <label for="shop_address"> Shop Address </label>
                      <input type="text" class="form-control" placeholder="Enter shop Address" id="shop_address"  name="shop_address" value="{{ $vendorDetails['shop_address']}}" >
                      
                    </div>
                    <div class="form-group">
                      <label for="shop_mobile"> Shop mobile</label>
                      <input type="text" class="form-control" placeholder="Enter shop mobile" id="shop_mobile"  name="shop_mobile" value="{{$vendorDetails['shop_mobile']}}" >
                      
                    </div>
                    <div class="form-group">
                      <label for="shop_email"> Shop email </label>
                      <input type="email" class="form-control" placeholder="Enter shop email" id="shop_email"  name="shop_email" value="{{ $vendorDetails['shop_email']}}" >
                      
                    </div>

                   
                    
                   <!--  <div class="form-check form-check-flat form-check-primary">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input">
                        Remember me
                      </label>
                    </div> -->
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
          @endif
            
          </div>
  
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        @include('admin.layout.footer')
       
        <!-- partial -->
      </div>

@endsection 