<?php

namespace App\Http\Controllers;

use App\Models\Intern;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class InternController extends Controller
{
    public function index(): View
    {
        $interns = Intern::query()->orderBy('start_date', 'desc')->paginate(10);

        return view('interns.index', compact('interns'));
    }

    public function create(): View
    {
        return view('interns.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validateIntern($request);

        Intern::create($validated);

        return redirect()->route('interns.index')->with('status', 'Intern created successfully.');
    }

    public function edit(Intern $intern): View
    {
        return view('interns.edit', compact('intern'));
    }

    public function update(Request $request, Intern $intern): RedirectResponse
    {
        $validated = $this->validateIntern($request, $intern->id);

        $intern->update($validated);

        return redirect()->route('interns.index')->with('status', 'Intern updated successfully.');
    }

    public function destroy(Intern $intern): RedirectResponse
    {
        $intern->delete();

        return redirect()->route('interns.index')->with('status', 'Intern deleted successfully.');
    }

    private function validateIntern(Request $request, ?int $internId = null): array
    {
        $uniqueEmailRule = 'unique:interns,email';
        if ($internId) {
            $uniqueEmailRule .= ',' . $internId;
        }

        return $request->validate([
            'first_name' => ['required', 'string', 'max:50'],
            'last_name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email', 'max:100', $uniqueEmailRule],
            'phone' => ['nullable', 'string', 'max:20'],
            'university' => ['required', 'string', 'max:100'],
            'department' => ['nullable', 'string', 'max:100'],
            'start_date' => ['required', 'date'],
            'end_date' => ['nullable', 'date', 'after_or_equal:start_date'],
            'status' => ['required', 'in:active,completed,on-hold'],
            'mentor_name' => ['nullable', 'string', 'max:100'],
            'notes' => ['nullable', 'string', 'max:500'],
        ]);
    }
}
