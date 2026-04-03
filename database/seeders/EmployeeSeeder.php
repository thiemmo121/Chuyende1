<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    \App\Models\Employee::create([
        'name' => 'Nguyễn Thành Đạt',
        'email' => 'dat@gmail.com',
        'position' => 'Developer',
        'department_id' => 1
    ]);
    \App\Models\Employee::create([
        'name' => 'Quàng Văn Thiếm',
        'email' => 'thiem@gmail.com',
        'position' => 'Designer',
        'department_id' => 1
    ]);
}
}
