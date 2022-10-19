<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Hash;
use App\Models\Admin;
use App\Models\Vendors;
use App\Models\VendorsBusinessDetail;

class AdminController extends Controller
{
    public function dashboard(){
    	return view ('admin.dashboard');
    }

    public function updateAdminPassword(){
        $adminDetails = Admin::where('email',Auth::guard('admin')->user()->email)->first()->toArray();
        return view('admin.settings.update-admin-password')->with(compact('adminDetails'));
    }

    public function checkAdminPassword(Request $request){
        $data = $request->all();
        /*echo "<pre>"; print_r($data); die;*/
        if(Hash::check($data['current_password'],Auth::guard('admin')->user()->password)){
            return "true";
        }else{
            return "false";
        }
    }

    public function updateAdminDetails(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;

            $rules = [
                'admin_name'=>'required|regex:/^[\pL\s\-]+$/u',

            ];
             $CustomMessages = [
            'admin_name.required' => 'Name is required',
            'admin_name.regex' => 'Valid Name is required',
            
            
        ];


            $this->validate($request,$rules);

            //update admin details
            Admin::where('id', Auth::guard('admin')->user()->id)->update(['name'=>$data['admin_name']]);
            return redirect()->back()->with('success_message','admin details updated successfully');
        }

        return view('admin.settings.update_admin_details');
    }

    public function updateVendorDetails($slug ,Request $request){
        if($slug=="personal"){
            if($request->isMethod('post')){

                $data = $request->all();
                echo "<pre>"; print_r($data); die;

                $rules = [
                    'vendor_name'=>'required|regex:/^[\pL\s\-]+$/u',

                ];
                 $CustomMessages = [
                'vendor_name.required' => 'Name is required',
                'vendor_name.regex' => 'Valid Name is required',
                
                
                ];


                $this->validate($request,$rules,$CustomMessages);

                //update vendor details in admin and vendor tables
                Admin::where('id', Auth::guard('admin')->user()->id)->update(['name'=>$data['vendor_name']],['mobile'=>$data['vendor_mobile']]);
                Vendors::where('id', Auth::guard('admin')->user()->vendor_id)->update(['name'=>$data['vendor_name'],'mobile'=>$data['vendor_mobile']]);
                return redirect()->back()->with('success_message','Vendor details updated successfully');
            }        
            $vendorDetails = Vendors::where('id',Auth::guard('admin')->user()->vendor_id)->first()->toArray();
            // dd($vendorDetails);
        }
        else if($slug=="business"){
            if($request->isMethod('post')){

                $data = $request->all();
                // echo "<pre>"; print_r($data); die;

                $rules = [
                    'shop_name'=>'required|regex:/^[\pL\s\-]+$/u',
                    'shop_mobile'=>'required|numeric',
                    'shop_address'=>'required',
                    'shop_email'=>'required',
                ];
                $CustomMessages = [
                'shop_name.required' => 'Name is required',
                'shop_name.regex' => 'Valid Name is required',
                'shop_address.required' => 'Address is required',
                'shop_mobile.required' => 'Mobile is required',
                'shop_mobile.numeric' => 'Valid Mobile number is required',
                'shop_email.required' => 'Email is required',            
                
                ];
                $this->validate($request,$rules,$CustomMessages);

                //update vendor business details                 
                VendorsBusinessDetail::where('vendor_id', Auth::guard('admin')->user()->vendor_id)->update(['shop_name'=>$data['shop_name'],'shop_address'=>$data['shop_address'],'shop_mobile'=>$data['shop_mobile'],'shop_email'=>$data['shop_email']]);
                return redirect()->back()->with('success_message','Vendor details updated successfully');
            }
            $vendorDetails = VendorsBusinessDetail::where('vendor_id',Auth::guard('admin')->user()->vendor_id)->first()->toArray();
            // dd($vendorDetails);
        }
        return view ('admin.settings.update_vendor_details')->with(compact('slug','vendorDetails'));

    }

    Public function login (Request $request){
    	if($request->isMethod('post')){
    		$data = $request->all();
    		// echo "<pre>"; print_r($data); die;
            $rules = [
                    'email' => 'required|email|max:255',
                    'password' => 'required',
                ];
            $CustomMessages = [
                'email.required' => 'Email is required',
                'email.email' => 'Valid Email is required',
                'password.required' => 'Password is required',
                
            ];

            $this->validate($request,$rules,$CustomMessages);

                // if(Auth::guard('admin')->attempt(['email'=>$data['email'], 'password'=>$data['password']])){
                //     return redirect('admin/dashboard');
                // }else{
                //     return redirect()->back()->with('error_message','Invalid Email or Password'); 
                // }
                if(Auth::guard('admin')->attempt(['email'=>$data['email'], 'password'=>$data['password']])){
                    if(Auth::guard('admin')->user()->type =="vendor" && Auth::guard('admin')->user()->confirm=="No"){
                         return redirect()->back()->with('error_message','Please confirm your email to activate your vendor account'); 
                    }else if(Auth::guard('admin')->user()->type !="vendor" && Auth::guard('admin')->user()->status=="0"){
                        return redirect()->back()->with('error_message','Your admin account is not active');
                    }else{
                        return redirect('admin/dashboard');
                    }
                    
                }else{
                    return redirect()->back()->with('error_message','Invalid Email or Password'); 
                }
    	}
    	return view('admin.login');
    }

    public function admins($type=null){
        $admins = Admin::query();
        if(!empty($type)){
            $admins = $admins->where('type',$type);
            $title = ucfirst($type);
        }else{
            $title = "All Admins/Vendors";
        }
        $admins = $admins->get()->toArray();
        return view('admin.admins.admins')->with(compact('admins','title'));
    }

    public function viewVendorDetails($id){
        $vendorDetails = Admin::with('vendorPersonal','vendorsBusiness')->where('id',$id)->first();
        $vendorDetails = json_decode(json_encode($vendorDetails),true);
        // dd ($vendorDetails);
        return view('admin.admins.view_vendor_details')->with(compact('vendorDetails'));
    }    

    public function updateAdminStatus(Request $request){
        if($request->ajax()){
            $data = $request->all();
            // echo "prev"; print_r($data); die;
            if($data['status']=="Active"){
                $status = 0;
            }else{
                $status = 1;
            }
            Admin::where ('id',$data['admin_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'admin_id'=>$data['admin_id']]);
        }
    }



    Public function logout(){
        Auth::guard('admin')->logout();
        return redirect('front/vendors/login_register');
    }

}

