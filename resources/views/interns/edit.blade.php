@extends('layouts.app')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-semibold">Edit Intern</h1>
        <p class="text-sm text-gray-600">Update the intern profile and assignment details.</p>
    </div>

    <form action="{{ route('interns.update', $intern) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')
        @include('interns.partials.form', ['intern' => $intern])
        <div class="flex items-center gap-3">
            <button type="submit" class="rounded bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">Update</button>
            <a href="{{ route('interns.index') }}" class="text-sm text-gray-600 hover:text-gray-800">Cancel</a>
        </div>
    </form>
@endsection
