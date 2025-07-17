@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-6">Products</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($products as $product)
        <div class="relative m-2 flex w-full max-w-xs flex-col overflow-hidden rounded-lg border border-gray-100 bg-white shadow-md">
            <a class="relative mx-3 mt-3 flex h-60 overflow-hidden rounded-xl" href="#">
                <img class="object-cover w-full h-full" src="{{ $product->image ? asset('storage/'.$product->image) : 'https://images.unsplash.com/photo-1600185365483-26d7a4cc7519?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8OHx8c25lYWtlcnxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60' }}" alt="product image" />
            </a>
            <div class="mt-4 px-5 pb-5">
                <h5 class="text-xl tracking-tight text-slate-900">{{ $product->name }}</h5>
                <p class="text-gray-500 text-sm mt-1 mb-2">{{ $product->description }}</p>
                <div class="mt-2 mb-5 flex items-center justify-between">
                    <span class="text-3xl font-bold text-slate-900">${{ $product->price }}</span>
                </div>
                <span class="text-xs text-gray-400">Seller: {{ $product->user->name ?? 'Unknown' }}</span>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection 