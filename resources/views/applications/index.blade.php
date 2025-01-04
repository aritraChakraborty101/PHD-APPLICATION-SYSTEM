<!-- resources/views/applications/index.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Application Status') }}
        </h2>
    </x-slot>
 <!--if user is a student -->
    @if (Auth::user()->is_student)
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
    @endif
    @if (!Auth::user()->is_student)
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
                                <th class="w-1/3 px-4 py-2">Info</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($applications as $application)
                                <tr>
                                    <td class="border px-4 py-2">{{ $application->phdOpening->title }}</td>
                                    <td class="border px-4 py-2">{{ $application->status }}</td>
                                    <td class="border px-4 py-2">
                                        @if ($application->status == 'pending')
                                            <form action="{{ route('applications.accept', $application->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('PUT') <!-- This tells Laravel to treat the request as a PUT -->
                                                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700">Accept</button>
                                            </form>
                                            <form action="{{ route('applications.reject', $application->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('PUT') <!-- This tells Laravel to treat the request as a PUT -->
                                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700">Reject</button>
                                            </form>

                                        @endif
                                    </td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('applicants.show', $application->id) }}" class="text-blue-500 hover:text-blue-700">Applicant info</a>
                                    </td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endif
</x-app-layout>

