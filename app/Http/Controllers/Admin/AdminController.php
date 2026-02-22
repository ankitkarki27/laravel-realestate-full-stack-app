<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Mail\Websitemail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function dashboard(){
        return view ('admin.dashboard');
    }

    public function login(){
        return view ('admin.login');
    }

    public function login_submit(Request $request){
       $request->validate([
        'email'=>'required|email',
        'password'=>'required',
       ]);

       $check = $request->all();

       $data =[
        'email'=>$check['email'],
        'password'=>$check['password'],
       ];

       
    if(Auth::guard('admin')->attempt($data)){
        return redirect()->route('admin_dashboard');
       }else{
        return redirect()->back()->with(['error'=>'Invalid Credentials']);
       }
    }

    public function logout(){
        Auth :: guard('admin')->logout();
        return redirect()->route('admin_login')->with('success','logged out successfully'); 
    }

    public function forget_password(){
        return view ('admin.forget_password');
    }

        public function forget_password_submit(Request $request){
            $request->validate([
                'email'=>'required|email',
        ]);

        //  check if email exists or not
            $admin = Admin::where('email',$request->email)->first();
            if(!$admin){
                return redirect()->back()->with('error','Email not found');
            }

            $token = hash('sha256',time());
            $admin->token=$token;
            $admin->update();

            $link=route('admin_reset_password',[$token,$request->email]);

            $subject = 'Reset Password';
            
            $message = 'Click on the following link to reset your password: <br> ';
            $message .= '<a href="'.$link.'">'.$link.'</a>';
            
            Mail::to($request->email)->send(new Websitemail($subject,$message));

            return redirect()->back()->with('success','Reset password link is sent to your email');

        }

    public function reset_password($token, $email){
        $admin = Admin::where('email',$email)->where('token',$token)->first();
        if(!$admin){
            return redirect()->route('admin_login')->with('error','Invalid token or email'); 
        }
        return view('admin.reset_password',compact('token','email'));
    }

    //post route
    public function reset_password_submit(Request $request,$token,$email){
        $request->validate([
            'password'=>'required',
            'confirm_password'=>'required|same:password',
       ]);
       $admin = Admin::where('email',$email)->where('token',$token)->first();
        // if(!$admin){
        //     return redirect()->route('admin_login')->with('error','Invalid token or email'); 
        // }
       $admin->password=Hash::make($request->password);
       $admin->token= '';
       $admin->update();

       return redirect()->route('admin_login')->with('success','Password reset successfully');
    }

       public function admin_profile()
    {
        return view('admin.profile');
    }

    public function admin_profile_submit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            // 'email' => 'required|email|unique:users,email,' . Auth::guard('web')->user()->id,
        ]);

        //logged in admin id
        $admin = Admin::where('id', Auth::guard('admin')->user()->id)->first();
        // $admin = Auth::guard('admin')->user();
        //existing admin id is in hand
        if ($request->photo) {
            $request->validate([
                'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $final_name = 'admin_' . time() . '.' . $request->photo->extension();
            if ($admin->photo && file_exists(public_path('uploads/' . $admin->photo))) {
                unlink(public_path('uploads/' . $admin->photo));
            }
            $request->photo->move(public_path('uploads'), $final_name);
            $admin->photo = $final_name;
        }

        if ($request->password) {
            $request->validate([
                'password' => 'required',
                'confirm_password' => 'required|same:password',
            ]);
            $admin->password = Hash::make($request->password);
        }
        $admin->name = $request->name;
        // $user->email = $request->email;

        $admin->save();
        return redirect()->back()->with('success','Profile Updated successfully');
    }
}
