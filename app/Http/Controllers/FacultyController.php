<?php

// app/Http/Controllers/FacultyController.php

namespace App\Http\Controllers;

use App\Models\Faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FacultyController extends Controller
{
    // Show the form to create a new faculty
    public function create()
    {
        $user = Auth::user();

        // Check if the user already has a faculty record
        if ($user->faculties && $user->faculties->isNotEmpty()) {
            return redirect()->route('faculties.edit', ['id' => $user->faculties->first()->id])
                             ->with('error', 'You have already created a faculty record. You can edit it.');
        }

        return view('Faculties.create');
    }

    // Store a newly created faculty in storage
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:faculties,email',
            'phone' => 'nullable|string|max:15',
            'department' => 'nullable|string',
            'research_interests' => 'nullable|string',
        ]);

        $user = Auth::user();

        if ($user->faculties && $user->faculties->isNotEmpty()) {
            return redirect()->route('faculties.edit', ['id' => $user->faculties->first()->id])
                             ->with('error', 'You have already created a faculty record. You can edit it.');
        }

        Faculty::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'department' => $request->department,
            'research_interests' => $request->research_interests,
            'user_id' => $user->id,
        ]);

        return redirect()->route('faculties.index')->with('success', 'Faculty created successfully!');
    }

    // Show the form for editing the specified faculty
    public function edit($id)
    {
        $faculty = Faculty::findOrFail($id);

        // Ensure that only the user who created the faculty record can edit it
        if (Auth::user()->id !== $faculty->user_id) {
            return redirect()->route('dashboard')->with('error', 'You do not have permission to edit this faculty record.');
        }

        return view('Faculties.edit', compact('faculty'));
    }

    // Update the specified faculty in storage
    public function update(Request $request, $id)
    {
        $faculty = Faculty::findOrFail($id);

        // Ensure that only the user who created the faculty record can update it
        if (Auth::user()->id !== $faculty->user_id) {
            return redirect()->route('dashboard')->with('error', 'You do not have permission to update this faculty record.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:faculties,email,' . $faculty->id,
            'phone' => 'nullable|string|max:15',
            'department' => 'nullable|string',
            'research_interests' => 'nullable|string',
        ]);

        $faculty->update($request->all());

        return redirect()->route('faculties.edit', ['id' => $faculty->id])
                         ->with('success', 'Faculty updated successfully!');
    }

    // Display a listing of the faculties
    public function index(Request $request)
    {
        $query = Faculty::query();
        

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('name', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%");
        }

        if ($request->has('sort')) {
            $sort = $request->input('sort');
            $query->orderBy($sort, $request->input('order', 'asc'));
        }

        $faculties = $query->paginate(10);

        return view('Faculties.index', compact('faculties'));
    }

    // Display the specified faculty
    public function show($id)
    {
        $faculty = Faculty::findOrFail($id);

        return view('Faculties.show', compact('faculty'));
    }

    // Remove the specified faculty from storage
    public function destroy($id)
    {
        $faculty = Faculty::findOrFail($id);
        $faculty->delete();

        return response()->json(['message' => 'Faculty deleted successfully']);
    }
}
