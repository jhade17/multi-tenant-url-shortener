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
                    required
                >
            </div>

            <div class="mb-5">
                <label class="block mb-2">
                    Admin Name
                </label>

                <input
                    type="text"
                    name="name"
                    class="w-full border rounded p-2"
                    required
                >
            </div>

            <div class="mb-5">
                <label class="block mb-2">
                    Admin Email
                </label>

                <input
                    type="email"
                    name="email"
                    class="w-full border rounded p-2"
                    required
                >
            </div>

            <button class="bg-blue-600 text-white px-5 py-2 rounded">
                Send Invitation
            </button>

        </form>

    </div>

</div>

@endsection