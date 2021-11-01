@extends('layouts.main')

@section('content')
<div class="mt-32 p-4">
    <div class="text-center">
        <p class="text-3xl">Your Cart</p>
    </div>
    @if (count($items) > 0)
        @foreach ($items as $item)
            <div class="flex flex-col md:hidden">
                <div class="flex-1"></div>
            </div>
            <div class="hidden md:flex m-6 bg-white shadow-lg p-4 justify-between items-center">
                <a href='products/{{$item->product_id}}' class="cart-image flex-1 h-40 relative ">
                    <img src="{{ $item->product->image }}" alt="product image">
                </a>
                <div class="flex-1 text-center text-lg border-l border-gray-400">
                    {{$item->product->type}}
                </div>
                <div class="flex-1 text-center text-lg border-l border-gray-400">
                    {{$item->product->size}}
                </div>
                <div class="flex justify-center items-center flex-1 text-center text-lg border-l border-gray-400">
                    <form method="POST" action="/products/{{$item->product_id}}" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <x-button class="bg-red-700 hover:bg-red-600 active:bg-red-800 focus:border-red-800 ring-red-400">
                            {{ __('-') }}
                        </x-button>
                    </form>
                    <p class="px-5">
                        {{$item->quantity}}
                    </p>
                    <form method="POST" action="/products/{{$item->product_id}}" class="inline-block">
                        @csrf
                        <x-button class="bg-red-700 hover:bg-red-600 active:bg-red-800 focus:border-red-800 ring-red-400">
                            {{ __('+') }}
                        </x-button>
                    </form>
                </div>
                <div class="flex-1 text-center text-lg border-l border-gray-400">
                    {{$item->product->price * $item->quantity}}
                </div>
            </div>
        @endforeach
    @else
        
    @endif
</div>
@endsection