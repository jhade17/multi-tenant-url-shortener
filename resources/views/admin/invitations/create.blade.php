@extends('layouts.dashboard')

@section('content')

<div class="max-w-2xl">

    <h2 class="text-2xl font-bold mb-6">
        Invite Team Member
    </h2>

    <div class="bg-white shadow rounded p-6">

        <form method="POST" action="{{ route('admin.invitations.store') }}">
            @csrf

            <div class="mb-5">
                <label>Name</label>

                <input
                    type="text"
                    name="name"
                    class="w-full border rounded p-2"
                    required
                >
            </div>

            <div class="mb-5">
                <label>Email</label>

                <input
                    type="email"
                    name="email"
                    class="w-full border rounded p-2"
                    required
                >
            </div>

            <div class="mb-5">
                <label>Role</label>

                <select
                    name="role"
                    class="w-full border rounded p-2"
                >
                    <option value="admin">
                        Admin
                    </option>

                    <option value="member">
                        Member
                    </option>
                </select>
            </div>

            <button class="bg-blue-600 text-white px-5 py-2 rounded">
                Send Invitation
            </button>

        </form>

    </div>

</div>

@endsection