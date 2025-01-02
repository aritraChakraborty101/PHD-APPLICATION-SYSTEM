<!-- resources/views/phd_openings/index.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show All PhD Openings') }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-4">PhD Openings</h1>

        <form method="GET" action="{{ route('phd_openings.index') }}">
            <input type="text" name="search" placeholder="Search..." value="{{ request('search') }}" class="border p-2">
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Search</button>
        </form>

        <table class="table-auto w-full mt-4">
            <thead>
                <tr>
                    <th class="px-4 py-2">Title</th>
                    <th class="px-4 py-2">Research Area</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($phd_openings as $opening)
                    <tr>
                        <td class="border px-4 py-2">
                            <a href="{{ route('phd_openings.show', $opening->id) }}" class="text-blue-500 hover:underline">
                                {{ $opening->title }}
                            </a>
                        </td>
                        <td class="border px-4 py-2">{{ $opening->research_area }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('phd_openings.show', $opening->id) }}" class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600">
                                View
                            </a>
                            @if (Auth::user()->faculties->contains('id', $opening->faculty_id))
                                <a href="{{ route('phd_openings.edit', $opening->id) }}" class="px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600">
                                    Edit
                                </a>
                                <form action="{{ route('phd_openings.destroy', $opening->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600"
                                            onclick="return confirm('Are you sure you want to delete this opening?')">
                                        Delete
                                    </button>
                                </form>
                            @else
                                @if (Auth::user()->is_student)
                                    <form action="{{ route('applications.apply', $opening->id) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600">
                                            Apply
                                        </button>
                                    </form>
                                @endif
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $phd_openings->links() }}
        </div>
    </div>
</x-app-layout>
