<x-layout>
    <x-slot:heading>
        Jobs Listings
    </x-slot:heading>
    <h1 class="font-bold text-lg text-blue-500"> {{ $job->employer->name }} </h1><br>
        <strong>{{ $job['Title'] }}</strong>: pays {{ $job['Salary'] }} per year.
</x-layout>    