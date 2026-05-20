<!-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit a Product</title>
</head>
<body>
    <h1>Edit a Product</h1>
    
    <form method="POST" action="{{route('product.update', ['product' => $product])}}">
        @csrf
        @method('PUT') 

        <div>
            <label>Name</label>
            <input type="text" name="name" placeholder="Name" value="{{ $product->name }}" />
        </div>

        <div>
            <label>Qty</label>
            <input type="number" name="qty" placeholder="Qty" value="{{ $product->qty }}" />
        </div>

        <div>
            <label>Price</label>
            <input type="text" name="price" placeholder="Price" value="{{ $product->price }}" />
        </div>

        <div>
            <label>Description</label>
            <input type="text" name="description" placeholder="Description" value="{{ $product->description }}" />
        </div>

        <div>
            <button type="submit">Update Product</button>
        </div>
    </form>
</body>
</html> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans antialiased p-8">
    <div class="max-w-4xl mx-auto bg-white rounded-xl border border-gray-200 p-6 shadow-sm">
        <h1 class="text-xl font-bold text-gray-800 mb-6">Edit Product: {{ $product->name }}</h1>

        @if($errors->any())
            <div class="bg-red-50 text-red-600 p-4 rounded-lg mb-6 text-sm">
                <ul class="list-disc pl-5 space-y-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('product.update', ['product' => $product]) }}">
            @csrf
            @method('PUT') <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Product Name</label>
                    <input type="text" name="name" value="{{ $product->name }}" class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                    <input type="text" name="category" value="{{ $product->category }}" class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Brand</label>
                    <input type="text" name="brand" value="{{ $product->brand }}" class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Color</label>
                    <input type="text" name="color" value="{{ $product->color }}" class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Stock (Qty)</label>
                    <input type="number" name="qty" value="{{ $product->qty }}" class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Price ($)</label>
                    <input type="text" name="price" value="{{ $product->price }}" class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500" required>
                </div>
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                <textarea name="description" rows="4" class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500">{{ $product->description }}</textarea>
            </div>

            <div class="flex items-center space-x-4">
                <a href="{{ route('product.index') }}" class="px-5 py-2.5 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50">Cancel</a>
                <button type="submit" class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-sm font-medium shadow-sm transition">Update Product</button>
            </div>
        </form>
    </div>
</body>
</html>