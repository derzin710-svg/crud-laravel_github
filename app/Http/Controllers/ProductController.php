<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // បង្ហាញបញ្ជីផលិតផលទាំងអស់
    public function index()
    {
        $products = Product::all();
        return view('products.index', ['products' => $products]);
    }

    // បង្ហាញទំព័របង្កើតផលិតផលថ្មី
    public function create()
    {
        return view('products.create');
    }

    // រក្សាទុកទិន្នន័យបង្កើតថ្មីចូល Database
    public function store(Request $request)
    {
        // 💡 ត្រួតពិនិត្យ និងចាប់យកទិន្នន័យគ្រប់ Fields ទាំងអស់
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|numeric',
            'description' => 'nullable',
            'category' => 'nullable',
            'brand' => 'nullable',
            'color' => 'nullable'
        ]);

        Product::create($data);

        return redirect(route('product.index'))->with('success', 'Product Created Successfully!');
    }

    // បង្ហាញទំព័រកែប្រែផលិតផល
    public function edit(Product $product)
    {
        return view('products.edit', ['product' => $product]);
    }

    // ធ្វើបច្ចុប្បន្នភាពទិន្នន័យកែប្រែចូល Database
    public function update(Product $product, Request $request)
    {
        // 💡 ត្រួតពិនិត្យទិន្នន័យពេលចុច Update
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|numeric',
            'description' => 'nullable',
            'category' => 'nullable',
            'brand' => 'nullable',
            'color' => 'nullable'
        ]);

        $product->update($data);

        return redirect(route('product.index'))->with('success', 'Product Updated Successfully!');
    }

    // លុបផលិតផលចេញពី Database
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect(route('product.index'))->with('success', 'Product Deleted Successfully!');
    }

    // បង្ហាញព័ត៌មានលម្អិត (View Detail រូបភ្នែក)
    public function show(Product $product)
    {
        return view('products.show', ['product' => $product]);
    }
}