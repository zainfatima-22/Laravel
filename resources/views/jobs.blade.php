<x-layout>
    <x-slot:heading>
        Jobs Listings
    </x-slot:heading>
    <h1>Hello! Welcome to JOBS that are currently oppened.</h1><br>
    <div class="space-y-4">
        @foreach ($jobs as $job)
            <a href = "/jobs/ {{ $job['id'] }} " class="block px-4 py-6 border border-gray-200 rounded-lg hover:border-blue-500">
                <div class="font-bold text-blue-500 text-sm">{{ $job->employer->name }}</div>
                <div>
                    <strong>{{ $job['Title'] }}</strong>: pays {{ $job['Salary'] }} per year.
                </div>
            </a>
        @endforeach
        <div>
            {{ $jobs -> links() }}
        </div>
    </div>    
    
</x-layout>    