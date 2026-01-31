<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intern Management System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="bg-gray-100 text-gray-900">
    <div class="min-h-screen">
        <nav class="bg-white shadow">
            <div class="max-w-5xl mx-auto px-4 py-4 flex items-center justify-between">
                <span class="text-lg font-semibold">Intern Management System</span>
                <a href="{{ route('interns.index') }}" class="text-blue-600 hover:text-blue-800">Interns</a>
            </div>
        </nav>

        <main class="max-w-5xl mx-auto px-4 py-8">
            @if (session('status'))
                <div class="mb-6 rounded border border-green-200 bg-green-50 p-4 text-green-700">
                    {{ session('status') }}
                </div>
            @endif

            @yield('content')
        </main>
    </div>
</body>
</html>
