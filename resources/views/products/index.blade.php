@extends('layouts.main')

@section('content')
    <div class="mt-20 py-10 mx-2 md:mx-20">
        <div class="flex justify-between items-center mx-4">
            <p class="text-3xl">Products</p>
            <p class="text-xl text-blue-500">{{count($products)}} Item(s) found</p>
        </div>

        @if (count($products) > 0)
            <div class="flex justify-start w-full flex-wrap">
                @foreach ($products as $item)
                    <div class="product-card  shadow-lg">
                        <a href="/products/{{$item->id}}">
                            <div class="h-48 md:h-60 flex relative">
                                <img src="{{$item->image}}" alt="product image">
                            </div>
                            <div class="p-2">
                                <p class="text-2xl text-blue-600">{{$item->name}}</p>
                                <p class="text-xl">{{$item->color}}</p>
                                <p class="text-xl">£{{number_format(sprintf('%0.2f', preg_replace("/[^0-9.]/", "", $item->price)),2)}}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <div class="single-card flex justify-center items-center" style="background: initial">
                <p class="text-4xl text-center text-blue-800">NO PRODUCT YET</p>
            </div>
        @endif
    </div>
@endsection