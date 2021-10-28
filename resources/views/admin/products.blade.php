@extends('layouts.admin')

@section('content')
<div class="mt-12 py-20 px-4 md:px-20">
    <div class="text-center mb-10">
        <p class="text-3xl">
            Admin Section
        </p>
    </div>
    @if ($add == 1)
        <div class="modal relative">
            <div class="modal-content bg-white shadow-lg pt-4">
                <div class="flex justify-between items center border-b border-gray-200 px-6 py-2">
                    <p class="text-3xl">Add Product</p>
                    <a href="/admin/products"
                        class="py-1 inline-block text-center px-3 border border-transparent rounded-md font-semibold hover:text-white text-xl uppercase tracking-widest hover:bg-gray-700 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                        X
                    </a>
                </div>
                <div class="p-6">
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />
                    
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    
                    <form method="POST" action="/admin/products">
                        @csrf
            
                        <div class="mt-4">
                            <x-label for="name" :value="__('Name')" />
                    
                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                                autofocus />
                        </div>
                        <div class="mt-4">
                            <x-label for="color" :value="__('Color')" />
                        
                            <x-input id="color" class="block mt-1 w-full" type="text" name="color" :value="old('color')" required autofocus />
                        </div>
                        <div class="mt-4">
                            <x-label for="size" :value="__('Size')" />
                    
                            <x-input id="size" class="block mt-1 w-full" type="text" name="size" :value="old('size')" required
                                autofocus />
                        </div>
                        <div class="mt-4">
                            <x-label for="type" :value="__('Type')" />
                        
                            <x-input id="type" class="block mt-1 w-full" type="text" name="type" :value="old('type')" required autofocus />
                        </div>
                        <div class="mt-4">
                            <x-label for="price" :value="__('Price')" />
                        
                            <x-input id="price" class="block mt-1 w-full" type="text" name="price" :value="old('price')" required autofocus />
                        </div>
                        <div class="mt-4">
                            <x-label for="image" :value="__('Image Url')" />
                        
                            <x-input id="image" class="block mt-1 w-full" type="text" name="image" :value="old('image')" required autofocus />
                        </div>
                    
                        <div class="flex items-center justify-end mt-4">
                            {{-- @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                            @endif --}}
                            <x-button class="ml-3">
                                {{ __('Add') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
    <div class="px-8 mb-8 flex items-center justify-between">
        <p class="text-3xl">Products</p>
        <a href="/admin/products?add=1"
            class="py-2 inline-block text-center px-4 bg-gray-800 border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
            Add
        </a>
    </div>
    @if (count($products) > 0)
        <div class="flex justify-start w-full flex-wrap">
            @foreach ($products as $item)
                <div class="admin-product-card shadow-lg">
                    <a href="/">
                        <div class="h-48 md:h-60 flex relative">
                            <img src="{{ $item->image }}"
                                alt="product image">
                        </div>
                        <div class="p-2">
                            <p class="text-2xl text-blue-600">{{$item->name}}</p>
                            <p class="text-xl">Type: {{$item->type}}</p>
                            <p class="text-xl">Color: {{$item->color}}</p>
                            <p class="text-xl">Size: {{$item->size}}</p>
                            {{-- <p class="text-xl">{{$item->price}}</p> --}}
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center">
            <p class="text-3xl">No Product Yet</p>
        </div>
    @endif
</div>
@endsection