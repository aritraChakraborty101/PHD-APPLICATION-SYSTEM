<!-- resources/views/applications/show.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Application Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-4">Application Details</h1>

                    <div class="space-y-4">
                        <div>
                            <label for="title" class="block text-gray-700 font-medium">PhD Opening Title</label>
                            <p id="title" class="border border-gray-300 rounded-md w-full px-3 py-2">{{ $application->phdOpening->title }}</p>
                        </div>

                        <div>
                            <label for="status" class="block text-gray-700 font-medium">Status</label>
                            <p id="status" class="border border-gray-300 rounded-md w-full px-3 py-2">{{ $application->status }}</p>
                        </div>

                        <div>
                            <label for="description" class="block text-gray-700 font-medium">Description</label>
                            <p id="description" class="border border-gray-300 rounded-md w-full px-3 py-2">{{ $application->phdOpening->description }}</p>
                        </div>

                        <div>
                            <label for="research_area" class="block text-gray-700 font-medium">Research Area</label>
                            <p id="research_area" class="border border-gray-300 rounded-md w-full px-3 py-2">{{ $application->phdOpening->research_area }}</p>
                        </div>

                        <div>
                            <label for="qualifications" class="block text-gray-700 font-medium">Qualifications</label>
                            <p id="qualifications" class="border border-gray-300 rounded-md w-full px-3 py-2">{{ $application->phdOpening->qualifications }}</p>
                        </div>
                    </div>

                    <a href="{{ route('applications.index') }}" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 mt-4">Back to List</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
