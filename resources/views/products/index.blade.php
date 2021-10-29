@extends('layouts.main')

@section('content')
    <div class="mt-20 py-10 mx-6 md:mx-20">
        <div class="flex justify-between items-center">
            <p class="text-3xl">Products</p>
            <p class="text-xl text-blue-500">{{count($products)}} Item(s) found</p>
        </div>

        @if (count($products) > 0)
            <div class="flex justify-start w-full flex-wrap">
                @foreach ($products as $item)
                    <div class="product-card  shadow-lg">
                        <a href="/">
                            <div class="h-48 md:h-60 flex relative">
                                <img src="{{$item->image}}" alt="">
                            </div>
                            <div class="p-2">
                                <p class="text-2xl text-blue-600">{{$item->name}}</p>
                                <p class="text-xl">{{$item->color}}</p>
                                <p class="text-xl">N{{$item->price}}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            
        @endif
    </div>
@endsection