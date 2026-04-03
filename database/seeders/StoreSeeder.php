<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StoreSeeder extends Seeder
{
    public function run(): void
    {
        // Xóa dữ liệu cũ để tránh trùng lặp
        DB::table('products')->delete();
        DB::table('categories')->delete();

        // 1. Tạo các danh mục thực tế
        $cat1 = DB::table('categories')->insertGetId([
            'name' => 'Linh kiện', 
            'created_at' => now(), 'updated_at' => now()
        ]);
        
        $cat2 = DB::table('categories')->insertGetId([
            'name' => 'Điện tử', 
            'created_at' => now(), 'updated_at' => now()
        ]);

        // 2. Thêm sản phẩm tương ứng với ID danh mục vừa tạo
       $catId = DB::table('categories')->insertGetId(['name' => 'Linh kiện']); // Lấy ID vừa tạo

DB::table('products')->insert([
    'name' => 'Macbook M3',
    'price' => 35000000,
    'quantity' => 10,
    'category_id' => $catId, // Dùng category_id chứ không phải category
    'created_at' => now(),
    'updated_at' => now(),
]);
    }
}