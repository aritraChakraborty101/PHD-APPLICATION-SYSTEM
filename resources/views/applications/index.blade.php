<!-- resources/views/applications/index.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Application Status') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-4">All Applications</h1>

                    <table class="min-w-full bg-white">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="w-1/3 px-4 py-2">PhD Opening</th>
                                <th class="w-1/3 px-4 py-2">Status</th>
                                <th class="w-1/3 px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($applications as $application)
                                <tr>
                                    <td class="border px-4 py-2">{{ $application->phdOpening->title }}</td>
                                    <td class="border px-4 py-2">{{ $application->status }}</td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('applications.show', $application->id) }}" class="text-blue-500 hover:text-blue-700">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

