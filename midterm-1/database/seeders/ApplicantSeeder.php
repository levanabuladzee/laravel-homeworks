<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApplicantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->applicant('John', 'Doe', 'Software Developer', '555112233', true);
        $this->applicant('John', 'Doe', 'Backend Developer', '555435523', true);
        $this->applicant('John', 'Doe', 'Frontend Developer', '555111302', false);
        $this->applicant('John', 'Doe', 'Android Developer', '555356234', true);
        $this->applicant('John', 'Doe', 'iOS Developer', '555100033', false);
        $this->applicant('John', 'Doe', 'DevOps Engineer', '555983441', true);
        $this->applicant('John', 'Doe', 'SQL Developer', '555001475', false);
    }

    public function applicant($name, $surname, $position, $phone, $is_hired) {
        DB::table('applicants')->insert([
            'name' => $name,
            'surname' => $surname,
            'position' => $position,
            'phone' => $phone,
            'is_hired' => $is_hired
        ]);
    }
}
