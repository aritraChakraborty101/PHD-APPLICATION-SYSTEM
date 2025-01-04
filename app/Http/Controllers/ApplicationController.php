<?php
// app/Http/Controllers/ApplicationController.php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Faculty;
use App\Models\Application;
use App\Models\PhdOpening;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function apply($phdOpeningId, Request $request)
    {
        $request->validate([
            'student_note' => 'nullable|string',
        ]);

        Application::create([
            'user_id' => Auth::id(),
            'phd_opening_id' => $phdOpeningId,
            'student_note' => $request->student_note,
        ]);

        return redirect()->route('applications.index')->with('success', 'Application submitted successfully.');
    }

    public function index()
    {

        // User id 
        $user_id = Auth::id();
        // If the user is a student show only their applications
        if (Auth::user()->is_student) {
            $applications = Auth::user()->applications;
        }

        // If the user is a faculty show only the applications for their PhD openings
        if (!Auth::user()->is_student) {
            // get the application that has same user_id as phd_opening_id
            $applications = Application::whereHas('phdOpening', function ($query) use ($user_id) {
                $query->where('faculty_id', $user_id);
            })->get();
        }

        return view('applications.index', compact('applications'));
    }

    public function show($id)
    {
        $application = Application::findOrFail($id);
        return view('applications.show', compact('application'));
    }

    public function accept($id)
    {
        $application = Application::findOrFail($id);

        if (Auth::user()->id === $application->phdOpening->faculty_id) {
            $application->update(['status' => 'accepted']);
            return redirect()->back()->with('success', 'Application accepted.');
        }

        return redirect('applications.index')->back()->with('error', 'Unauthorized.');
    }

    public function reject($id)
    {
        $application = Application::findOrFail($id);

        if (Auth::user()->id === $application->phdOpening->faculty_id) {
            $application->update(['status' => 'rejected']);
            return redirect()->back()->with('success', 'Application rejected.');
        }

        return redirect('applications.index')->back()->with('error', 'Unauthorized.');
    }
}
