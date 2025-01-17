@extends('layouts.app')

@section('title', 'Home Page')

@section('content')

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">

        <div class="carousel-inner">
            @foreach ($sliders as $key => $sliderItem)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <img src="{{ asset("$sliderItem->image") }}" class="d-block w-100" alt="">
                </div>
            @endforeach
            {{--            <div class="carousel-item">--}}
            {{--                <img src="https://kalidas365itsolutions.files.wordpress.com/2014/06/every-sale.jpg" class="d-block w-100" alt="...">--}}
            {{--                <div class="carousel-caption d-none d-md-block">--}}
            {{--                    <div class="custom-carousel-content">--}}
            {{--                        <h1>--}}
            {{--                            <span>Best Ecommerce Solutions 2 </span>--}}
            {{--                            to Boost your Brand Name &amp; Sales--}}
            {{--                        </h1>--}}
            {{--                        <p>--}}
            {{--                            We offer an industry-driven and successful digital marketing strategy that helps our clients--}}
            {{--                            in achieving a strong online presence and maximum company profit.--}}
            {{--                        </p>--}}
            {{--                        <div>--}}
            {{--                            <a href="#" class="btn btn-slider">--}}
            {{--                                Get Now--}}
            {{--                            </a>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    {{--    Welcome to our website--}}
    <div class="py-5 bg-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <div class="col-md-12">
                        <h4 class="text-center">Welcome to our website</h4>
                        <div class="underline"></div>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium, adipisci alias aliquid
                        amet. Integer ipsum, laboriosam magnam natus nemo nisi nostrum officia quae quas quibusdam
                        quidem, quisquam, quod repellat voluptate.
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{--   All Categories --}}
    <div class="py-5 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>All Categories
                        <a href="{{ url('/categories') }}" class="btn btn-sm btn-primary float-end">View All</a>
                    </h4>
                    <div class="footer-underline mb-4"></div>
                </div>
                @if ($categories)
                    <div class="col-md-12">
                        <div class="owl-carousel owl-theme trending-product four-carousel">
                            @foreach($categories as $categoryItem)
                                <div class="item">
                                        <div class="category-card">
                                            @if (!empty($categoryItem->slug))
                                                <a href="{{ url('/collections/'.$categoryItem->slug) }}">
                                                    @else
                                                        <a href="{{ url('/collections/'.$categoryItem->id) }}">
                                                            @endif
                                                            <div class="category-card-img">
                                                                <img src="{{ $categoryItem->image }}" class="w-100"
                                                                     alt="{{ $categoryItem->slug }}">
                                                            </div>
                                                            <div class="category-card-body">
                                                                <h5>{{ $categoryItem->name }}</h5>
                                                            </div>
                                                        </a>
                                                </a>
                                        </div>
                                    </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="col-md-12">
                        <div class="p-2">
                            <h4>No Products Available</h4>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{--    Trending Products --}}
    <div class="py-5 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>Trending Products
                        <a href="{{ url('/trending-products') }}" class="btn btn-sm btn-primary float-end">View All</a>
                    </h4>
                    <div class="footer-underline mb-4"></div>
                </div>
                @if ($trendingProducts)
                    <div class="col-md-12">
                        <div class="owl-carousel owl-theme trending-product four-carousel">
                            @foreach($trendingProducts as $productItem)
                                <div class="item">
                                    <div class="product-card">
                                        <div class="product-card-img">
                                            <label class="stock bg-danger">New</label>
                                            @if ($productItem->images->count() > 0)
                                                <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}">
                                                    <img src="{{ $productItem->images[0]->path }}"
                                                         alt="{{ $productItem->name}}">
                                                </a>
                                            @endif

                                        </div>
                                        <div class="product-card-body">
                                            <p class="product-brand">{{ $productItem->brands->name }}</p>
                                            <h5 class="product-name">
                                                <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}">
                                                    {{ $productItem->name}}
                                                </a>
                                            </h5>
                                            <div>
                                                <span class="selling-price">${{ $productItem->sale_price }}</span>
                                                <span class="original-price">${{ $productItem->price }}</span>
                                            </div>
{{--                                            <div class="mt-2">--}}
{{--                                                <a href="" class="btn btn1">Add To Cart</a>--}}
{{--                                                <a href="" class="btn btn1"> <i class="fa fa-heart"></i> </a>--}}
{{--                                                <a href="" class="btn btn1"> View </a>--}}
{{--                                            </div>--}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="col-md-12">
                        <div class="p-2">
                            <h4>No Products Available</h4>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{--    New Arrivals --}}
    <div class="py-5 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>New Arrivals
                        <a href="{{ url('/new-arrivals') }}" class="btn btn-sm btn-primary float-end">View All</a>
                    </h4>
                    <div class="footer-underline mb-4"></div>
                </div>
                @if ($trendingProducts)
                    <div class="col-md-12">
                        <div class="owl-carousel owl-theme trending-product four-carousel">
                            @foreach($newArrivalsProducts as $productItem)
                                <div class="item">
                                    <div class="product-card">
                                        <div class="product-card-img">
                                            <label class="stock bg-danger">New</label>
                                            @if ($productItem->images->count() > 0)
                                                <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}">
                                                    <img src="{{ $productItem->images[0]->path }}"
                                                         alt="{{ $productItem->name}}">
                                                </a>
                                            @endif

                                        </div>
                                        <div class="product-card-body">
                                            <p class="product-brand">{{ $productItem->brands->name }}</p>
                                            <h5 class="product-name">
                                                <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}">
                                                    {{ $productItem->name}}
                                                </a>
                                            </h5>
                                            <div>
                                                <span class="selling-price">${{ $productItem->sale_price }}</span>
                                                <span class="original-price">${{ $productItem->price }}</span>
                                            </div>
                                            {{--                                            <div class="mt-2">--}}
                                            {{--                                                <a href="" class="btn btn1">Add To Cart</a>--}}
                                            {{--                                                <a href="" class="btn btn1"> <i class="fa fa-heart"></i> </a>--}}
                                            {{--                                                <a href="" class="btn btn1"> View </a>--}}
                                            {{--                                            </div>--}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="col-md-12">
                        <div class="p-2">
                            <h4>No Products Available</h4>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('.four-carousel').owlCarousel({
            loop: true,
            margin: 10,
            dots: true,
            nav: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        })
    </script>
@endsection
