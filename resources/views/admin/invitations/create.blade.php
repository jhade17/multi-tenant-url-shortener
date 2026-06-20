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
                    value="{{ old('name') }}"
                    required
                >
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="mb-5">
                <label>Email</label>

                <input
                    type="email"
                    name="email"
                    class="w-full border rounded p-2"
                    value="{{ old('email') }}"
                    required
                >
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="mb-5">
                <label>Role</label>

                <select
                    name="role"
                    class="w-full border rounded p-2"
                >
                    <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>
                        Admin
                    </option>

                    <option value="member" {{ old('role') === 'member' ? 'selected' : '' }}>
                        Member
                    </option>
                </select>
                <x-input-error :messages="$errors->get('role')" class="mt-2" />
            </div>

            <button class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded transition-colors shadow-sm font-medium">
                Send Invitation
            </button>

        </form>

    </div>

</div>

@endsection