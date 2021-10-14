@extends('layouts.main')

@section('content')
    <div class="mt-20 py-10 mx-6 md:mx-20">
        <div class="flex justify-between items-center">
            <p class="text-3xl">Products</p>
            <p class="text-xl text-blue-500">5 Items found</p>
        </div>

        <div class="flex justify-start w-full flex-wrap">
            <div class="product-card  shadow-lg">
                <a href="/">
                    <div class="h-48 md:h-60 flex relative">
                        <img src="/images/shirt.jpg" alt="">
                    </div>
                    <div class="p-2">
                        <p class="text-2xl text-blue-600">Plain T-shirt</p>
                        <p class="text-xl">Black</p>
                        <p class="text-xl">N5000</p>
                    </div>
                </a>
            </div>
            <div class="product-card  shadow-lg">
                <a href="/">
                    <div class="h-48 md:h-60 flex relative">
                        <img src="/images/shirt.jpg" alt="">
                    </div>
                    <div class="p-2">
                        <p class="text-2xl text-blue-600">Plain T-shirt</p>
                        <p class="text-xl">Black</p>
                        <p class="text-xl">N5000</p>
                    </div>
                </a>
            </div>
            <div class="product-card  shadow-lg">
                <a href="/">
                    <div class="h-48 md:h-60 flex relative">
                        <img src="/images/shirt.jpg" alt="">
                    </div>
                    <div class="p-2">
                        <p class="text-2xl text-blue-600">Plain T-shirt</p>
                        <p class="text-xl">Black</p>
                        <p class="text-xl">N5000</p>
                    </div>
                </a>
            </div>
            <div class="product-card  shadow-lg">
                <a href="/">
                    <div class="h-48 md:h-60 flex relative">
                        <img src="/images/shirt.jpg" alt="">
                    </div>
                    <div class="p-2">
                        <p class="text-2xl text-blue-600">Plain T-shirt</p>
                        <p class="text-xl">Black</p>
                        <p class="text-xl">N5000</p>
                    </div>
                </a>
            </div>
            <div class="product-card  shadow-lg">
                <a href="/">
                    <div class="h-48 md:h-60 flex relative">
                        <img src="/images/shirt.jpg" alt="">
                    </div>
                    <div class="p-2">
                        <p class="text-2xl text-blue-600">Plain T-shirt</p>
                        <p class="text-xl">Black</p>
                        <p class="text-xl">N5000</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection