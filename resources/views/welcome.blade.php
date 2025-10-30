<x-layout>
    <x-slot:title>Home</x-slot:title>
    <x-slot:heading>
        Home
    </x-slot:heading>
        @if(session('success'))
            <div 
                x-data="{ show: true }" 
                x-show="show" 
                x-init="setTimeout(() => show = false, 2000)" 
                x-transition
                class="max-w-3xl mx-auto mb-6 p-4 bg-green-100 text-green-800 rounded-lg border border-green-300 shadow">
                {{ session('success') }}
            </div>
        @endif
    <h1>Hello! Welcome to Home Page</h1>
</x-layout>    