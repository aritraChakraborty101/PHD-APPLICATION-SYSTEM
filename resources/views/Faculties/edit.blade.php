<!-- resources/views/faculties/edit.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Faculty') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-4">Edit Faculty</h1>

                    <form action="{{ route('faculties.update', $faculty->id) }}" method="POST" class="space-y-4">
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="name" class="block text-gray-700 font-medium">Name</label>
                            <input type="text" name="name" id="name" class="border border-gray-300 rounded-md w-full px-3 py-2" value="{{ $faculty->name }}" required>
                        </div>

                        <div>
                            <label for="email" class="block text-gray-700 font-medium">Email</label>
                            <input type="email" name="email" id="email" class="border border-gray-300 rounded-md w-full px-3 py-2" value="{{ $faculty->email }}" required>
                        </div>

                        <div>
                            <label for="phone" class="block text-gray-700 font-medium">Phone</label>
                            <input type="text" name="phone" id="phone" class="border border-gray-300 rounded-md w-full px-3 py-2" value="{{ $faculty->phone }}">
                        </div>

                        <div>
                            <label for="department" class="block text-gray-700 font-medium">Department</label>
                            <textarea name="department" id="department" class="border border-gray-300 rounded-md w-full px-3 py-2">{{ $faculty->department }}</textarea>
                        </div>

                        <div>
                            <label for="research_interests" class="block text-gray-700 font-medium">Research Interests</label>
                            <textarea name="research_interests" id="research_interests" class="border border-gray-300 rounded-md w-full px-3 py-2">{{ $faculty->research_interests }}</textarea>
                        </div>

                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                            Update Faculty
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
