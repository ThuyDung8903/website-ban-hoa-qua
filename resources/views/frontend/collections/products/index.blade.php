@extends('layouts.app')

@section('title')
    {{ $category->meta_title }}
@endsection

@section('meta_keywords')
    {{ $category->meta_keywords }}
@endsection

@section('meta_description')
    {{ $category->meta_description }}
@endsection

@section('content')
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="mb-4">Our Products</h4>
                </div>

                @forelse($products as $productItem)
                    <div class="col-md-3">
                        <div class="product-card">
                            <div class="product-card-img">
                                @if ($productItem->status == 1)
                                    <label class="stock bg-success">In Stock</label>
                                @elseif ($productItem->status == 0)
                                    <label class="stock bg-success">Out of Stock</label>
                                @elseif ($productItem->status == 2)
                                    <label class="stock bg-success">Stop sale</label>
                                @endif

                                @if ($productItem->images->count() > 0)
                                    <a href="{{ url('/collections/'.$productItem->categories->id.'/'.$productItem->id) }}">
                                        <img src="{{ $productItem->images[0]->path }}" alt="{{ $productItem->name}}">
                                    </a>
                                @endif

                            </div>
                            <div class="product-card-body">
                                <p class="product-brand">{{ $productItem->brand_name }}</p>
                                <h5 class="product-name">
                                    <a href="{{ url('/collections/'.$productItem->categories->id.'/'.$productItem->id) }}">
                                        {{ $productItem->name}}
                                    </a>
                                </h5>
                                <div>
                                    <span class="selling-price">${{ $productItem->sale_price }}</span>
                                    <span class="original-price">${{ $productItem->price }}</span>
                                </div>
                                <div class="mt-2">
                                    <a href="" class="btn btn1">Add To Cart</a>
                                    <a href="" class="btn btn1"> <i class="fa fa-heart"></i> </a>
                                    <a href="" class="btn btn1"> View </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12">
                        <div class="p-2">
                            <h4>No Products Available for {{ $category->name }}</h4>
                        </div>
                    </div>
                @endforelse
                {{--                <div class="col-md-3">--}}
                {{--                    <div class="product-card">--}}
                {{--                        <div class="product-card-img">--}}
                {{--                            <label class="stock bg-success">In Stock</label>--}}
                {{--                            <img src="hp-laptop.jpg" alt="Laptop">--}}
                {{--                        </div>--}}
                {{--                        <div class="product-card-body">--}}
                {{--                            <p class="product-brand">HP</p>--}}
                {{--                            <h5 class="product-name">--}}
                {{--                                <a href="">--}}
                {{--                                    HP Laptop--}}
                {{--                                </a>--}}
                {{--                            </h5>--}}
                {{--                            <div>--}}
                {{--                                <span class="selling-price">$500</span>--}}
                {{--                                <span class="original-price">$799</span>--}}
                {{--                            </div>--}}
                {{--                            <div class="mt-2">--}}
                {{--                                <a href="" class="btn btn1">Add To Cart</a>--}}
                {{--                                <a href="" class="btn btn1"> <i class="fa fa-heart"></i> </a>--}}
                {{--                                <a href="" class="btn btn1"> View </a>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                {{--                <div class="col-md-3">--}}
                {{--                    <div class="product-card">--}}
                {{--                        <div class="product-card-img">--}}
                {{--                            <label class="stock bg-success">In Stock</label>--}}
                {{--                            <img src="mobile-redmi-note-8.jpg" alt="Red MI Note 8">--}}
                {{--                        </div>--}}
                {{--                        <div class="product-card-body">--}}
                {{--                            <p class="product-brand">MI</p>--}}
                {{--                            <h5 class="product-name">--}}
                {{--                                <a href="">--}}
                {{--                                    Red MI Note 8--}}
                {{--                                </a>--}}
                {{--                            </h5>--}}
                {{--                            <div>--}}
                {{--                                <span class="selling-price">$200</span>--}}
                {{--                                <span class="original-price">$300</span>--}}
                {{--                            </div>--}}
                {{--                            <div class="mt-2">--}}
                {{--                                <a href="" class="btn btn1">Add To Cart</a>--}}
                {{--                                <a href="" class="btn btn1"> <i class="fa fa-heart"></i> </a>--}}
                {{--                                <a href="" class="btn btn1"> View </a>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                {{--                <div class="col-md-3">--}}
                {{--                    <div class="product-card">--}}
                {{--                        <div class="product-card-img">--}}
                {{--                            <label class="stock bg-success">In Stock</label>--}}
                {{--                            <img src="casual-shirt.jpg" alt="Mens Shirt">--}}
                {{--                        </div>--}}
                {{--                        <div class="product-card-body">--}}
                {{--                            <p class="product-brand">Levis</p>--}}
                {{--                            <h5 class="product-name">--}}
                {{--                                <a href="">--}}
                {{--                                    Mens Shirt--}}
                {{--                                </a>--}}
                {{--                            </h5>--}}
                {{--                            <div>--}}
                {{--                                <span class="selling-price">$299</span>--}}
                {{--                                <span class="original-price">$359</span>--}}
                {{--                            </div>--}}
                {{--                            <div class="mt-2">--}}
                {{--                                <a href="" class="btn btn1">Add To Cart</a>--}}
                {{--                                <a href="" class="btn btn1"> <i class="fa fa-heart"></i> </a>--}}
                {{--                                <a href="" class="btn btn1"> View </a>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                {{--                <div class="col-md-3">--}}
                {{--                    <div class="product-card">--}}
                {{--                        <div class="product-card-img">--}}
                {{--                            <label class="stock bg-success">In Stock</label>--}}
                {{--                            <img src="headphone.jpg" alt="Head Phone">--}}
                {{--                        </div>--}}
                {{--                        <div class="product-card-body">--}}
                {{--                            <p class="product-brand">Asus</p>--}}
                {{--                            <h5 class="product-name">--}}
                {{--                                <a href="">--}}
                {{--                                    Head Phone--}}
                {{--                                </a>--}}
                {{--                            </h5>--}}
                {{--                            <div>--}}
                {{--                                <span class="selling-price">$399</span>--}}
                {{--                                <span class="original-price">$499</span>--}}
                {{--                            </div>--}}
                {{--                            <div class="mt-2">--}}
                {{--                                <a href="" class="btn btn1">Add To Cart</a>--}}
                {{--                                <a href="" class="btn btn1"> <i class="fa fa-heart"></i> </a>--}}
                {{--                                <a href="" class="btn btn1"> View </a>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                {{--            </div>--}}
            </div>
        </div>

@endsection
