@extends('layouts.dashboard')

@section('content')

<div class="flex justify-between items-center mb-6">

    <h2 class="text-2xl font-bold text-gray-800">
        Invitations
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
                <th class="p-4 font-semibold text-gray-750">Name</th>
                <th class="p-4 font-semibold text-gray-750">Email</th>
                <th class="p-4 font-semibold text-gray-750">Role</th>
                <th class="p-4 font-semibold text-gray-750">Status</th>
                <th class="p-4 font-semibold text-gray-750">Action</th>
            </tr>
        </thead>

        <tbody>
            @forelse($invitations as $invitation)
                <tr class="border-b hover:bg-gray-50 transition-colors">
                    <td class="p-4 text-gray-800">{{ $invitation->name }}</td>
                    <td class="p-4 text-gray-850">{{ $invitation->email }}</td>
                    <td class="p-4 text-gray-650">{{ ucfirst($invitation->role) }}</td>
                    <td class="p-4">
                        @if($invitation->accepted_at)
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-green-100 text-green-800">
                                Accepted
                            </span>
                        @else
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-yellow-100 text-yellow-800">
                                Pending
                            </span>
                        @endif
                    </td>
                    <td class="p-4">
                        @if($invitation->accepted_at)
                            <span class="text-gray-400 cursor-not-allowed text-sm">
                                Already accepted
                            </span>
                        @else
                            <a
                                href="{{ route('invitations.accept', $invitation->token) }}"
                                target="_blank"
                                class="text-blue-600 hover:underline text-sm font-medium"
                                rel="noopener noreferrer"
                            >
                                Accept invitation
                            </a>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="p-8 text-center text-gray-500">
                        No invitations found.
                    </td>
                </tr>
            @endforelse
        </tbody>

    </table>

    @if($invitations->hasPages())
        <div class="p-5 border-t">
            {{ $invitations->links() }}
        </div>
    @endif

</div>

@endsection