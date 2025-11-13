<?php

namespace App\Http\Controllers;

use App\Models\JobVacancy as Job;
use App\Imports\JobsImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::all();
        return view('jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'location' => 'required',
            'company' => 'required',
            'logo' => 'image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $logoPath = null;
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
        }

        Job::create([
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'company' => $request->company,
            'salary' => $request->salary,
            'logo' => $logoPath
        ]);

        return redirect()->route('jobs.index')->with('success', 'Lowongan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $job = Job::findOrFail($id);
        return view('jobs.show', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $job = Job::findOrFail($id);
        return view('jobs.edit', compact('job'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'location' => 'required',
            'company' => 'required',
            'logo' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $job = Job::findOrFail($id);
        $logoPath = $job->logo; // keep old logo

        if ($request->hasFile('logo')) {
            // delete old logo if exists
            if ($job->logo && Storage::disk('public')->exists($job->logo)) {
                Storage::disk('public')->delete($job->logo);
            }
            $logoPath = $request->file('logo')->store('logos', 'public');
        }

        $job->update([
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'company' => $request->company,
            'salary' => $request->salary,
            'logo' => $logoPath
        ]);

        return redirect()->route('jobs.index')->with('success', 'Lowongan berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $job = Job::findOrFail($id);

        // delete logo if exists
        if ($job->logo && Storage::disk('public')->exists($job->logo)) {
            Storage::disk('public')->delete($job->logo);
        }

        $job->delete();

        return redirect()->route('jobs.index')->with('success', 'Lowongan berhasil didelete');
    }

    /**
     * Import jobs from Excel file
     */
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv|max:2048'
        ]);

        try {
            Excel::import(new JobsImport, $request->file('file'));
            return redirect()->route('jobs.index')->with('success', 'Data lowongan berhasil diimport!');
        } catch (\Exception $e) {
            return redirect()->route('jobs.index')->with('error', 'Gagal import data: ' . $e->getMessage());
        }
    }

    /**
     * Download template import
     */
    public function downloadTemplate()
    {
        // Header untuk file CSV
        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="template_import_lowongan.csv"',
            'Cache-Control' => 'no-cache, no-store, must-revalidate',
            'Pragma' => 'no-cache',
            'Expires' => '0'
        ];

        // Kolom yang diperlukan
        $columns = ['title', 'description', 'location', 'company', 'salary'];

        $callback = function() use ($columns) {
            $file = fopen('php://output', 'w');

            // Pastikan encoding UTF-8 dengan BOM untuk Excel
            fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));

            // Tulis header kolom
            fputcsv($file, $columns);

            // Tulis contoh data (3 baris contoh)
            $examples = [
                ['Web Developer', 'Mengembangkan aplikasi web dengan Laravel', 'Jakarta', 'PT Digital', '7500000'],
                ['Mobile Developer', 'Membuat aplikasi mobile Android/iOS', 'Bandung', 'CV Mobile Tech', '8500000'],
                ['UI/UX Designer', 'Mendesain interface dan user experience', 'Surabaya', 'PT Design Studio', '7000000']
            ];

            foreach ($examples as $example) {
                fputcsv($file, $example);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    /**
     * Show template guide page
     */
    public function showTemplate()
    {
        return view('jobs.template');
    }
}