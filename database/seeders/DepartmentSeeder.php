<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    \App\Models\Department::create(['name' => 'Phòng Kỹ thuật', 'description' => 'Phát triển phần mềm']);
    \App\Models\Department::create(['name' => 'Phòng Nhân sự', 'description' => 'Quản lý nhân sự']);
}
}
