<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Organization;
use App\Mail\OrganizationAcceptMail;
use App\Mail\OrganizationRejectMail;

class Mailcontroller extends Controller
{
public function Approve($id)
{
    $org = Organization::findOrFail($id);
    $org->is_approved='approved';
    $org->save();

    Mail::to($org->email)->send(new OrganizationAcceptMail($org));
    
    return redirect()->back()->with('message', 'Approved and email is sent');
}

public function Reject(Request $request,$id)
{
    $org = Organization::findOrFail($id);
    $org->is_approved='rejected';
    $org->save();

    Mail::to($org->email)->send(new OrganizationRejectMail($org,$request->reason));
    return redirect()->back()->with('message', 'Rejected and email is sent');
}



}
