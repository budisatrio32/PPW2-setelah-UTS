<?php

namespace App\Exports;

use App\Models\Application;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ApplicationsExport implements FromCollection, WithHeadings, WithMapping
{
    protected $jobId;

    public function __construct($jobId = null)
    {
        $this->jobId = $jobId;
    }

    public function collection()
    {
        $query = Application::with(['user', 'jobVacancy']);
        
        if ($this->jobId) {
            $query->where('job_id', $this->jobId);
        }
        
        return $query->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama Pelamar',
            'Email Pelamar',
            'Posisi yang Dilamar',
            'Status',
            'CV',
            'Tanggal Melamar',
        ];
    }

    public function map($application): array
    {
        return [
            $application->id,
            $application->user->name ?? 'N/A',
            $application->user->email ?? 'N/A',
            $application->jobVacancy->title ?? 'N/A',
            $application->status ?? 'Pending',
            $application->cv,
            $application->created_at->format('d-m-Y H:i:s'),
        ];
    }
}
