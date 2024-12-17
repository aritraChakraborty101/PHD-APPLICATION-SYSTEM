<?php

// Controller: ApplicantController.php
namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class applicantcontroller extends Controller
{
    // Create Applicant

    // Show the form to create a new applicant
    public function create()
    {
        return view('applicants.create');
    }

    // Other methods like index, store, etc.

    //create applicant
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:applicants,email',
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string',
            'academic_details' => 'nullable|string',
        ]);

        $user = Auth::user();

        if ($user->is_student) {
            Applicant::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'academic_details' => $request->academic_details,
                'user_id' => $user->id,
            ]);

            return redirect()->route('applicants.index')->with('success', 'Applicant created successfully!');
        } else {
            return redirect()->back()->with('error', 'Only students can create applications.');
        }
    }

    // Edit Applicant
    public function update(Request $request, $id)
    {
        $applicant = Applicant::findOrFail($id);

        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|unique:applicants,email,' . $applicant->id,
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string',
            'academic_details' => 'nullable|string',
        ]);

        $applicant->update($validated);

        return response()->json(['message' => 'Applicant updated successfully', 'data' => $applicant]);
    }

    // All Applicants
    public function index(Request $request)
    {
        $query = Applicant::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('name', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%");
        }

        if ($request->has('sort')) {
            $sort = $request->input('sort');
            $query->orderBy($sort, $request->input('order', 'asc'));
        }

        $applicants = $query->paginate(10);

        return response()->json($applicants);
    }

    // Single Applicant
    public function show($id)
    {
        $applicant = Applicant::findOrFail($id);

        return response()->json($applicant);
    }

    // Delete Applicant
    public function destroy($id)
    {
        $applicant = Applicant::findOrFail($id);
        $applicant->delete();

        return response()->json(['message' => 'Applicant deleted successfully']);
    }
}

