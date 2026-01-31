<div class="grid gap-6 rounded-lg bg-white p-6 shadow">
    <div class="grid gap-4 md:grid-cols-2">
        <div>
            <label class="text-sm font-medium text-gray-700">First name</label>
            <input name="first_name" type="text" value="{{ old('first_name', optional($intern)->first_name) }}" class="mt-1 w-full rounded border-gray-300 shadow-sm" required>
            @error('first_name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label class="text-sm font-medium text-gray-700">Last name</label>
            <input name="last_name" type="text" value="{{ old('last_name', optional($intern)->last_name) }}" class="mt-1 w-full rounded border-gray-300 shadow-sm" required>
            @error('last_name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label class="text-sm font-medium text-gray-700">Email</label>
            <input name="email" type="email" value="{{ old('email', optional($intern)->email) }}" class="mt-1 w-full rounded border-gray-300 shadow-sm" required>
            @error('email')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label class="text-sm font-medium text-gray-700">Phone</label>
            <input name="phone" type="text" value="{{ old('phone', optional($intern)->phone) }}" class="mt-1 w-full rounded border-gray-300 shadow-sm">
            @error('phone')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="grid gap-4 md:grid-cols-2">
        <div>
            <label class="text-sm font-medium text-gray-700">University</label>
            <input name="university" type="text" value="{{ old('university', optional($intern)->university) }}" class="mt-1 w-full rounded border-gray-300 shadow-sm" required>
            @error('university')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label class="text-sm font-medium text-gray-700">Department</label>
            <input name="department" type="text" value="{{ old('department', optional($intern)->department) }}" class="mt-1 w-full rounded border-gray-300 shadow-sm">
            @error('department')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="grid gap-4 md:grid-cols-2">
        <div>
            <label class="text-sm font-medium text-gray-700">Start date</label>
            <input name="start_date" type="date" value="{{ old('start_date', optional($intern)->start_date?->format('Y-m-d')) }}" class="mt-1 w-full rounded border-gray-300 shadow-sm" required>
            @error('start_date')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label class="text-sm font-medium text-gray-700">End date</label>
            <input name="end_date" type="date" value="{{ old('end_date', optional($intern)->end_date?->format('Y-m-d')) }}" class="mt-1 w-full rounded border-gray-300 shadow-sm">
            @error('end_date')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="grid gap-4 md:grid-cols-2">
        <div>
            <label class="text-sm font-medium text-gray-700">Status</label>
            <select name="status" class="mt-1 w-full rounded border-gray-300 shadow-sm" required>
                @foreach (['active' => 'Active', 'completed' => 'Completed', 'on-hold' => 'On hold'] as $value => $label)
                    <option value="{{ $value }}" @selected(old('status', optional($intern)->status ?? 'active') === $value)>
                        {{ $label }}
                    </option>
                @endforeach
            </select>
            @error('status')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label class="text-sm font-medium text-gray-700">Mentor</label>
            <input name="mentor_name" type="text" value="{{ old('mentor_name', optional($intern)->mentor_name) }}" class="mt-1 w-full rounded border-gray-300 shadow-sm">
            @error('mentor_name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div>
        <label class="text-sm font-medium text-gray-700">Notes</label>
        <textarea name="notes" rows="3" class="mt-1 w-full rounded border-gray-300 shadow-sm">{{ old('notes', optional($intern)->notes) }}</textarea>
        @error('notes')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
</div>
