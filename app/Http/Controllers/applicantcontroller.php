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
        $user = Auth::user();

        // Check if the user already has an applicant
        

        return view('applicants.create');
    }

    // Other methods like index, store, etc.

    //create applicant [[[store method]]]
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

        if ($user->is_student && !Applicant::where('user_id', $user->id)->exists()) {
            Applicant::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'academic_details' => $request->academic_details,
                'user_id' => $user->id,
            ]);

            return redirect()->route('dashboard')->with('success', 'Applicant created successfully!');
        } else {
            return redirect()->back()->with('error', 'Only students can create applications.');
        }
    }

    // Edit and Update Applicant
    public function edit($id)
    {
        $applicant = Applicant::findOrFail($id);

        // Ensure that only the user who created the application can edit it
        if (Auth::user()->id !== $applicant->user_id) {
            return redirect()->route('dashboard')->with('error', 'You do not have permission to edit this applicant.');
        }

        return view('applicants.edit', compact('applicant'));
    }

    public function update(Request $request, $id)
    {
        $applicant = Applicant::findOrFail($id);

        // Ensure that only the user who created the application can update it
        if (Auth::user()->id !== $applicant->user_id) {
            return redirect()->route('dashboard')->with('error', 'You do not have permission to update this applicant.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:applicants,email,' . $applicant->id,
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string',
            'academic_details' => 'nullable|string',
        ]);

        $applicant->update($request->all());

        return redirect()->route('applicants.edit', ['id' => $applicant->id])
                         ->with('success', 'Applicant updated successfully!');
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

        return view('applicants.index', compact('applicants'));
    }

    // Single Applicant
    public function show($id)
    {
        $applicant = Applicant::findOrFail($id);

        return view('applicants.show', compact('applicant'));
    }

    // Delete Applicant
    public function destroy($id)
    {
        $applicant = Applicant::findOrFail($id);
        $applicant->delete();

        return response()->json(['message' => 'Applicant deleted successfully']);
    }
}

