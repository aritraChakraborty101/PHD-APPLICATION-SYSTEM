<!-- resources/views/faculties/index.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Faculties') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('faculties.create') }}" class="btn btn-primary mb-3">Create New Faculty</a>

                    <form method="GET" action="{{ route('faculties.index') }}" class="mb-3">
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
                                <th>Department</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($faculties as $faculty)
                                <tr>
                                    <td>{{ $faculty->name }}</td>
                                    <td>{{ $faculty->email }}</td>
                                    <td>{{ $faculty->phone }}</td>
                                    <td>{{ $faculty->department }}</td>
                                    <td>
                                        <a href="{{ route('faculties.show', $faculty->id) }}" class="btn btn-info btn-sm">View</a>
                                        <a href="{{ route('faculties.edit', $faculty->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('faculties.destroy', $faculty->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">No faculties found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    {{ $faculties->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
