<?php 
// app/Http/Controllers/PhdOpeningController.php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\PhdOpening;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PhdOpeningController extends Controller
{
    // Show the form to create a new PhD opening
    public function create()
    {
        $user = Auth::user();

        if ($user->faculties->isNotEmpty()) {
            return view('phd_openings.create');
        }

        return redirect()->route('dashboard')->with('error', 'You do not have permission to create PhD openings.');
    }

    // Store a newly created PhD opening in storage
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'research_area' => 'required|string|max:255',
            'qualifications' => 'required|string',
        ]);

        $user = Auth::user();

        if ($user->faculties->isNotEmpty()) {
            PhdOpening::create([
                'title' => $request->title,
                'description' => $request->description,
                'research_area' => $request->research_area,
                'qualifications' => $request->qualifications,
                'faculty_id' => $user->faculties->first()->id,
            ]);

            return redirect()->route('phd_openings.index')->with('success', 'PhD opening created successfully!');
        }

        return redirect()->route('dashboard')->with('error', 'You do not have permission to create PhD openings.');
    }

    // Display a listing of the PhD openings
    public function index(Request $request)
    {
        $query = PhdOpening::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('title', 'like', "%$search%")
                  ->orWhere('research_area', 'like', "%$search%");
        }

        $phd_openings = $query->paginate(10);

        return view('phd_openings.index', compact('phd_openings'));
    }

    // Display the specified PhD opening
    public function show($id)
    {
        $phd_opening = PhdOpening::findOrFail($id);

        return view('phd_openings.show', compact('phd_opening'));
    }

    // Show the form for editing the specified PhD opening
    public function edit($id)
    {
        $phd_opening = PhdOpening::findOrFail($id);

        if (Auth::user()->faculties->contains('id', $phd_opening->faculty_id)) {
            return view('phd_openings.edit', compact('phd_opening'));
        }

        return redirect()->route('dashboard')->with('error', 'You do not have permission to edit this PhD opening.');
    }

    // Update the specified PhD opening in storage
    public function update(Request $request, $id)
    {
        $phd_opening = PhdOpening::findOrFail($id);

        if (Auth::user()->faculties->contains('id', $phd_opening->faculty_id)) {
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'research_area' => 'required|string|max:255',
                'qualifications' => 'required|string',
            ]);

            $phd_opening->update($request->all());

            return redirect()->route('phd_openings.edit', $phd_opening->id)->with('success', 'PhD opening updated successfully!');
        }

        return redirect()->route('dashboard')->with('error', 'You do not have permission to update this PhD opening.');
    }

    // Remove the specified PhD opening from storage
    public function destroy($id)
    {
        $phd_opening = PhdOpening::findOrFail($id);

        if (Auth::user()->faculties->contains('id', $phd_opening->faculty_id)) {
            $phd_opening->delete();

            return redirect()->route('phd_openings.index')->with('success', 'PhD opening deleted successfully!');
        }

        return redirect()->route('dashboard')->with('error', 'You do not have permission to delete this PhD opening.');
    }
}
