<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;
use App\Exports\ApplicationsExport;
use Maatwebsite\Excel\Facades\Excel;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $jobId = null)
    {
        if ($jobId) {
            // Jika ada jobId, tampilkan pelamar untuk job tertentu
            $applications = Application::with(['user', 'jobVacancy'])
                ->where('job_id', $jobId)
                ->latest()
                ->get();
        } else {
            // Jika tidak ada jobId, tampilkan semua pelamar
            $applications = Application::with(['user', 'jobVacancy'])
                ->latest()
                ->get();
        }
        
        return view('applications.index', compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $jobId)
    {
        $request->validate([
            'cv' => 'required|mimes:pdf|max:2048',
        ]);

        $cvPath = $request->file('cv')->store('cvs', 'public');

        Application::create([
            'user_id' => Auth::id(),
            'job_id' => $jobId,
            'cv' => $cvPath,
        ]);

        return back()->with('success', 'Lamaran berhasil dikirim!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'status' => 'required|in:Pending,Accepted,Rejected'
        ]);

        $application = Application::findOrFail($id);
        $application->update([
            'status' => $request->status
        ]);

        return back()->with('success', 'Status lamaran berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function export(Request $request)
    {
        $jobId = $request->input('job_id');
        $export = new ApplicationsExport($jobId);
        
        $filename = $jobId 
            ? 'applications_job_' . $jobId . '_' . date('Y-m-d') . '.xlsx'
            : 'applications_' . date('Y-m-d') . '.xlsx';
            
        return Excel::download($export, $filename);
    }
}
