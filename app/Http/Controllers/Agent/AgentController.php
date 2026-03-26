<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\Websitemail;

class AgentController extends Controller
{
    public function registration(){
        return view('agent.auth.registration');
    }
    
    public function registration_submit(Request $request)
    {
        //validate the request data
        $request->validate([
            'name' => 'required|string|max:225',
            'email' => 'required|email|unique:agents,email',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);

        $token = hash('sha256', time());

        $agent = new Agent();
        $agent->name = $request->name;
        $agent->email = $request->email;
        $agent->password = Hash::make($request->password);
        $agent->token = $token;
        $agent->save();

        $link = route('agent.registration_verify', [$token, $request->email]);
        $subject = 'Registration Verification';
        $message = 'Click on the following link to verify your Agent email:<br><a href="' . $link . '">' . $link . '</a>';

        Mail::to($request->email)->send(new Websitemail($subject, $message));
        return redirect()->back()->with('success', 'Registration Successful. Please check your email to verify your account');
    }

    public function registration_verify($token, $email)
    {
        $agent = Agent::where('email', $email)->where('token', $token)->first();
        if (!$agent) {
            return redirect()->route('agent.login')->with('error', 'Invalid token or email');
        }
        $agent->token = '';
        $agent->status = 1;
        $agent->update();

        return redirect()->route('agent.login')->with('success', 'Agent Email Verification Successfull. You can login now');
    }


    public function dashboard()
    {
        return view('agent.dashboard.index');
    }

    public function login()
    {
        return view('agent.auth.login', ['page' => 'login']);
    }

    public function login_submit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $check = $request->all();

        $data = [
            'email' => $check['email'],
            'password' => $check['password'],
            'status' => 1,
        ];

        if (Auth::guard('agent')->attempt($data)) {
            return redirect()->route('agent.dashboard');
        } else {
            return redirect()->back()->with(['error' => 'Invalid Credentials']);
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('agent')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('agent.login')
            ->with('success', 'Logged out successfully');
    }

    public function forget_password()
    {
        return view('agent.auth.forget_password');
    }

    public function forget_password_submit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        //  check if email exists or not
        $agent = Agent::where('email', $request->email)->first();
        if (!$agent) {
            return redirect()->back()->with('error', 'Email not found');
        }

        $token = hash('sha256', time());
        $agent->token = $token;
        $agent->update();

        $link = route('agent.reset_password', [$token, $request->email]);

        $subject = 'Reset Password';

        $message = 'Click on the following link to reset your password: <br> ';
        $message .= '<a href="' . $link . '">' . $link . '</a>';

        Mail::to($request->email)->send(new Websitemail($subject, $message));

        return redirect()->back()->with('success', 'Reset password link is sent to your email');
    }

    public function reset_password($token, $email)
    {
        $agent = Agent::where('email', $email)->where('token', $token)->first();
        if (!$agent) {
            return redirect()->route('agent.login')->with('error', 'Invalid token or email');
        }
        return view('agent.auth.reset_password', compact('token', 'email'));
    }

    //post route
    public function reset_password_submit(Request $request, $token, $email)
    {
        $request->validate([
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);
        $agent = Agent::where('email', $email)->where('token', $token)->first();
        // if(!$admin){
        //     return redirect()->route('admin_login')->with('error','Invalid token or email'); 
        // }
        $agent->password = Hash::make($request->password);
        $agent->token = '';
        $agent->update();

        return redirect()->route('agent.login')->with('success', 'Password reset successfully');
    }

    public function profile()
    {
        return view('agent.profile.index');
    }

    public function profile_submit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            // 'email' => 'required|email|unique:Agents,email,' . Auth::guard('agent')->Agent()->id,
        ]);

        //logged in Agent id
        $agent = Agent::where('id', Auth::guard('agent')->user()->id)->first();
        // $agent = Auth::guard('agent')->agent();
        //existing Agent id is in hand
        if ($request->photo) {
            $request->validate([
                'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $final_name = 'agent_' . time() . '.' . $request->photo->extension();
            if ($agent->photo && file_exists(public_path('uploads/agents/' . $agent->photo))) {
                unlink(public_path('uploads/agents/' . $agent->photo));
            }
            $request->photo->move(public_path('uploads'), $final_name);
            $agent->photo = $final_name;
        }

        if ($request->password) {
            $request->validate([
                'password' => 'required',
                'confirm_password' => 'required|same:password',
            ]);
            $agent->password = Hash::make($request->password);
        }
        $agent->name = $request->name;
        // $agent->email = $request->email;
        $agent->phone = $request->phone;
        $agent->address = $request->address;
        $agent->state = $request->state;
        $agent->zip = $request->zip;
        $agent->country = $request->country;

        $agent->save();
        return redirect()->back()->with('success', 'Profile Updated successfully');
    }
}

