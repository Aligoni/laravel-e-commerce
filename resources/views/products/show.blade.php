@extends('layouts.main')

@section('content')
    <div class="md:flex-1 md:flex md:flex-col mt-20 py-10 mx-6 md:mx-20">
        <div class="flex flex-start items-center">
            <a href="{{route('products')}}" class="hover:underline">
                <p class="text-2xl text-blue-600">
                    Back to products
                </p>
            </a>
        </div>

        <div class="flex md:flex-1 md:items-center flex-col md:flex-row w-full md:mx-10">
            <div class="md:flex-1 single-card relative">
                <img src="{{$product->image}}" alt="">
            </div>
            <div class="md:flex-1 py-5 px-4">
                <div class="md:pr-32">
                    <p class="text-4xl text-blue-600">{{$product->name}}</p>
                    <div class="border-b h-1 border-gray-300 my-2"></div>
                    <span class="text-2xl mr-3">Type:</span>
                    <span class="text-2xl font-bold">{{$product->type}}</span>
                    <div class="border-b h-1 border-gray-300 my-2"></div>
                    <span class="text-2xl mr-3">Color:</span>
                    <span class="text-2xl font-bold">{{$product->color}}</span>
                    <div class="border-b h-1 border-gray-300 my-2"></div>
                    <span class="text-2xl mr-3">Size:</span>
                    <span class="text-2xl font-bold">{{$product->size}}</span>
                    <div class="border-b h-1 border-gray-300 my-2"></div>
                    <span class="text-2xl mr-3">Price:</span>
                    <span class="text-2xl font-bold">{{$product->price}}</span>
                    <div class="border-b h-1 border-gray-300 my-2"></div>
                    <form method="POST" action="">
                        <x-button class="mt-4 w-full">
                            {{ __('Add to cart') }}
                        </x-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection