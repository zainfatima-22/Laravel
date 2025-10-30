<x-layout>
    <x-slot:title>Login</x-slot:title>
    <x-slot:heading>Welcome Back</x-slot:heading>

    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-indigo-50 via-white to-indigo-100 p-6 sm:p-10 lg:p-16 relative overflow-hidden">
        <!-- Soft Background Glow -->
        <div class="absolute inset-0 bg-gradient-to-tr from-indigo-200 via-purple-100 to-indigo-300 opacity-40 blur-3xl animate-pulse-slow"></div>

        <div 
            x-data="{ showPassword: false }"
            class="relative w-full max-w-md p-10 sm:p-12 bg-white/80 backdrop-blur-2xl border border-white/30 rounded-3xl shadow-[0_10px_50px_rgba(0,0,0,0.15)] transition-all duration-500 hover:scale-[1.015] hover:shadow-[0_15px_60px_rgba(0,0,0,0.2)]"
        >
            <!-- Header -->
            <div class="text-center mb-8">
                <div class="inline-block p-3 bg-indigo-100 rounded-2xl mb-4 animate-fade-in">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-indigo-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M5.121 17.804A9 9 0 1118.878 6.197M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                <h1 class="text-4xl font-extrabold text-indigo-700 mb-2 tracking-tight">Welcome Back</h1>
                <p class="text-gray-500 font-medium">Sign in to your account to continue 💼</p>
            </div>

            <!-- Top Error Display -->
            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 rounded-xl shadow-sm animate-fade-in">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form -->
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Email Address</label>
                    <input 
                        type="email" 
                        name="email" 
                        value="{{ old('email') }}" 
                        required
                        class="w-full px-4 py-3 rounded-xl border 
                               @error('email') border-red-400 bg-red-50 @else border-gray-200 @enderror
                               focus:ring-4 focus:ring-indigo-200 focus:border-indigo-400 bg-white/80 
                               shadow-sm hover:shadow-md transition duration-200"
                    >
                    @error('email')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="relative" x-data="{ showPassword: false }">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
                    <input 
                        :type="showPassword ? 'text' : 'password'" 
                        name="password" 
                        value="{{ old('password') }}" 
                        required
                        class="w-full px-4 py-3 pr-12 rounded-xl border 
                               @error('password') border-red-400 bg-red-50 @else border-gray-200 @enderror
                               focus:ring-4 focus:ring-indigo-200 focus:border-indigo-400 bg-white/80 
                               shadow-sm hover:shadow-md transition duration-200"
                    >

                    <!-- Eye Toggle -->
                    <button 
                        type="button" 
                        @click="showPassword = !showPassword"
                        class="absolute inset-y-0 right-4 flex items-center text-gray-400 hover:text-indigo-500 transition"
                        tabindex="-1"
                    >
                        <template x-if="!showPassword">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                        </template>
                        <template x-if="showPassword">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7a9.97 9.97 0 012.19-3.566m2.728-2.728A9.969 9.969 0 0112 5c4.477 0 8.268 2.943 9.542 7a9.971 9.971 0 01-4.173 5.233M3 3l18 18"/>
                            </svg>
                        </template>
                    </button>

                    @error('password')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember + Forgot -->
                <div class="flex items-center justify-between">
                    <label class="flex items-center text-gray-600">
                        <input type="checkbox" name="remember" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        <span class="ml-2 text-sm">Remember me</span>
                    </label>
                    <a href="/forgot-password" class="text-sm text-indigo-600 hover:text-indigo-800 font-semibold transition">Forgot Password?</a>
                </div>

                <!-- Submit -->
                <button type="submit"
                        class="w-full py-3 px-6 text-lg font-semibold rounded-2xl text-white bg-gradient-to-r from-indigo-500 to-indigo-700 border-b-4 border-indigo-800 shadow-md transition-all hover:scale-[1.02] hover:shadow-lg focus:ring-4 focus:ring-indigo-300 focus:ring-offset-2">
                    Sign In
                </button>
            </form>

            <!-- Register -->
            <p class="mt-8 text-center text-gray-600">
                Don’t have an account?
                <a href="/register" class="text-indigo-600 hover:text-indigo-800 font-semibold">Create one</a>
            </p>
        </div>
    </div>

    <style>
        @keyframes fade-in {
            0% { opacity: 0; transform: translateY(10px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in { animation: fade-in 0.8s ease-out; }

        @keyframes pulse-slow {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.85; transform: scale(1.02); }
        }
        .animate-pulse-slow { animation: pulse-slow 6s ease-in-out infinite; }
    </style>
</x-layout>
