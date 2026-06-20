<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invitation;
use App\Models\User;
use Illuminate\Support\Str;
use App\Http\Requests\AdminInvitationRequest;

class InvitationController extends Controller
{

    public function index()
    {

        $invitations = Invitation::where('company_id',auth()->user()->company_id)
            ->latest()
            ->paginate(10);


        return view('admin.invitations.index', compact('invitations'));

    }



    public function create()
    {

        return view('admin.invitations.create');

    }



    public function store(AdminInvitationRequest $request)
    {

        Invitation::create([

            'company_id'=>auth()->user()->company_id,

            'invited_by'=>auth()->id(),

            'name'=>$request->name,

            'email'=>$request->email,

            'role'=>$request->role,

            'token'=>Str::uuid(),

            'expires_at'=>now()->addDays(7)

        ]);


        return redirect()
            ->route('admin.invitations.index')
            ->with('success','Invitation sent successfully.');

    }

}