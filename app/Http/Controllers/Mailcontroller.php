<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Organization;
use App\Models\Otp;
use App\Models\User;
use App\Models\Application;

use App\Mail\OrganizationAcceptMail;
use App\Mail\OrganizationRejectMail;
use App\Mail\forgetpassword;
use App\Mail\scheduleMail;
use Carbon\Carbon;

use function Laravel\Prompts\alert;

class Mailcontroller extends Controller
{
    // function for sending email to organization after approvel
  public function Approve($id)
  {
    $org = Organization::findOrFail($id);
    $org->is_approved='approved';
    $org->save();

    Mail::to($org->email)->send(new OrganizationAcceptMail($org));
    return redirect()->back()->with('message', 'Approved and email is sent');
}

    // function for sending email to organization after rejection

    public function Reject(Request $request,$id)
{
    $org = Organization::findOrFail($id);
    $org->is_approved='rejected';
    $org->save();

    Mail::to($org->email)->send(new OrganizationRejectMail($org,$request->reason));
    return redirect()->back()->with('message', 'Rejected and email is sent');
}

    // function for sending otp to user for password reset

public function sendotp(Request $request)
{
    $request->validate([
        'email'=>'required|email|exists:users,email',
    ]);
    session()->put('email',$request->email);
    $otp=rand(100000,999999);
    Otp::create([
        'email'=>$request->email,
        'otp'=>$otp,
    ]);
    Mail::to($request->email)->send(new forgetpassword($otp));
    return response()->json(['success' => ' otp sent successfully']);   
}

    // function for varify otp

public function varifyotp(Request $req)
{
    $req->validate([
       'otpemail' => 'required|email|exists:users,email',
       'otp' => 'required|digits:6',
    ]);
    $exists = Otp::where('email', $req->otpemail)
                 ->where('otp', $req->otp)
                 ->first();
    if (! $exists) {
        return response()->json(['error' => 'Invalid OTP'], 422);
    }
    if(Carbon::parse($exists->created_at)->addMinutes(2)->isPast())
    {
        return response()->json(['error' => 'OTP expired'], 422);
        Otp::where('email', $req->otpemail)->delete();
    }
    Otp::where('email', $req->otpemail)->delete();
    return response()->json(['success' => 'OTP verified']);
}

    // function for reset password

public function resetpassword(Request $request)
{
    $request->validate([
        'email' => 'required|email|exists:users,email',
        'new_password' => 'required|min:8',
        'confirmPassword'=>'required|same:new_password',
    ]);
    $user = User::where('email', session()->get('email'))->first();
    $user->update([
        'password'=>$request->new_password,
    ]);
    session()->forget('email');
    return response()->json(['success' => 'Password reset successfully']);
}

// function for sending email for interview

public function Schedule(Request $request,$appid)
{
    $request->validate([ 
        'mail'=>'required|email',
        'time'=>'required',
        'date'=>'required',
        'category'=>'required',
    ]);
    $row=Application::with('jobs','organizations','users')->find($appid);
    $record=$request->all();
    Mail::to($request->mail)->send(new scheduleMail($record,$row));
    $row->update([
        'status'=>'selected',
    ]);

    return response()->json(['success' => 'Scheduled and email is sent']);
}

}
