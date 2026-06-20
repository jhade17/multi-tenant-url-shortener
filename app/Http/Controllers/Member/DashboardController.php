<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShortUrl;

class DashboardController extends Controller
{
    public function index()
    {
        // $urls = ShortUrl::query()
        //     ->whereUserId(auth()->id())
        //     ->latest()
        //     ->limit(10)
        //     ->get();

        // return view('member.dashboard', compact('urls'));

    $userId = auth()->id();
    $baseQuery = ShortUrl::where('user_id', $userId);

    $urlCount  = (clone $baseQuery)->count(); /* Without clone, pagination modifies the builder internally - This avoids side effects */
    $totalHits = (clone $baseQuery)->sum('hits');

    $urls = $baseQuery
        ->latest('id')
        ->paginate(10);

    return view('member.dashboard', [
        'urlCount'  => $urlCount,
        'totalHits' => $totalHits,
        'urls'      => $urls,
    ]);

    }
}
