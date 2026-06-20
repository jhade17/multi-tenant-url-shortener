@extends('layouts.dashboard')

@section('content')

<div class="max-w-2xl">

    <h2 class="text-2xl font-bold mb-6">
        Invite New Client
    </h2>

    <div class="bg-white p-6 rounded shadow">

        <form method="POST" action="{{ route('super-admin.store-client') }}">
            @csrf

            <div class="mb-5">
                <label class="block mb-2">
                    Company Name
                </label>

                <input
                    type="text"
                    name="company_name"
                    class="w-full border rounded p-2"
                    value="{{ old('company_name') }}"
                    required
                >
                <x-input-error :messages="$errors->get('company_name')" class="mt-2" />
            </div>

            <div class="mb-5">
                <label class="block mb-2">
                    Admin Name
                </label>

                <input
                    type="text"
                    name="name"
                    class="w-full border rounded p-2"
                    value="{{ old('name') }}"
                    required
                >
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="mb-5">
                <label class="block mb-2">
                    Admin Email
                </label>

                <input
                    type="email"
                    name="email"
                    class="w-full border rounded p-2"
                    value="{{ old('email') }}"
                    required
                >
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <button class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded transition-colors shadow-sm font-medium">
                Send Invitation
            </button>

        </form>

    </div>

</div>

@endsection