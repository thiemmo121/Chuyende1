<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\Course;
use App\Models\Customer;
use App\Models\Enrollment;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Student;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Student::insert([
            ['name' => 'Nguyen Van A', 'major' => 'Cong nghe thong tin', 'email' => 'a@example.com', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Tran Thi B', 'major' => 'Ke toan', 'email' => 'b@example.com', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Le Van C', 'major' => 'Quan tri kinh doanh', 'email' => 'c@example.com', 'created_at' => now(), 'updated_at' => now()],
        ]);
    $this->call([
    DepartmentSeeder::class,
    EmployeeSeeder::class,
]);
        Product::insert([
            ['name' => 'Ban phim co', 'price' => 450000, 'quantity' => 12, 'category' => 'Phu kien', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Chuot khong day', 'price' => 250000, 'quantity' => 3, 'category' => 'Phu kien', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Laptop Dell', 'price' => 18500000, 'quantity' => 0, 'category' => 'May tinh', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Tai nghe', 'price' => 180000, 'quantity' => 7, 'category' => 'Am thanh', 'created_at' => now(), 'updated_at' => now()],
        ]);

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

        Order::insert([
            ['customer_name' => 'Pham Van D', 'status' => 'pending', 'total_amount' => 1150000, 'created_at' => now(), 'updated_at' => now()],
            ['customer_name' => 'Tran Thi E', 'status' => 'processing', 'total_amount' => 18680000, 'created_at' => now(), 'updated_at' => now()],
        ]);

        OrderItem::insert([
            ['order_id' => 1, 'product_id' => 1, 'product_name' => 'Ban phim co', 'unit_price' => 450000, 'quantity' => 2, 'line_total' => 900000, 'created_at' => now(), 'updated_at' => now()],
            ['order_id' => 1, 'product_id' => 4, 'product_name' => 'Tai nghe', 'unit_price' => 180000, 'quantity' => 1, 'line_total' => 180000, 'created_at' => now(), 'updated_at' => now()],
            ['order_id' => 2, 'product_id' => 3, 'product_name' => 'Laptop Dell', 'unit_price' => 18500000, 'quantity' => 1, 'line_total' => 18500000, 'created_at' => now(), 'updated_at' => now()],
            ['order_id' => 2, 'product_id' => 2, 'product_name' => 'Chuot khong day', 'unit_price' => 250000, 'quantity' => 1, 'line_total' => 250000, 'created_at' => now(), 'updated_at' => now()],
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
