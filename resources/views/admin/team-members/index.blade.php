@extends('layouts.dashboard')

@section('content')

<div class="flex justify-between mb-6">

    <h2 class="text-2xl font-bold">
        Team Members
    </h2>

    <a
        href="{{ route('admin.invitations.create') }}"
        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded transition-colors shadow-sm font-medium"
    >
        Invite Member
    </a>

</div>

<div class="bg-white shadow rounded overflow-hidden">

    <table class="w-full text-left border-collapse">

        <thead>
            <tr class="border-b bg-gray-50">
                <th class="p-4 font-semibold text-gray-700">Name</th>
                <th class="p-4 font-semibold text-gray-700">Email</th>
                <th class="p-4 font-semibold text-gray-700">Role</th>
                <th class="p-4 font-semibold text-gray-700">Generated URLs</th>
                <th class="p-4 font-semibold text-gray-700">Total Hits</th>
            </tr>
        </thead>

        <tbody>
            @forelse($members as $member)

                <tr class="border-b">

                    <td class="p-4">
                        {{ $member->name }}
                    </td>

                    <td class="p-4">
                        {{ $member->email }}
                    </td>

                    <td class="p-4">
                        {{ ucfirst(str_replace('_', ' ', $member->role)) }}
                    </td>

                    <td class="p-4">
                        {{ $member->short_urls_count }}
                    </td>

                    <td class="p-4">
                        {{ $member->short_urls_sum_hits ?? 0 }}
                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="5" class="p-6 text-center">
                        No team members found.
                    </td>
                </tr>

            @endforelse
        </tbody>

    </table>

</div>

@endsection