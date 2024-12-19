<!-- resources/views/applicants/edit.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Applicant') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-4">Edit Applicant</h1>

                    <form action="{{ route('applicants.update', $applicant->id) }}" method="POST" class="space-y-4">
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="name" class="block text-gray-700 font-medium">Name</label>
                            <input type="text" name="name" id="name" class="border border-gray-300 rounded-md w-full px-3 py-2" value="{{ $applicant->name }}" required>
                        </div>

                        <div>
                            <label for="email" class="block text-gray-700 font-medium">Email</label>
                            <input type="email" name="email" id="email" class="border border-gray-300 rounded-md w-full px-3 py-2" value="{{ $applicant->email }}" required>
                        </div>

                        <div>
                            <label for="phone" class="block text-gray-700 font-medium">Phone</label>
                            <input type="text" name="phone" id="phone" class="border border-gray-300 rounded-md w-full px-3 py-2" value="{{ $applicant->phone }}">
                        </div>

                        <div>
                            <label for="address" class="block text-gray-700 font-medium">Address</label>
                            <textarea name="address" id="address" class="border border-gray-300 rounded-md w-full px-3 py-2">{{ $applicant->address }}</textarea>
                        </div>

                        <div>
                            <label for="academic_details" class="block text-gray-700 font-medium">Academic Details</label>
                            <textarea name="academic_details" id="academic_details" class="border border-gray-300 rounded-md w-full px-3 py-2">{{ $applicant->academic_details }}</textarea>
                        </div>

                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                            Update Applicant
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
