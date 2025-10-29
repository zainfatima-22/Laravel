<x-layout>
    <x-slot:title>Job Details</x-slot:title>
    <x-slot:heading>Job Details</x-slot:heading>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <div class="min-h-screen bg-gray-50 flex items-start justify-center p-6 sm:p-10 lg:p-16">
        <div 
            x-data="{ isEditing: false }" 
            class="w-full max-w-4xl p-10 sm:p-12 bg-white/70 backdrop-blur-lg border border-white/30 rounded-3xl shadow-3xl transition duration-700 ease-in-out transform hover:scale-[1.005] overflow-hidden">

            <div class="mb-6">
                <a href="/jobs" class="inline-flex items-center text-indigo-600 hover:text-indigo-800 font-semibold transition duration-300 ease-in-out">
                    <svg class="w-5 h-5 mr-2 animate-pulse-once" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                    Back to Jobs
                </a>
            </div>

            <header class="text-center mb-10 border-b pb-6 border-indigo-200/50">
                <h1 class="text-xl font-bold tracking-widest uppercase text-indigo-600 animate-slide-in">
                    {{ $job->employer->name }}
                </h1>

                <h2 class="mt-2 text-5xl font-extrabold text-gray-900 leading-tight">
                    <template x-if="isEditing">
                        <input type="text" form="edit-form" name="title" value="{{ $job['Title'] }}" 
                               class="w-full text-center text-4xl p-2 border border-gray-300 rounded-lg focus:ring-4 focus:ring-indigo-200 focus:border-indigo-500 transition duration-200">
                    </template>
                    <template x-if="!isEditing">
                        <span>{{ $job['Title'] }}</span>
                    </template>
                </h2>
            </header>

            {{-- 🟢 FIX: The form now wraps ALL editable content, and the Save button is inside. --}}
            <form id="edit-form" method="POST" action="/jobs/{{ $job->id }}">
                @csrf
                @method('PATCH')

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
                    <div class="p-5 bg-white/90 rounded-xl shadow-lg border-l-4 border-green-500 hover:shadow-xl transition duration-300 ease-in-out transform hover:-translate-y-1">
                        <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">Annual Compensation</p>
                        <p class="mt-1 text-3xl font-bold text-green-700">
                            <template x-if="isEditing">
                                <input type="text" name="salary" value="{{ $job->Salary }}" 
                                       class="w-full text-2xl p-1 border border-gray-300 rounded-lg focus:ring-4 focus:ring-green-200 focus:border-green-500 transition duration-200">
                            </template>
                            <template x-if="!isEditing">
                                <span>{{ $job->Salary }}</span>
                            </template>
                        </p>
                    </div>

                    <div class="p-5 bg-white/90 rounded-xl shadow-lg border-l-4 border-blue-500 hover:shadow-xl transition duration-300 ease-in-out transform hover:-translate-y-1">
                        <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">Location</p>
                        <p class="mt-1 text-2xl font-semibold text-blue-700">
                            <template x-if="isEditing">
                                <input type="text" name="location" value="Remote / NYC" 
                                       class="w-full text-2xl p-1 border border-gray-300 rounded-lg focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition duration-200">
                            </template>
                            <template x-if="!isEditing">
                                <span>Remote / NYC</span>
                            </template>
                        </p>
                    </div>

                    <div class="p-5 bg-white/90 rounded-xl shadow-lg border-l-4 border-yellow-500 hover:shadow-xl transition duration-300 ease-in-out transform hover:-translate-y-1">
                        <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">Employment Type</p>
                        <p class="mt-1 text-2xl font-semibold text-yellow-700">
                            <template x-if="isEditing">
                                <input type="text" name="type" value="Full-time" 
                                       class="w-full text-2xl p-1 border border-gray-300 rounded-lg focus:ring-4 focus:ring-yellow-200 focus:border-yellow-500 transition duration-200">
                            </template>
                            <template x-if="!isEditing">
                                <span>Full-time</span>
                            </template>
                        </p>
                    </div>
                </div>

                <div class="pt-8 space-y-6">
                    <h3 class="text-2xl font-bold text-gray-800 border-b pb-3">About the Role</h3>
                    <template x-if="isEditing">
                        <textarea name="description"
                                rows="8"
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-4 focus:ring-indigo-200 focus:border-indigo-500 transition duration-200 ease-in-out shadow-sm hover:shadow-md">
                            {{ $job['Description'] ?? 'This is where the full, rich job description will go. We are looking for a highly motivated individual to join our growing team. You will be responsible for ... (Detailed description content here).' }}
                        </textarea>
                    </template>

                    <template x-if="!isEditing">
                        @if(!empty($job['description']))
                            <p class="text-gray-600 leading-relaxed">
                                {{ $job['description'] }}
                            </p>
                        @else
                            <p class="text-gray-500 italic leading-relaxed">
                                This is where the full, rich job description will go. We are looking for a highly motivated individual to join our growing team. You will be responsible for ... (Detailed description content here).
                            </p>
                        @endif
                    </template>

                    <h3 class="text-2xl font-bold text-gray-800 border-b pb-3">Perks & Benefits</h3>
                    <ul class="list-disc list-inside text-gray-600 pl-4 space-y-2">
                        <li class="hover:text-indigo-600 transition-colors">Unlimited Paid Time Off (PTO)</li>
                        <li class="hover:text-indigo-600 transition-colors">Full Health, Dental, and Vision Coverage</li>
                        <li class="hover:text-indigo-600 transition-colors">Flexible working hours and remote options</li>
                    </ul>
                </div>


                <div class="mt-12 flex justify-center space-x-4">
                    <template x-if="isEditing">
                        <button type="submit" 
                                class="inline-flex items-center py-3 px-8 text-lg font-bold rounded-xl shadow-2xl text-white bg-green-600 border-b-4 border-green-800 transition-all hover:bg-green-700 hover:border-green-900 focus:ring-4 focus:ring-offset-2 focus:ring-green-500 transform hover:scale-105">
                            Save Changes
                        </button>
                    </template>
                    
                    <template x-if="!isEditing">
                        <a href="/jobs/{{ $job['id'] }}/apply" 
                           class="inline-flex items-center py-4 px-10 border border-transparent text-lg font-bold rounded-full shadow-2xl text-white bg-indigo-600 border-b-4 border-indigo-800 transition-all duration-300 ease-in-out hover:bg-indigo-700 hover:border-indigo-900 focus:outline-none focus:ring-4 focus:ring-offset-2 focus:ring-indigo-500 transform hover:scale-105 active:scale-95 active:border-b-0 active:pt-[17px]">
                            Apply Now
                        </a>
                    </template>

                    <template x-if="!isEditing">
                        <button type="button" @click="isEditing = true"
                                class="inline-flex items-center py-3 px-8 text-lg font-medium rounded-xl text-indigo-600 bg-white border border-indigo-300 shadow-md transition-all hover:bg-indigo-50 hover:text-indigo-700 focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transform hover:scale-[1.01]">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                            </svg>
                            Edit Job
                        </button>
                    </template>
                    
                    <template x-if="isEditing">
                        <button type="button" @click="isEditing = false"
                                class="inline-flex items-center py-3 px-8 text-lg font-medium rounded-xl text-gray-600 bg-white border border-gray-300 shadow-md transition-all hover:bg-gray-50 hover:text-indigo-600 focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transform hover:scale-[1.01]">
                            Cancel
                        </button>
                    </template>

                    <template x-if="!isEditing">
                        <form method="POST" action="/jobs/{{ $job->id }}" 
                            onsubmit="return confirm('Are you sure you want to delete this job?')" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="inline-flex items-center py-4 px-8 text-lg font-medium rounded-xl shadow-md text-white bg-red-600 border-b-4 border-red-800 transition-all hover:bg-red-700 hover:border-red-900 focus:ring-4 focus:ring-offset-2 focus:ring-red-500 transform hover:scale-[1.01]">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                                Delete
                            </button>
                        </form>
                    </template>
                </div>
            </form>
        </div>
    </div>

    <style>
        @keyframes pulse-once {
            0% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.05); opacity: 0.8; }
            100% { transform: scale(1); opacity: 1; }
        }
        .animate-pulse-once {
            animation: pulse-once 1.5s ease-in-out 1;
        }
        .shadow-3xl {
            box-shadow: 0 35px 60px -15px rgba(0, 0, 0, 0.3),
                        0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        @keyframes slide-in {
            0% { opacity: 0; transform: translateX(-20px); }
            100% { opacity: 1; transform: translateX(0); }
        }
        .animate-slide-in {
            animation: slide-in 0.7s ease-out;
        }
    </style>
</x-layout>