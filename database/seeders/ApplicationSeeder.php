<?php

namespace Database\Seeders;

use App\Models\Application;
use App\Models\User;
use App\Models\JobVacancy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat beberapa user dummy sebagai pelamar
        $users = User::where('role', '!=', 'admin')->get();
        
        // Jika belum ada user non-admin, buat beberapa
        if ($users->count() == 0) {
            for ($i = 1; $i <= 5; $i++) {
                $users[] = User::create([
                    'name' => 'Pelamar ' . $i,
                    'email' => 'pelamar' . $i . '@example.com',
                    'password' => bcrypt('password'),
                    'role' => 'user',
                ]);
            }
            $users = collect($users);
        }

        // Ambil beberapa job vacancy
        $jobs = JobVacancy::take(5)->get();

        // Buat aplikasi dummy
        foreach ($jobs as $job) {
            // Setiap job akan punya 2-4 pelamar
            $applicantsCount = rand(2, 4);
            $selectedUsers = $users->random(min($applicantsCount, $users->count()));

            foreach ($selectedUsers as $user) {
                Application::create([
                    'user_id' => $user->id,
                    'job_id' => $job->id,
                    'cv' => 'cvs/dummy_cv_' . $user->id . '_' . $job->id . '.pdf',
                ]);
            }
        }
    }
}
