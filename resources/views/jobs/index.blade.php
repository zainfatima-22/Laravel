<x-layout>
    <x-slot:title>All Jobs</x-slot:title>
    <x-slot:heading>
        Jobs Listings
    </x-slot:heading>

    <div class="min-h-screen bg-gray-50 p-6 sm:p-10 lg:p-16 relative">

        @if(session('success'))
            <div class="max-w-3xl mx-auto mb-6 p-4 bg-green-100 text-green-800 rounded-lg border border-green-300 shadow">
                {{ session('success') }}
            </div>
        @endif

        <header class="mb-12 text-center">
            <h1 class="text-5xl font-extrabold text-indigo-700 tracking-tight sm:text-6xl animate-fade-in">
                Explore Top Opportunities
            </h1>
            <p class="mt-4 text-xl text-gray-600">
                Discover the latest openings that are currently available.
            </p>
            <div class="h-1 w-24 bg-indigo-500 mx-auto mt-5 rounded-full animate-pulse-slow"></div>
        </header>

        <div class="fixed bottom-10 right-10 z-50">
            <a href="/jobs/create"
               class="inline-flex items-center py-4 px-6 text-lg font-bold rounded-full text-white bg-indigo-600 border-b-4 border-indigo-800 shadow-2xl transition-all duration-300 ease-in-out hover:bg-indigo-700 hover:border-indigo-900 focus:outline-none focus:ring-4 focus:ring-offset-4 focus:ring-indigo-500 transform hover:scale-110 active:scale-95 active:border-b-0 active:pt-[17px] animate-bounce-slow">
                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                     xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Create Job
            </a>
        </div>

        <div class="space-y-6 max-w-5xl mx-auto">

            @foreach ($jobs as $job)
                <div
                    class="p-6 bg-white/70 backdrop-blur-md border border-white/30 rounded-2xl shadow-lg transition duration-300 ease-in-out transform hover:scale-[1.01] hover:shadow-xl hover:border-indigo-400/50"
                >
                    <div class="flex items-center justify-between">
                        <a href="/jobs/{{ $job['id'] }}" class="flex-1 block">
                            <div class="font-bold text-sm tracking-wider uppercase text-indigo-600 mb-1">
                                {{ $job->employer->name }}
                            </div>
                            <div class="text-2xl font-semibold text-gray-800 transition duration-300 hover:text-indigo-700">
                                {{ $job['Title'] }}
                            </div>
                        </a>

                        <div class="flex items-center gap-2 ml-4">
                            <span
                                class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-full bg-green-100 text-green-800 border border-green-300 shadow-inner">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Pays {{ $job['Salary'] }}
                            </span>

                            
                                <form method="POST" action="/jobs/{{ $job->id }}"
                                      onsubmit="return confirm('Are you sure you want to delete this job?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="inline-flex items-center px-3 py-2 text-sm font-semibold text-white bg-red-600 rounded-full hover:bg-red-700 focus:outline-none focus:ring-4 focus:ring-offset-2 focus:ring-red-400 transition">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M1 7h22M10 3h4a1 1 0 011 1v1H9V4a1 1 0 011-1z"/>
                                        </svg>
                                    </button>
                                </form>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="py-6 flex justify-center">
                {{ $jobs->links() }}
            </div>
        </div>
    </div>

    <style>
        /* Smooth fade-in animation */
        @keyframes fade-in {
            0% { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in { animation: fade-in 0.8s ease-out; }

        /* Slow pulse for the separator */
        @keyframes pulse-slow {
            0%, 100% { opacity: 1; }
            50% { opacity: .5; }
        }
        .animate-pulse-slow {
            animation: pulse-slow 4s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        /* Slow bounce for floating button */
        @keyframes bounce-slow {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        .animate-bounce-slow { animation: bounce-slow 3s infinite; }
    </style>
</x-layout>
