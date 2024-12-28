<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all(); // SELECT * FROM Products
        //dd($products);
        return view('products.index', ['products' => $products]);
    }

    public function create()
    {
        $categories = Category::all();

        return view('products.create')->with('categories', $categories);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:100',
            'description' => 'required',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:5100',
        ]);

        // Kiểm tra và lưu ảnh nếu có upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        Product::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'quantity' => $request->input('quantity'),
            'price' => $request->input('price'),
            'category_id' => $request->input('category_id'),
            'image' => $imagePath, // Lưu đường dẫn ảnh hoặc NULL
        ]);

        return redirect('products.index');
    }


    public function edit($id)
    {
        // Tìm sản phẩm theo ID
        $product = Product::findOrFail($id);

        // Lấy danh sách danh mục
        $categories = Category::all();

        // Trả về view edit với dữ liệu sản phẩm và danh mục
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        // Tìm sản phẩm theo ID
        $product = Product::findOrFail($id);

        // Xác thực dữ liệu
        $validated = $request->validate([
            'title' => 'required|max:100',
            'description' => 'required',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:5100',
        ]);

        // Kiểm tra xem có upload hình ảnh mới hay không
        if ($request->hasFile('image')) {
            // Xóa hình ảnh cũ nếu có
            if ($product->image) {
                Storage::delete('public/' . $product->image);
            }

            // Lưu hình ảnh mới
            $imagePath = $request->file('image')->store('images', 'public');
            $product->image = $imagePath;
        }

        // Cập nhật thông tin sản phẩm
        $product->title = $request->input('title');
        $product->description = $request->input('description');
        $product->quantity = $request->input('quantity');
        $product->price = $request->input('price');
        $product->category_id = $request->input('category_id');
        $product->save();

        // Chuyển hướng về danh sách sản phẩm
        return redirect('/products')->with('success', 'Product updated successfully!');
    }


    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('/products');
    }

    public function show($id)
    {
        $product = Product::find($id);
        $category = Category::find($product->category_id);
        $product->category = $category;
        return view('products.show')->with('product', $product);
    }
}