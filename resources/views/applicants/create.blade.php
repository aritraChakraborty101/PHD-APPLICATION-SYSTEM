@if (Auth::user()->is_student)
<x-app-layout>
    <!-- Header Slot -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Applicant') }}
        </h2>
    </x-slot>

    <!-- Main Content -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-4">Create New Applicant</h1>

                    <!-- Applicant Creation Form -->
                    <form action="{{ route('applicants.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label for="name" class="block text-gray-700 font-medium">Name</label>
                            <input type="text" name="name" id="name" class="border border-gray-300 rounded-md w-full px-3 py-2" required>
                        </div>

                        <div>
                            <label for="email" class="block text-gray-700 font-medium">Email</label>
                            <input type="email" name="email" id="email" class="border border-gray-300 rounded-md w-full px-3 py-2" required>
                        </div>

                        <div>
                            <label for="phone" class="block text-gray-700 font-medium">Phone</label>
                            <input type="text" name="phone" id="phone" class="border border-gray-300 rounded-md w-full px-3 py-2">
                        </div>

                        <div>
                            <label for="address" class="block text-gray-700 font-medium">Address</label>
                            <textarea name="address" id="address" class="border border-gray-300 rounded-md w-full px-3 py-2"></textarea>
                        </div>

                        <div>
                            <label for="academic_details" class="block text-gray-700 font-medium">Academic Details</label>
                            <textarea name="academic_details" id="academic_details" class="border border-gray-300 rounded-md w-full px-3 py-2"></textarea>
                        </div>

                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                            Create Applicant
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
@endif
<!-- resources/views/access_denied.blade.php -->

<h2>You do not have permission</h2>




