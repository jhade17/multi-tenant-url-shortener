<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\ShortUrl;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
   public function index()
    {
        $urls = ShortUrl::with([
            'company:id,name',
            'user:id,name'
        ])
        ->latest('id')
        ->paginate(10);

        return view('super-admin.dashboard', [
            'companiesCount' => Company::toBase()->count(),
            'urlsCount'      => ShortUrl::toBase()->count(),
            'urls'           => $urls,
        ]);
    }
}
