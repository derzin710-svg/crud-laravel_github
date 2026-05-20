<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products - CRUD Operations</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans antialiased">
    <div class="flex min-h-screen">
        
        <div class="w-64 bg-white border-r border-gray-200 p-6 flex flex-col justify-between">
            <div>
                <h1 class="text-xl font-bold text-gray-800 mb-8">Production</h1>
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
            
            <div class="flex justify-between items-center mb-8">
                <div class="flex items-center space-x-4">
                    <button class="text-gray-600 lg:hidden"><i class="fa-solid fa-bars text-xl"></i></button>
                </div>
                <div class="flex items-center space-x-4">
                    <button class="text-gray-500 p-2 hover:bg-gray-100 rounded-full"><i class="fa-regular fa-bell text-lg"></i></button>
                    <div class="flex items-center space-x-3">
                        <div class="text-right">
                            <p class="text-sm font-semibold text-gray-800">So Chetra</p>
                            <p class="text-xs text-gray-500">Admin</p>
                        </div>
                        <img src="{{ asset('image/photo_2026-05-20_20-49-15.jpg') }}" alt="Profile" class="w-10 h-10 rounded-full object-cover">
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
                
                <div class="p-5 border-b border-gray-200 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div class="relative max-w-md w-full">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-400">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </span>
                        <input type="text" placeholder="Search products" class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div class="flex items-center space-x-3 self-end sm:self-auto">
                        <a href="{{ route('product.create') }}" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-sm font-medium shadow-sm flex items-center space-x-2 transition">
                            <i class="fa-solid fa-plus text-xs"></i>
                            <span>Add Product</span>
                        </a>
                        <button class="px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 flex items-center space-x-2">
                            <i class="fa-solid fa-filter text-gray-400"></i>
                            <span>Filter Options</span>
                            <i class="fa-solid fa-chevron-down text-xs text-gray-400"></i>
                        </button>
                    </div>
                </div>

                @if(session()->has('success'))
                    <div class="m-5 p-4 bg-green-50 border-l-4 border-green-500 text-green-700 rounded flex items-center justify-between">
                        <div class="flex items-center space-x-2">
                            <i class="fa-solid fa-circle-check"></i>
                            <span class="text-sm font-medium">{{ session('success') }}</span>
                        </div>
                    </div>
                @endif

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-blue-50/50 text-gray-700 border-b border-gray-200 text-sm font-semibold">
                                <th class="p-4 w-12"><input type="checkbox" class="rounded border-gray-300 text-blue-600"></th>
                                <th class="p-4">Product Name</th>
                                <th class="p-4">Category</th>
                                <th class="p-4">Brand</th>
                                <th class="p-4">Color</th>
                                <th class="p-4">Stock</th>
                                <th class="p-4">Price</th>
                                <th class="p-4 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 text-sm text-gray-600">
                            @forelse($products as $product)
                                <tr class="hover:bg-gray-50/80 transition-colors">
                                    <td class="p-4"><input type="checkbox" class="rounded border-gray-300 text-blue-600"></td>
                                    <td class="p-4 font-medium text-gray-900 flex items-center space-x-3">
                                        <div class="w-10 h-10 bg-gray-100 border border-gray-200 rounded-lg flex items-center justify-center overflow-hidden">
                                            <i class="fa-solid fa-image text-gray-400 text-lg"></i>
                                        </div>
                                        <span>{{ $product->name }}</span>
                                    </td>
                                    <td class="p-4">{{ $product->category ?? '-' }}</td>
                                    <td class="p-4">{{ $product->brand ?? '-' }}</td>
                                    <td class="p-4">{{ $product->color ?? '-' }}</td>
                                    <td class="p-4">
                                        <div class="flex items-center space-x-2">
                                            <span class="w-2.5 h-2.5 rounded-full {{ $product->qty > 5 ? 'bg-green-500' : 'bg-red-500' }}"></span>
                                            <span class="font-medium text-gray-700">{{ $product->qty }}</span>
                                        </div>
                                    </td>
                                    <td class="p-4 font-semibold text-gray-900">${{ number_format($product->price, 2) }}</td>
                                    <td class="p-4">
                                        <div class="flex items-center justify-center space-x-3 text-base">
                                            
                                            <a href="{{ route('product.show', ['product' => $product]) }}" class="text-gray-400 hover:text-gray-600 p-1" title="View Detail">
                                                <i class="fa-regular fa-eye"></i>
                                            </a>
                                            
                                            <a href="{{ route('product.edit', ['product' => $product]) }}" class="text-gray-400 hover:text-blue-600 p-1" title="Edit">
                                                <i class="fa-regular fa-pen-to-square"></i>
                                            </a>
                                            
                                            <form method="POST" action="{{ route('product.destroy', ['product' => $product->id]) }}" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-gray-400 hover:text-red-600 p-1 align-middle" title="Delete" onclick="return confirm('Are you sure you want to delete this product?')">
                                                    <i class="fa-regular fa-trash-can"></i>
                                                </button>
                                            </form>

                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="p-8 text-center text-gray-400 bg-gray-50/50">
                                        <i class="fa-solid fa-box-open text-3xl mb-2 block"></i>
                                        No products found. Click "+ Add Product" to create one.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>
</body>
</html>