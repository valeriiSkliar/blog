<x-layout>
    <section>
        <div class="bg-white p-12 rounded-lg shadow-xl w-1/3">
            <h2 class="text-3xl font-bold mb-6 text-gray-800 border-b pb-2">Register</h2>

            <form action="/register" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700">Name</label>
                    <input
                        type="text"
                        name="name"
                        class="w-full p-2 mt-2 rounded border border-gray-300"
                        required
                        value="{{ old('name') }}"
                    >
                    @error('name')
                    <p class="text-blue-500 text-xs mt-3" >{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700">User Name</label>
                    <input
                        type="text"
                        name="username"
                        class="w-full p-2 mt-2 rounded border border-gray-300"
                        value="{{ old('username') }}"
                        required
                    >
                    @error('username')
                    <p class="text-blue-500 text-xs mt-3" >{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700">Email</label>
                    <input
                        type="email"
                        name="email"
                        class="w-full p-2 mt-2 rounded border border-gray-300"
                        value="{{ old('email') }}"
                        required
                    >
                    @error('email')
                    <p class="text-blue-500 text-xs mt-3" >{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700">Password</label>
                    <input
                        type="password"
                        name="password"
                        class="w-full p-2 mt-2 rounded border border-gray-300"
                        required
                    >
                    @error('password')
                    <p class="text-blue-500 text-xs mt-3" >{{ $message }}</p>
                    @enderror
                </div>

{{--                <div class="mb-4">--}}
{{--                    <label class="block text-gray-700">Confirm Password</label>--}}
{{--                    <input type="password" name="confirm_password" class="w-full p-2 mt-2 rounded border border-gray-300">--}}
{{--                </div>--}}

                <button type="submit" class="w-full p-2 bg-blue-500 text-white rounded mt-6">Register</button>
            </form>
        </div>
    </section>
</x-layout>
