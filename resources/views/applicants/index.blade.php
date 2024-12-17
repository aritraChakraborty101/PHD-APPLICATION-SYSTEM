<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Applicants') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('applicants.create') }}" class="btn btn-primary mb-3">Create New Applicant</a>

                    <form method="GET" action="{{ route('applicants.index') }}" class="mb-3">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Search by name or email" value="{{ request('search') }}">
                            <button type="submit" class="btn btn-secondary">Search</button>
                        </div>
                    </form>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($applicants as $applicant)
                                <tr>
                                    <td>{{ $applicant->name }}</td>
                                    <td>{{ $applicant->email }}</td>
                                    <td>{{ $applicant->phone }}</td>
                                    <td>
                                        <a href="{{ route('applicants.show', $applicant->id) }}" class="btn btn-info btn-sm">View</a>
                                        <a href="{{ route('applicants.edit', $applicant->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('applicants.destroy', $applicant->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">No applicants found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    {{ $applicants->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
