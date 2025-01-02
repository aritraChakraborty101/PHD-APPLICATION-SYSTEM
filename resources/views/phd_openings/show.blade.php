<!-- resources/views/phd_openings/show.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('PhD Opening Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-4">{{ $phd_opening->title }}</h1>

                    <div class="space-y-4">
                        <div>
                            <label for="research_area" class="block text-gray-700 font-medium">Research Area</label>
                            <p id="research_area" class="border border-gray-300 rounded-md w-full px-3 py-2">{{ $phd_opening->research_area }}</p>
                        </div>

                        <div>
                            <label for="description" class="block text-gray-700 font-medium">Description</label>
                            <p id="description" class="border border-gray-300 rounded-md w-full px-3 py-2">{{ $phd_opening->description }}</p>
                        </div>

                        <div>
                            <label for="qualifications" class="block text-gray-700 font-medium">Qualifications</label>
                            <p id="qualifications" class="border border-gray-300 rounded-md w-full px-3 py-2">{{ $phd_opening->qualifications }}</p>
                        </div>
                    </div>

                    <a href="{{ route('phd_openings.index') }}" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 mt-4">Back to List</a>

                    @if (Auth::user()->faculties->contains('id', $phd_opening->faculty_id))
                        <a href="{{ route('phd_openings.edit', $phd_opening->id) }}" class="px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 mt-4 ml-2">Edit</a>
                        <form action="{{ route('phd_openings.destroy', $phd_opening->id) }}" method="POST" class="inline-block mt-4 ml-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600">Delete</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
