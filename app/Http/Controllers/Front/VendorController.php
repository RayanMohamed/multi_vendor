<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\Redirect;
// use App\Http\Controllers\Front\AuthenticatesUsers;
// use app\Http\Controllers\Auth\LoginController.php;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Vendors;
use AuthenticatesUsers;
use Validator;
use DB;
use Socialite;
use Auth;

class VendorController extends Controller
{
	

    // public function __construct()

    // {

    //     $this->middleware('guest')->except('logout');

    // }

    // public function redirectToprovider()

    // {

    //     return Socialite::driver('google')->redirect();

    // }

    // public function handleCallback()

    // {

    //     try {

    //         $user = Socialite::driver('google')->user();

    //         $finduser = User::where('google_id', $user->id)->first();

    //         if($finduser){

    //             Auth::login($finduser);

    //             return redirect('/home');

    //         }else{

    //             $newUser = User::create([

    //                 'name' => $user->name,

    //                 'email' => $user->email,

    //           'google_id'=> $user->id

    //             ]);

    //             Auth::login($newUser);

    //             return redirect()->back();

    //         }

    //     } catch (Exception $e) {

    //         return redirect('google.login');

    //     }
    //     dd($user);

    // }












    public function redirectToProvider()

    {

        return Socialite::driver('google')->redirect();

    }

    public function handleCallback(Request $request){
    	try {

            $user = Socialite::driver('google')->stateless()->user()->name;
            if( Auth::guard('admin')->user()->confirm=="No"){
                         return redirect()->back()->with('error_message','Please confirm your email to activate your vendor account'); 
                    }else{
                        return redirect('admin/dashboard');
                    }
        }catch(Exception $e){
        	return redirect('vendorlogin');
        }

        // dd($user);
        // $finduser = Vendors::where('google_id', $user->id)->first();
        // if($finduser){

        //         Auth::login($finduser, true);
        // }
        // else{
        // 	$newUser = Vendors::create([

        //             'name' => $user->name,

        //             'email' => $user->email,

        //             'google_id'=> $user->id

        //         ]);
        // 	Vendors::login($newUser, true);


        // }
        return redirect('admin/dashboard');               
	            




        


    }

	public function vendorlogin(){
    	return view('front.vendors.login_register');
    }

    public function About_us(){
    	return view('About_us');
    }

    public function loginRegister(){
    	return view('front.vendors.login_register');

    }
    public function vendorRegister(Request $request){
    	if($request->isMethod('post')){
    		$data = $request->all();
    		// echo "<prev>"; print_r($data); die;

    		$rules = [
    			"name"=>"required",
                "email" => "required|email|unique:admins|unique:vendors",
                "mobile" =>"required|string|min:5|max:10",
                // "password" => "required",
                
            ];
	        $CustomMessages = [
	        	"name.required"=> "Name is required",
	        	"mobile.required" => "Phone number is required",
	            "mobile.mobile " => "Phone number already exist or Invalid",
	            "email.required" => "Email is  required",
	            "email.email" => "Email already exist",
	            // "password.required" => "Password is required",
	            
	        ];
	        $validator = Validator::make($data,$rules,$CustomMessages);
	        if($validator->fails()){
	        	return Redirect()->back()->withErrors($validator);
	        	// return Redirect::back()->withErrors("error_message");
	        }
	        DB::beginTransaction();
	        //creating vendor account

	        //insert into vendor table 
	        $vendor = new Vendors;
	        $vendor->name = $data['name'];
	        $vendor->mobile= $data['mobile'];
	        $vendor->email=$data['email'];
	        $vendor->status= 0;
	        $vendor->save();

	        $vendor_id = DB::getPdo()->lastInsertid();

	        //insert vendor details in admin table
	        $admin = new Admin;
	        $admin->type='vendor';
	        $admin->vendor_id=$vendor_id;
	        $admin->name = $data['name'];
	        // $vendor->mobile= $data['mobile'];
	        $admin->email=$data['email'];
	        $admin->mobile=$data['mobile'];
	        $admin->password=bcrypt($data['password']);
	        $admin->status= 0;
	        $admin->save();

	        //send confirmation email
	        $email = $data['email'];
	        $messageData = [
	        	'email' =>$data['email'],
	        	'name' =>$data['name'],
	        	'code' => base64_encode($data['email'])
	        ];

	        Mail::send('emails.vendor_confirmation',$messageData,function($message)use($email){
	        	$message->to($email)->subject('Confirm your Vendor Account');
	        });

	        DB::commit();
	        



	        //redirect back vendor with success message
	        // $message = "Thanks for registering. We will confirm by email once your account is approved.";
	        return redirect()->back()->with('success_message','Thanks for registering. We will confirm by email once your account is approved.');



        }
    }    

    public function confirmVendor($email){
    	//decode vendor email
    	$email = base64_decode($email); 
    	//check vendor email exists
    	$vendorCount = Vendors::where('email',$email)->count();
    	if($vendorCount>0){
    		$vendorDetails = Vendors::where('email',$email)->first();
    		if($vendorDetails->confirm == "Yes"){
    			$message = "Your vendor Account is already confirmed. You can login";
    			return redirect('front/vendors/login_register')->with ('success_message',$message);
    		}else{
    			//update confirm column to yes
    			Admin::where('email',$email)->update(['confirm'=>'Yes']);
    			Vendors::where('email',$email)->update(['confirm'=>'Yes']);
    			//send register email

		        $messageData = [
		        	'email' =>$email,
		        	'name' =>$vendorDetails->name,
		        	'mobile' => $vendorDetails->mobile
		        ];

		        Mail::send('emails.vendor_confirmation',$messageData,function($message)use($email){
		        	$message->to($email)->subject('your Vendor Account Confirmed');
		        });



    			//Redirect to login/register page
    			$message = "your vendor account is confirmed. you can login and add your business details to activate your vendor account to add products";
    			return redirect('front/vendors/login_register')->with ('success_message',$message);
    		}
    	}else {
    		abort(404);
    	}
    }



}
