<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Faculty Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-4">{{ $faculty->name }}</h1>

                    <div class="space-y-4">
                        <div>
                            <label for="name" class="block text-gray-700 font-medium">Name</label>
                            <p id="name" class="border border-gray-300 rounded-md w-full px-3 py-2">{{ $faculty->name }}</p>
                        </div>

                        <div>
                            <label for="email" class="block text-gray-700 font-medium">Email</label>
                            <p id="email" class="border border-gray-300 rounded-md w-full px-3 py-2">{{ $faculty->email }}</p>
                        </div>

                        <div>
                            <label for="phone" class="block text-gray-700 font-medium">Phone</label>
                            <p id="phone" class="border border-gray-300 rounded-md w-full px-3 py-2">{{ $faculty->phone }}</p>
                        </div>

                        <div>
                            <label for="address" class="block text-gray-700 font-medium">Address</label>
                            <p id="address" class="border border-gray-300 rounded-md w-full px-3 py-2">{{ $faculty->address }}</p>
                        </div>

                        <div>
                            <label for="department" class="block text-gray-700 font-medium">Department</label>
                            <p id="department" class="border border-gray-300 rounded-md w-full px-3 py-2">{{ $faculty->department }}</p>
                        </div>
                    </div>

                    <a href="{{ route('faculties.index') }}" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                        Back to List
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
