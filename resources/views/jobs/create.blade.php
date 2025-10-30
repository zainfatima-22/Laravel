<x-layout>
    <x-slot:title>Create Job</x-slot:title>
    <x-slot:heading>
        Create Job
    </x-slot:heading>

    <div class="min-h-screen bg-gray-50 flex items-start justify-center p-6 sm:p-10 lg:p-16">
        <div class="w-full max-w-4xl p-8 sm:p-12 lg:p-16 bg-white/70 backdrop-blur-lg border border-white/30 rounded-3xl shadow-2xl transition duration-700 ease-in-out hover:shadow-3xl hover:border-indigo-400/50 transform hover:scale-[1.01] overflow-hidden">
            
            <header class="mb-10 text-center relative z-10">
                <h2 class="text-4xl font-extrabold text-indigo-700 tracking-tight sm:text-5xl transition duration-500 ease-in-out hover:text-indigo-900">
                    Post a New Opportunity
                </h2>
                <p class="mt-3 text-lg text-gray-600">
                    Fill out the details to attract the best talent for your next hire.
                </p>
                <div class="h-1 w-20 bg-indigo-500 mx-auto mt-4 rounded-full animate-pulse-slow"></div>
            </header>

            <form action="/jobs" method="POST" class="space-y-8">
                @csrf
                
                @if ($errors->any())
                    <div class="p-4 rounded-xl bg-red-100 border border-red-400 text-red-700 transition duration-300 ease-in-out animate-shake">
                        <div class="flex items-center">
                            <svg class="h-6 w-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.398 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                            <span class="font-semibold text-lg">Please correct the following errors:</span>
                        </div>
                        <ul class="mt-2 list-disc list-inside ml-4 space-y-1 text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="p-6 bg-white/80 rounded-2xl shadow-lg hover:shadow-xl transition duration-300 ease-in-out hover:bg-white/90">
                    <h3 class="text-xl font-semibold text-gray-800 mb-6 border-b pb-2">Core Information</h3>
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                        
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Job Title</label>
                            <input 
                                type="text" 
                                name="title" 
                                id="title" 
                                placeholder="e.g., Senior Frontend Engineer" 
                                value="{{ old('title') }}"
                                class="w-full p-3 border rounded-lg focus:ring-4 transition duration-200 ease-in-out shadow-sm hover:shadow-md 
                                    @error('title') border-red-500 focus:border-red-500 focus:ring-red-200 @else border-gray-300 focus:border-indigo-500 focus:ring-indigo-200 @enderror">

                            @error('title')
                                <p class="text-sm text-red-500 mt-1 animate-fade-in-down">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="salary" class="block text-sm font-medium text-gray-700 mb-1">Salary Range ($)</label>
                            <input 
                                type="text" 
                                name="salary" 
                                id="salary" 
                                placeholder="e.g., 100k - 140k USD" 
                                value="{{ old('salary') }}"
                                class="w-full p-3 border rounded-lg focus:ring-4 transition duration-200 ease-in-out shadow-sm hover:shadow-md
                                    @error('salary') border-red-500 focus:border-red-500 focus:ring-red-200 @else border-gray-300 focus:border-indigo-500 focus:ring-indigo-200 @enderror">

                            @error('salary')
                                <p class="text-sm text-red-500 mt-1 animate-fade-in-down">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                </div>

                <div class="p-6 bg-white/80 rounded-2xl shadow-lg hover:shadow-xl transition duration-300 ease-in-out hover:bg-white/90">
                    <h3 class="text-xl font-semibold text-gray-800 mb-6 border-b pb-2">Job Description</h3>
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Detailed Description</label>
                        <textarea 
                            name="description" 
                            id="description" 
                            rows="8" 
                            placeholder="Outline the responsibilities, requirements, and benefits of the role..." 
                            class="w-full p-3 border rounded-lg focus:ring-4 transition duration-200 ease-in-out shadow-sm hover:shadow-md
                                @error('description') border-red-500 focus:border-red-500 focus:ring-red-200 @else border-gray-300 focus:border-indigo-500 focus:ring-indigo-200 @enderror"
                        >{{ old('description') }}</textarea>
                        
                        @error('description')
                            <p class="text-sm text-red-500 mt-1 animate-fade-in-down">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="pt-8 flex flex-col items-center space-y-4">
                    <button type="submit" class="w-full max-w-sm inline-flex justify-center items-center py-4 px-10 text-xl font-bold rounded-xl text-white bg-indigo-600 border-b-4 border-indigo-800 shadow-2xl transition-all duration-300 ease-in-out hover:bg-indigo-700 hover:border-indigo-900 focus:outline-none focus:ring-4 focus:ring-offset-2 focus:ring-indigo-500 transform hover:scale-[1.02] active:scale-95 active:border-b-0 active:pt-[17px]">
                        Publish Job Posting
                        <svg class="ml-3 h-7 w-7 animate-wobble" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </button>
                    
                    <a href="/jobs" class="w-full max-w-sm inline-flex justify-center items-center py-3 px-10 text-lg font-medium rounded-xl text-gray-600 bg-white border border-gray-300 shadow-md transition-all duration-300 ease-in-out hover:bg-gray-50 hover:text-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transform hover:scale-[1.01] active:scale-95">
                        Cancel
                    </a>
                </div>
            </form>

        </div>
    </div>

    <style>
        /* All custom styles are consistent across all pages now */
        @keyframes wobble {
            0%, 100% { transform: translateX(0); }
            15% { transform: translateX(-5px); }
            30% { transform: translateX(5px); }
            45% { transform: translateX(-3px); }
            60% { transform: translateX(3px); }
            75% { transform: translateX(-1px); }
        }
        .animate-wobble {
            animation: wobble 2.5s infinite;
        }

        @keyframes pulse-slow {
            0%, 100% { opacity: 1; }
            50% { opacity: .5; }
        }
        .animate-pulse-slow {
            animation: pulse-slow 4s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }
        
        @keyframes fade-in-down {
            0% { opacity: 0; transform: translateY(-10px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in-down {
            animation: fade-in-down 0.4s ease-out;
        }
        
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            20%, 60% { transform: translateX(-5px); }
            40%, 80% { transform: translateX(5px); }
        }
        .animate-shake {
            animation: shake 0.5s ease-in-out;
        }

        .shadow-3xl {
            box-shadow: 0 35px 60px -15px rgba(0, 0, 0, 0.3), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
    </style>

</x-layout>