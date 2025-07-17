@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto py-8">
    <h1 class="text-2xl font-bold mb-6">Add Product</h1>
    <form method="POST" action="{{ route('seller.products.store') }}" class="bg-white p-6 rounded shadow">
        @csrf
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Name</label>
            <input type="text" name="name" class="w-full border rounded px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Description</label>
            <textarea name="description" class="w-full border rounded px-3 py-2" required></textarea>
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Price</label>
            <input type="number" step="0.01" name="price" class="w-full border rounded px-3 py-2" required>
        </div>
        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Add Product</button>
    </form>
</div>
@endsection 