<?php

namespace App\Http\Controllers;

use App\Models\ShortUrl;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ShortUrlController extends Controller
{
    public function index()
    {
        $user  = auth()->user();
        $query = ShortUrl::query();

        if ($user->role == 'admin') {
            $query->where('company_id', $user->company_id);
        }

        if ($user->role == 'member') {
            $query->where('user_id', $user->id);
        }

        $urls = $query->latest()->paginate(10);

        return view('short-urls.index', compact('urls'));
    }

    public function create()
    {
        return view('short-urls.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'long_url' => ['required', 'url'],
        ]);

        ShortUrl::create([
            'company_id' => auth()->user()->company_id,
            'user_id'    => auth()->id(),
            'long_url'   => $request->long_url,
            'short_code' => $this->generateCode(),
            'hits'       => 0,
        ]);

        if (auth()->user()->role == 'admin') {
            return redirect()->route('admin.short-urls.index');
        }

        return redirect()->route('member.short-urls.index');
    }


    private function generateCode(): string
    {
        do {
            $code = Str::random(6);
        } while (
            ShortUrl::whereShortCode($code)->exists()
        );

        return strtolower($code);
    }

    public function redirect($shortCode)
    {
        $url = ShortUrl::whereShortCode($shortCode)->firstOrFail();

        $url->increment('hits');

        return redirect()->away($url->long_url);
}
}