@extends('layouts.app')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-semibold">Add Intern</h1>
        <p class="text-sm text-gray-600">Capture details about a new intern.</p>
    </div>

    <form action="{{ route('interns.store') }}" method="POST" class="space-y-6">
        @csrf
        @include('interns.partials.form', ['intern' => null])
        <div class="flex items-center gap-3">
            <button type="submit" class="rounded bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">Save</button>
            <a href="{{ route('interns.index') }}" class="text-sm text-gray-600 hover:text-gray-800">Cancel</a>
        </div>
    </form>
@endsection
