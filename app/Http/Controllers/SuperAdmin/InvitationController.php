<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Enums\UserRole;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Invitation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\InvitationRequest;

class InvitationController extends Controller
{

    public function create()
    {

        return view(

            'super-admin.invitations.create'

        );

    }


    public function store(InvitationRequest $request)
    {


        $company = Company::create([
            'name' => $request->company_name
        ]);

       $invitation = Invitation::create([
            'company_id' => $company->id,
            'invited_by' => auth()->id(),
            'name' => $request->name,
            'email' => $request->email,
            'role' => UserRole::ADMIN->value,
            'token' => Str::uuid(),
            'expires_at' => now()->addDays(7)
        ]);

        // For now i have accepted manually 
        // But in production email should be sent to the user
        return redirect()->route(
            'invitations.accept',
            $invitation->token
        );

        // return redirect()->route(
        //     'super-admin.dashboard'
        // )->with(
        //     'success',
        //     'Invitation sent successfully.'
        // );

    }

}