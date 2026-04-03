<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category; // <--- THÊM DÒNG NÀY
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
{
    $query = Product::with('category'); // Tối ưu mục 3.4 [cite: 1, 66, 68]

    // Xử lý Tìm kiếm (Mục 3.1) [cite: 1, 57, 58]
    if ($request->has('search')) {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    // Xử lý Sắp xếp (Mục 3.2) - ĐOẠN NÀY GÂY LỖI 
    if ($request->has('sort')) {
        if ($request->sort == 'price_asc') {
            $query->orderBy('price', 'asc'); // Phải là 'asc' [cite: 6, 61]
        } elseif ($request->sort == 'price_desc') {
            $query->orderBy('price', 'desc'); // Phải là 'desc' [cite: 6, 62]
        }
    }

    $products = $query->paginate(10); // Phân trang mục 2.1.b [cite: 1, 23, 29]
    return view('products.index', compact('products'));
}
    public function create()
{
    $categories = \App\Models\Category::all();
    return view('products.create', compact('categories'));
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'price' => 'required|numeric',
        'quantity' => 'required|integer',
        'category_id' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048' // Yêu cầu 3.3 [cite: 63]
    ]);

    $data = $request->all();

    // Xử lý upload ảnh nếu có 
    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('products', 'public');
    }

    \App\Models\Product::create($data);

    return redirect()->route('products.index')->with('success', 'Thêm sản phẩm thành công!'); // Yêu cầu 2.4 [cite: 49]
}

    public function edit(Product $product) {
    $categories = Category::all();
    return view('products.edit', compact('product', 'categories'));
}

public function update(Request $request, Product $product)
{
    // Validate dữ liệu theo yêu cầu [cite: 17, 18, 19, 20]
    $request->validate([
        'name' => 'required',
        'price' => 'required|numeric',
        'quantity' => 'required|integer',
        'category_id' => 'required',
    ]);

    $data = $request->all();

    // Xử lý upload ảnh (Yêu cầu mở rộng 3.3) [cite: 63, 64]
    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('products', 'public');
    }

    // Thực hiện cập nhật vào Database [cite: 7, 31]
    $product->update($data);

    // QUAN TRỌNG: Điều hướng về trang danh sách kèm thông báo (Yêu cầu 2.4) [cite: 47, 50]
    return redirect()->route('products.index')->with('success', 'Cập nhật sản phẩm thành công!');
}

    public function destroy(Product $product)
{
    $product->delete();
    return redirect()->route('products.index')->with('success', 'Xóa sản phẩm thành công!');
}
public function dashboard()
{
    $totalProducts = \App\Models\Product::count(); // Tổng số sản phẩm
    $totalCategories = \App\Models\Category::count(); // Tổng số danh mục
    $latestProducts = \App\Models\Product::latest()->take(5)->get(); // 5 sản phẩm mới nhất

    return view('dashboard', compact('totalProducts', 'totalCategories', 'latestProducts'));
}
}
