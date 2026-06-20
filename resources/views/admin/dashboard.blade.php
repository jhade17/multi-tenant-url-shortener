@extends('layouts.dashboard')

@section('content')

<h2 class="text-2xl font-bold mb-6">
    Dashboard
</h2>

<div class="grid grid-cols-2 gap-5 mb-8">

    <div class="bg-white p-6 rounded shadow">
        <p class="text-gray-500">Total Team Members</p>
        <h3 class="text-3xl font-bold mt-2">{{ $teamCount }}</h3>
    </div>

    <div class="bg-white p-6 rounded shadow">
        <p class="text-gray-500">Total URLs</p>
        <h3 class="text-3xl font-bold mt-2">{{ $urlCount }}</h3>
    </div>

</div>

<div class="bg-white rounded shadow overflow-x-auto">

    <table class="w-full">

        <thead>
            <tr class="border-b text-left">
                <th class="p-4">Short URL</th>
                <th class="p-4">Original URL</th>
                <th class="p-4">Hits</th>
                <th class="p-4">Created At</th>
            </tr>
        </thead>

        <tbody>

            @forelse($urls as $url)

            <tr class="border-b hover:bg-gray-50">

                <td class="p-4">
                    <a href="{{ url('/shorturl/'.$url->short_code) }}"
                       target="_blank"
                       class="text-blue-600 hover:underline">
                        {{ $url->short_code }}
                    </a>
                </td>

                <td class="p-4 break-all text-gray-700">
                    {{ $url->long_url }}
                </td>

                <td class="p-4">
                    <span class="font-semibold">
                        {{ $url->hits }}
                    </span>
                </td>

                <td class="p-4 text-gray-600">
                    {{ optional($url->created_at)->format('d M Y') }}
                </td>

            </tr>

            @empty
            <tr>
                <td colspan="4" class="p-6 text-center text-gray-500">
                    No URLs found.
                </td>
            </tr>
            @endforelse

        </tbody>

    </table>

    <div class="p-5">
        {{ $urls->links() }}
    </div>

</div>

@endsection