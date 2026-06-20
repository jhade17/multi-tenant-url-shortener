<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShortUrl;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // $urls = ShortUrl::query()
        //     ->where('company_id', auth()->user()->company_id)
        //     ->latest()
        //     ->limit(10)
        //     ->get();

        
        // $urls = auth()->user()
        //     ->company()
        //     ->shortUrls()
        //     ->latest()
        //     ->limit(10)
        //     ->get();
        
        // return view('admin.dashboard', compact('urls'));

        $companyId = auth()->user()->company_id;

        $shortUrlQuery = ShortUrl::where('company_id', $companyId);

        $teamCount = User::where('company_id', $companyId)->count();
        $urlCount  = (clone $shortUrlQuery)->count(); /* Without clone, pagination modifies the builder internally - This avoids side effects */
        $urls = $shortUrlQuery
            ->latest('id')
            ->paginate(10);

        return view('admin.dashboard', [
            'teamCount' => $teamCount,
            'urlCount'  => $urlCount,
            'urls'      => $urls,
        ]);

    }
    
}
