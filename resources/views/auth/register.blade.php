<x-layout>
    <x-slot:title>Register</x-slot:title>
    <x-slot:heading>Join Our Platform</x-slot:heading>

    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-indigo-50 via-white to-indigo-100 p-6 sm:p-10 lg:p-16">
        <div 
            x-data="{ showPassword: false }"
            class="w-full max-w-lg bg-white/70 backdrop-blur-2xl border border-white/40 rounded-3xl shadow-[0_10px_40px_rgba(0,0,0,0.08)] p-10 sm:p-12 transform transition-all duration-300 hover:scale-[1.01]"
        >
            <!-- Header -->
            <div class="text-center mb-8">
                <h1 class="text-4xl font-extrabold text-indigo-700 mb-2 tracking-tight">Create Your Account</h1>
                <p class="text-gray-500 font-medium">Start your journey with us today 🚀</p>
            </div>

            <!-- Validation Errors -->
            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-600 rounded-xl shadow-sm">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Register Form -->
            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                <!-- Full Name -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Full Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" required
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-4 focus:ring-indigo-200 focus:border-indigo-400 bg-white/80 shadow-sm hover:shadow-md transition duration-200">
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Email Address</label>
                    <input type="email" name="email" value="{{ old('email') }}" required
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-4 focus:ring-indigo-200 focus:border-indigo-400 bg-white/80 shadow-sm hover:shadow-md transition duration-200">
                </div>

                <!-- Password -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
                    <div class="relative">
                        <input :type="showPassword ? 'text' : 'password'" name="password" required
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-4 focus:ring-indigo-200 focus:border-indigo-400 bg-white/80 shadow-sm hover:shadow-md transition duration-200">

                        <button type="button" @click="showPassword = !showPassword"
                            class="absolute inset-y-0 right-4 flex items-center text-gray-400 hover:text-indigo-600 transition">
                            <!-- Eye (hidden) -->
                            <svg x-show="!showPassword" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 
                                      7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>

                            <!-- Eye-slash (visible) -->
                            <svg x-show="showPassword" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 
                                      0-8.268-2.943-9.542-7a9.97 9.97 0 012.19-3.566m2.728-2.728A9.969 
                                      9.969 0 0112 5c4.477 0 8.268 2.943 9.542 7a9.971 
                                      9.971 0 01-4.173 5.233M3 3l18 18"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Confirm Password -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Confirm Password</label>
                    <input type="password" name="password_confirmation" required
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-4 focus:ring-indigo-200 focus:border-indigo-400 bg-white/80 shadow-sm hover:shadow-md transition duration-200">
                </div>

                <!-- Submit -->
                <button type="submit"
                    class="w-full py-3 px-6 text-lg font-semibold rounded-2xl text-white bg-gradient-to-r from-indigo-500 to-indigo-700 border-b-4 border-indigo-800 shadow-md transition-all hover:scale-[1.02] hover:shadow-lg focus:ring-4 focus:ring-indigo-300 focus:ring-offset-2">
                    Register Now
                </button>
            </form>

            <!-- Footer -->
            <p class="mt-8 text-center text-gray-600">
                Already have an account?
                <a href="/login" class="text-indigo-600 hover:text-indigo-800 font-semibold transition">Sign in</a>
            </p>
        </div>
    </div>

</x-layout>
