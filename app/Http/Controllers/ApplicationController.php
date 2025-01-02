<?php
// app/Http/Controllers/ApplicationController.php

namespace App\Http\Controllers;

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
        $applications = Auth::user()->applications;
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

        return redirect()->back()->with('error', 'Unauthorized.');
    }

    public function reject($id)
    {
        $application = Application::findOrFail($id);

        if (Auth::user()->id === $application->phdOpening->faculty_id) {
            $application->update(['status' => 'rejected']);
            return redirect()->back()->with('success', 'Application rejected.');
        }

        return redirect()->back()->with('error', 'Unauthorized.');
    }
}
