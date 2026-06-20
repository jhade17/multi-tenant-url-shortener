<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class TeamMemberController extends Controller
{
    public function index()
    {
        $companyId = auth()->user()->company_id;

        $members = User::query()
            ->where('company_id', $companyId)
            ->withCount('shortUrls')
            ->withSum('shortUrls', 'hits')
            ->orderBy('name')
            ->get();

        return view('admin.team-members.index', compact('members'));
    }
}
