<x-guest-layout>

    <div class="w-full max-w-md mx-auto">

        <h2 class="text-2xl font-bold mb-6">
            Accept Invitation
        </h2>

        <div class="bg-white p-6 rounded shadow">

            <p class="mb-4">
                {{ $invitation->name }}
            </p>

            <p class="mb-6">
                {{ $invitation->email }}
            </p>

            <form method="POST">
                @csrf

                <div class="mb-5">
                    <label>Password</label>

                    <input
                        type="password"
                        name="password"
                        class="w-full border rounded p-2"
                        required
                    >
                </div>

                <div class="mb-5">
                    <label>Confirm Password</label>

                    <input
                        type="password"
                        name="password_confirmation"
                        class="w-full border rounded p-2"
                        required
                    >
                </div>

                <button class="bg-blue-600 text-white px-5 py-2 rounded">
                    Create Account
                </button>

            </form>

        </div>

    </div>

</x-guest-layout>