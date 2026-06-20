<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use App\Models\User;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

class InvitationAcceptController extends Controller
{

    public function create($token)
    {

        $invitation = Invitation::where('token', $token)
            ->whereNull('accepted_at')
            ->firstOrFail();


        return view('invitations.accept',compact('invitation'));

    }

    public function store(Request $request,$token)
    {
        $invitation = Invitation::where('token', $token)->whereNull('accepted_at')->firstOrFail();

        $request->validate([
            
            'password'=>[
                'required',
                'confirmed',
                'min:8'
            ]
        ]);

        User::create([

            'company_id'=>$invitation->company_id,

            'name'=>$invitation->name,

            'email'=>$invitation->email,

            'role'=>$invitation->role,

            'password'=>Hash::make( $request->password )    
        ]);

        $invitation->update([
            'accepted_at'=>now()
        ]);

        return redirect()->route('login')->with('success','Account created successfully.');

    }

}