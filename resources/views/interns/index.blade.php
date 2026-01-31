@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-semibold">Intern Directory</h1>
            <p class="text-sm text-gray-600">Manage active interns and their assignments.</p>
        </div>
        <a href="{{ route('interns.create') }}" class="inline-flex items-center rounded bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">
            Add Intern
        </a>
    </div>

    <div class="overflow-hidden rounded-lg bg-white shadow">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-600">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-600">University</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-600">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-600">Mentor</th>
                    <th class="px-6 py-3"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse ($interns as $intern)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">
                            <div class="font-medium">{{ $intern->first_name }} {{ $intern->last_name }}</div>
                            <div class="text-sm text-gray-500">{{ $intern->email }}</div>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600">
                            {{ $intern->university }}
                            @if ($intern->department)
                                <div class="text-xs text-gray-500">{{ $intern->department }}</div>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex rounded-full bg-blue-100 px-3 py-1 text-xs font-semibold text-blue-700">
                                {{ ucfirst($intern->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600">
                            {{ $intern->mentor_name ?? 'Not assigned' }}
                        </td>
                        <td class="px-6 py-4 text-right text-sm">
                            <a href="{{ route('interns.edit', $intern) }}" class="text-blue-600 hover:text-blue-800">Edit</a>
                            <form action="{{ route('interns.destroy', $intern) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="ml-3 text-red-600 hover:text-red-800" onclick="return confirm('Delete this intern?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-8 text-center text-sm text-gray-500">
                            No interns found. Add your first intern to get started.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $interns->links() }}
    </div>
@endsection
