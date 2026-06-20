<!DOCTYPE html>
<html>

<head>
    <title>URL Shortener</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

    <nav class="bg-white shadow">

        <div class="max-w-7xl mx-auto px-6">

            <div class="flex justify-between h-16">

                <div class="flex items-center gap-8">

                    <h1 class="text-xl font-bold text-gray-850">
                        URL Shortener
                    </h1>

                    @if(auth()->user()->role === 'super_admin')

                        <a href="{{ route('super-admin.dashboard') }}" class="{{ request()->routeIs('super-admin.dashboard') ? 'text-blue-600 font-semibold' : 'text-gray-600 hover:text-blue-600' }} transition-colors">
                            Dashboard
                        </a>

                        <a href="{{ route('super-admin.invite-client') }}" class="{{ request()->routeIs('super-admin.invite-client') ? 'text-blue-600 font-semibold' : 'text-gray-600 hover:text-blue-600' }} transition-colors">
                            Invite Client
                        </a>

                    @endif

                    @if(auth()->user()->role === 'admin')

                        <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'text-blue-600 font-semibold' : 'text-gray-600 hover:text-blue-600' }} transition-colors">
                            Dashboard
                        </a>

                        <a href="{{ route('admin.short-urls.index') }}" class="{{ request()->routeIs('admin.short-urls.*') ? 'text-blue-600 font-semibold' : 'text-gray-600 hover:text-blue-600' }} transition-colors">
                            Short URLs
                        </a>

                        <a href="{{ route('admin.team-members.index') }}" class="{{ request()->routeIs('admin.team-members.*') ? 'text-blue-600 font-semibold' : 'text-gray-600 hover:text-blue-600' }} transition-colors">
                            Team Members
                        </a>

                        <a href="{{ route('admin.invitations.index') }}" class="{{ request()->routeIs('admin.invitations.*') ? 'text-blue-600 font-semibold' : 'text-gray-600 hover:text-blue-600' }} transition-colors">
                            Invitations
                        </a>

                    @endif

                    @if(auth()->user()->role === 'member')

                        <a href="{{ route('member.dashboard') }}" class="{{ request()->routeIs('member.dashboard') ? 'text-blue-600 font-semibold' : 'text-gray-600 hover:text-blue-600' }} transition-colors">
                            Dashboard
                        </a>

                        <a href="{{ route('member.short-urls.index') }}" class="{{ request()->routeIs('member.short-urls.*') ? 'text-blue-600 font-semibold' : 'text-gray-600 hover:text-blue-600' }} transition-colors">
                            My URLs
                        </a>

                    @endif

                </div>

                <div class="flex items-center gap-5">

                    <span class="text-gray-700 font-medium">
                        {{ auth()->user()->name }}
                    </span>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button class="text-red-500 hover:text-red-700 font-medium transition-colors">
                            Logout
                        </button>
                    </form>

                </div>

            </div>

        </div>

    </nav>

    <div class="max-w-7xl mx-auto px-6 py-8">

        @yield('content')

    </div>

</body>

</html>