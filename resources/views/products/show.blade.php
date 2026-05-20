<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details - CRUD Operations</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans antialiased">
    <div class="flex min-h-screen">
        
        <div class="w-64 bg-white border-r border-gray-200 p-6 flex flex-col justify-between">
            <div>
                <h1 class="text-xl font-bold text-gray-800 mb-8">CRUD Operations</h1>
                <nav class="space-y-2">
                    <a href="#" class="flex items-center space-x-3 text-gray-600 p-2 rounded-md hover:bg-gray-50">
                        <i class="fa-solid fa-chart-pie w-5 text-gray-400"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="{{ route('product.index') }}" class="flex items-center space-x-3 bg-blue-50 text-blue-600 p-2 rounded-md font-medium">
                        <i class="fa-solid fa-box w-5 text-blue-600"></i>
                        <span>Products</span>
                    </a>
                    <div class="pl-8 space-y-1">
                        <a href="{{ route('product.index') }}" class="block text-sm text-blue-600 font-medium p-1">All Products</a>
                    </div>
                    <a href="#" class="flex items-center space-x-3 text-gray-600 p-2 rounded-md hover:bg-gray-50">
                        <i class="fa-solid fa-gear w-5 text-gray-400"></i>
                        <span>Settings</span>
                    </a>
                </nav>
            </div>
            <div>
                <a href="#" class="flex items-center space-x-3 text-gray-500 hover:text-gray-700 p-2">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span>Log Out</span>
                </a>
            </div>
        </div>

        <div class="flex-1 p-8">
            <div class="flex items-center space-x-4 mb-6">
                <a href="{{ route('product.index') }}" class="text-gray-500 hover:text-gray-700">
                    <i class="fa-solid fa-arrow-left text-xl"></i>
                </a>
                <h2 class="text-2xl font-bold text-gray-800">Product Details</h2>
            </div>

            <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6 max-w-4xl">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Product Name</label>
                        <div class="p-3 bg-gray-50 border border-gray-200 rounded-lg text-gray-800 font-medium">{{ $product->name }}</div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Category</label>
                        <div class="p-3 bg-gray-50 border border-gray-200 rounded-lg text-gray-800">{{ $product->category ?? '-' }}</div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Brand</label>
                        <div class="p-3 bg-gray-50 border border-gray-200 rounded-lg text-gray-800">{{ $product->brand ?? '-' }}</div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Color</label>
                        <div class="p-3 bg-gray-50 border border-gray-200 rounded-lg text-gray-800">{{ $product->color ?? '-' }}</div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Stock (Qty)</label>
                        <div class="p-3 bg-gray-50 border border-gray-200 rounded-lg text-gray-800 font-semibold">{{ $product->qty }}</div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Price</label>
                        <div class="p-3 bg-gray-50 border border-gray-200 rounded-lg text-gray-900 font-bold">${{ number_format($product->price, 2) }}</div>
                    </div>
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-500 mb-1">Description</label>
                    <div class="p-4 bg-gray-50 border border-gray-200 rounded-lg text-gray-700 min-h-[100px] whitespace-pre-line">
                        {{ $product->description ?? 'No description available.' }}
                    </div>
                </div>

                <div class="flex justify-end space-x-3 border-t border-gray-100 pt-6">
                    <a href="{{ route('product.index') }}" class="px-5 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50">Back to List</a>
                    <a href="{{ route('product.edit', ['product' => $product]) }}" class="px-5 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-sm font-medium shadow-sm flex items-center space-x-2">
                        <i class="fa-regular fa-pen-to-square"></i>
                        <span>Edit Product</span>
                    </a>
                </div>
            </div>
        </div>

    </div>
</body>
</html>