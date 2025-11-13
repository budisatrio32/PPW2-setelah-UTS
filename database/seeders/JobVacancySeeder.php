<?php

namespace Database\Seeders;

use App\Models\JobVacancy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobVacancySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jobs = [
            [
                'title' => 'Full Stack Developer',
                'description' => 'Kami mencari Full Stack Developer yang berpengalaman dengan Laravel dan Vue.js. Akan bertanggung jawab untuk mengembangkan aplikasi web dari front-end hingga back-end.',
                'location' => 'Jakarta',
                'company' => 'Tech Indonesia',
                'salary' => 12000000,
                'logo' => null,
            ],
            [
                'title' => 'Frontend Developer',
                'description' => 'Dibutuhkan Frontend Developer yang menguasai React.js dan Tailwind CSS. Akan bekerja dengan tim untuk membuat user interface yang menarik dan responsif.',
                'location' => 'Bandung',
                'company' => 'Digital Creative',
                'salary' => 8000000,
                'logo' => null,
            ],
            [
                'title' => 'Backend Developer',
                'description' => 'Mencari Backend Developer dengan pengalaman di Laravel dan MySQL. Akan mengembangkan API dan database untuk aplikasi mobile dan web.',
                'location' => 'Surabaya',
                'company' => 'Data Solutions',
                'salary' => 10000000,
                'logo' => null,
            ],
            [
                'title' => 'UI/UX Designer',
                'description' => 'Dibutuhkan UI/UX Designer yang kreatif dan detail-oriented. Akan mendesain user interface dan user experience untuk aplikasi mobile dan web.',
                'location' => 'Yogyakarta',
                'company' => 'Creative Studio',
                'salary' => 7000000,
                'logo' => null,
            ],
            [
                'title' => 'DevOps Engineer',
                'description' => 'Mencari DevOps Engineer yang berpengalaman dengan Docker, Kubernetes, dan CI/CD. Akan mengelola infrastructure dan deployment aplikasi.',
                'location' => 'Jakarta',
                'company' => 'Cloud Services',
                'salary' => 15000000,
                'logo' => null,
            ],
            [
                'title' => 'Mobile Developer',
                'description' => 'Dibutuhkan Mobile Developer yang menguasai Flutter atau React Native. Akan mengembangkan aplikasi mobile cross-platform.',
                'location' => 'Bali',
                'company' => 'Mobile Apps Co',
                'salary' => 9000000,
                'logo' => null,
            ],
            [
                'title' => 'Data Analyst',
                'description' => 'Mencari Data Analyst yang menguasai SQL, Python, dan tools visualisasi data. Akan menganalisis data bisnis dan membuat report.',
                'location' => 'Jakarta',
                'company' => 'Analytics Pro',
                'salary' => 8500000,
                'logo' => null,
            ],
            [
                'title' => 'Quality Assurance',
                'description' => 'Dibutuhkan QA Engineer yang berpengalaman dalam testing aplikasi web dan mobile. Akan melakukan testing manual dan automated.',
                'location' => 'Semarang',
                'company' => 'Quality First',
                'salary' => 7500000,
                'logo' => null,
            ],
        ];

        foreach ($jobs as $job) {
            JobVacancy::create($job);
        }
    }
}
