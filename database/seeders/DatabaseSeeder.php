<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\Course;
use App\Models\Customer;
use App\Models\Enrollment;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product; // Dòng này có thể giữ lại hoặc xóa nếu không dùng Product trực tiếp ở đây
use App\Models\Student;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Giữ lại các phần nạp dữ liệu khác nếu bạn cần
        Student::insert([
            ['name' => 'Nguyen Van A', 'major' => 'Cong nghe thong tin', 'email' => 'a@example.com', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Tran Thi B', 'major' => 'Ke toan', 'email' => 'b@example.com', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Le Van C', 'major' => 'Quan tri kinh doanh', 'email' => 'c@example.com', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // 2. Gọi các Seeder riêng biệt
        $this->call([
            DepartmentSeeder::class,
            EmployeeSeeder::class,
            StoreSeeder::class, // Dữ liệu Product và Category chuẩn sẽ nằm ở đây
        ]);

        // ĐÃ XÓA ĐOẠN Product::insert LỖI TẠI ĐÂY (Vì nó dùng cột 'category' sai)

        Course::insert([
            ['name' => 'Lap trinh Web', 'credits' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Co so du lieu', 'credits' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Phan tich du lieu', 'credits' => 3, 'created_at' => now(), 'updated_at' => now()],
        ]);

        Enrollment::insert([
            ['student_id' => 1, 'course_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['student_id' => 1, 'course_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['student_id' => 2, 'course_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['student_id' => 3, 'course_id' => 3, 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Các phần Order, OrderItem, Customer, Appointment giữ nguyên...
        Order::insert([
            ['customer_name' => 'Pham Van D', 'status' => 'pending', 'total_amount' => 1150000, 'created_at' => now(), 'updated_at' => now()],
            ['customer_name' => 'Tran Thi E', 'status' => 'processing', 'total_amount' => 18680000, 'created_at' => now(), 'updated_at' => now()],
        ]);

        Customer::insert([
            ['name' => 'Nguyen Van F', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Le Thi G', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Pham Van H', 'created_at' => now(), 'updated_at' => now()],
        ]);

        Appointment::insert([
            ['customer_id' => 1, 'appointment_date' => '2026-04-01', 'appointment_time' => '09:00:00', 'status' => 'scheduled', 'created_at' => now(), 'updated_at' => now()],
            ['customer_id' => 2, 'appointment_date' => '2026-04-01', 'appointment_time' => '10:30:00', 'status' => 'scheduled', 'created_at' => now(), 'updated_at' => now()],
            ['customer_id' => 3, 'appointment_date' => '2026-04-02', 'appointment_time' => '14:00:00', 'status' => 'canceled', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}