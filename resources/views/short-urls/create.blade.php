@extends('layouts.dashboard')

@section('content')

<div class="max-w-2xl">

    <h2 class="text-2xl font-bold mb-6">
        Generate Short URL
    </h2>

    <div class="bg-white shadow rounded p-6">

        <form method="POST"
            @if(auth()->user()->role === 'admin')
                action="{{ route('admin.short-urls.store') }}"
            @else
                action="{{ route('member.short-urls.store') }}"
            @endif
        >
            @csrf

            <div class="mb-5">
                <label>
                    Long URL
                </label>

                <input
                    type="url"
                    name="long_url"
                    class="w-full border rounded p-2"
                    placeholder="https://google.com"
                    required
                >
            </div>

            <button
                class="bg-blue-600 text-white px-5 py-2 rounded"
            >
                Generate
            </button>

        </form>

    </div>

</div>

@endsection