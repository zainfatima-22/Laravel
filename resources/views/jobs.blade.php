<x-layout>
    <x-slot:heading>
        Jobs Listings
    </x-slot:heading>
    <h1>Hello! Welcome to JOBS that are currently oppened.</h1><br>
    
        @foreach ($jobs as $job)
        <li>
            <a href = "/jobs/ {{ $job['id'] }} " class="text-blue-500 hover:underline">
                <strong>{{ $job['Title'] }}</strong>: pays {{ $job['Salary'] }} per year.
            </a>
        </li>
        @endforeach
    
</x-layout>    