@extends('admin.layout.layout')
@section('content')

<div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Vendor Details</h3>  
                  <h6 class="font-weight-normal mb-0"><a href="{{url('admin/admins/vendor')}}"> Back to vendors</h6>      
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
         
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Personal Information</h4>
                    <div class="form-group">
                      <label for="exampleInputUsername1"> Email</label>
                      <input  class="form-control" value="{{$vendorDetails['vendor_personal']['email'] }}" readonly="" >
                    </div>
                    <!-- <div class="form-group">
                      <label for="exampleInputEmail1">Admin Type</label>
                      <input  class="form-control"  value="{{Auth::guard('admin')->user()->type }}" readonly="">
                    </div> -->
                    <div class="form-group">
                      <label for="vendor_name">Name </label>
                      <input type="text" class="form-control" id="vendor_name"  name="vendor_name" value="{{ $vendorDetails['vendor_personal']['name']}}" readonly="" >
                      
                    </div>
                   
                     <div class="form-group">
                      <label for="vendor_mobile">Mobile </label>
                      <input type="text" class="form-control" placeholder="Enter mobile number" id="vendor_mobile"  name="vendor_mobile" value="{{ $vendorDetails['vendor_personal']['mobile']}}" readonly="" >
                      
                    </div>                  
                    
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Business Information</h4>  
                  <div class="form-group">
                      <label >Vendor Email</label>
                      <input  class="form-control" value="{{ $vendorDetails['vendor_personal']['email']}}" readonly="" >
                    </div>
                    <div class="form-group">
                      <label for="shop_name"> Shop name </label>
                      <input type="text" class="form-control"  id="shop_name"  name="shop_name" value="{{ $vendorDetails['vendors_business']['shop_name']}}" readonly="">
                      
                    </div>

                    <div class="form-group">
                      <label for="shop_address"> Shop Address </label>
                      <input type="text" class="form-control"  id="shop_address"  name="shop_address" value="{{ $vendorDetails['vendors_business']['shop_address']}}" readonly="">
                      
                    </div>
                    <div class="form-group">
                      <label for="shop_mobile"> Shop mobile</label>
                      <input type="text"  class="form-control" id="shop_mobile"  name="shop_mobile" value="{{$vendorDetails['vendors_business']['shop_mobile']}}"  readonly="" >
                      
                    </div>
                    <div class="form-group">
                      <label for="shop_email"> Shop email </label>
                      <input type="email" class="form-control"  id="shop_email"  name="shop_email" value="{{ $vendorDetails['vendors_business']['shop_email']}}" readonly="" >
                      
                    </div>     
   
                </div>
              </div>
            </div>
          
            
          </div>
  
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        @include('admin.layout.footer')
       
        <!-- partial -->
      </div>

@endsection 