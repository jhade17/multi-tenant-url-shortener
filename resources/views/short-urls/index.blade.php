@extends('layouts.dashboard')

@section('content')

<div class="flex justify-between mb-6">

    <h2 class="text-2xl font-bold">
        Generated URLs
    </h2>

    <a
        @if(auth()->user()->role === 'admin')
            href="{{ route('admin.short-urls.create') }}"
        @else
            href="{{ route('member.short-urls.create') }}"
        @endif
        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded transition-colors shadow-sm font-medium"
    >
        Generate URL
    </a>

</div>

<div class="bg-white shadow rounded overflow-hidden">

    <table class="w-full text-left border-collapse">

        <thead>
            <tr class="border-b bg-gray-50">
                <th class="p-4 font-semibold text-gray-700">Short URL</th>
                <th class="p-4 font-semibold text-gray-700">Original URL</th>
                <th class="p-4 font-semibold text-gray-700">Hits</th>
                <th class="p-4 font-semibold text-gray-700">Created At</th>
            </tr>
        </thead>

        <tbody>
            @foreach($urls as $url)
                <tr class="border-b">

                    <td class="p-4">
                        <a href="{{ route('redirect', $url->short_code) }}" target="_blank" class="text-blue-600">
                            {{ route('redirect', $url->short_code) }}
                        </a>
                    </td>

                    <td class="p-4">
                        {{ $url->long_url }}
                    </td>

                    <td class="p-4">
                        {{ $url->hits }}
                    </td>

                    <td class="p-4">
                        {{ $url->created_at->format('d M Y') }}
                    </td>

                </tr>
            @endforeach
        </tbody>

    </table>

    <div class="p-5">
        {{ $urls->links() }}
    </div>

</div>

@endsection