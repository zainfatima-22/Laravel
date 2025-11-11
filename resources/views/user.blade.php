<x-layout>
    <x-slot:title>User Management</x-slot:title>
    <x-slot:heading>
        All Users ({{ $users->total() }}) 
    </x-slot:heading>

    <div class="space-y-6">
        <form method="GET" action="{{ url('/user') }}" class="flex flex-col md:flex-row justify-between items-center bg-white p-4 rounded-xl shadow-md border border-gray-100">
            
            <input type="text" 
                   name="search"                                       
                   placeholder="Search users by name or email..." 
                   value="{{ request('search') }}"                  
                   class="w-full md:w-1/3 p-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 mb-4 md:mb-0">
            
            <div class="flex space-x-4">
                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700 transition duration-150 text-center">
                    Search Users
                </button>
                
                @if (request('search'))
                    <a href="{{ url('/user') }}" class="px-4 py-2 bg-gray-300 text-gray-800 font-semibold rounded-lg hover:bg-gray-400 transition duration-150 text-center">
                        Clear Search
                    </a>
                @endif

                <a href="#" class="px-4 py-2 bg-green-500 text-white font-semibold rounded-lg hover:bg-green-600 transition duration-150 text-center">
                    + Add New User
                </a>
            </div>
        </form>

        ---

        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @forelse ($users as $user)
                <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 border border-gray-100 p-5 flex flex-col justify-between">
                    <div class="flex items-start">
                        {{-- User Avatar Placeholder --}}
                        <div class="flex-shrink-0 w-12 h-12 rounded-full bg-gray-200 flex items-center justify-center text-gray-500 text-lg font-bold">
                            {{ $user->name[0] ?? 'U' }}
                        </div>
                        <div class="ml-4 overflow-hidden">
                            <h2 class="text-xl font-bold text-gray-900 truncate">
                                {{ $user->name }}
                            </h2>
                            <p class="text-sm text-gray-500 truncate">{{ $user->email }}</p>
                        </div>
                    </div>

                    <div class="mt-4 pt-4 border-t border-gray-100 flex justify-between items-center text-sm text-gray-500">
                        <span class="flex items-center">
                            <svg class="w-4 h-4 mr-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            Joined: {{ $user->created_at->format('M d, Y') }}
                        </span>
                        
                        <a href="#" class="text-indigo-600 hover:text-indigo-900 font-medium">
                            View Profile
                        </a>
                    </div>
                </div>
            @empty
                <p class="text-center text-gray-500 col-span-full py-8">
                    @if (request('search'))
                        No users found matching "{{ request('search') }}".
                    @else
                        No users found.
                    @endif
                </p>
            @endforelse
        </div>

        ---
        
        @if ($users->hasPages())
            <div class="pt-6">
                {{ $users->appends(request()->query())->links() }} 
            </div>
        @endif

    </div>
</x-layout>