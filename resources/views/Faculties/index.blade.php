<x-app-layout>
    <!-- Header Slot -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show All Faculties') }}
        </h2>
    </x-slot>

    <!-- Main Content -->
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-4">Faculties</h1>

        <form method="GET" action="{{ route('faculties.index') }}">
            <input type="text" name="search" placeholder="Search..." value="{{ request('search') }}" class="border p-2">
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Search</button>
        </form>

        <table class="table-auto w-full mt-4">
            <thead>
                <tr>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($faculties as $faculty)
                    <tr>
                        <td class="border px-4 py-2">
                            <a href="{{ route('faculties.show', $faculty->id) }}" class="text-blue-500 hover:underline">
                                {{ $faculty->name }}
                            </a>
                        </td>
                        <td class="border px-4 py-2">{{ $faculty->email }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('faculties.show', $faculty->id) }}" class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600">
                                View
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $faculties->links() }}
        </div>
    </div>
</x-app-layout>
