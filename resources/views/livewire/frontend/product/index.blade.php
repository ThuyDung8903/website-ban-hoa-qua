<div>
    <div class="row">
        <div class="col-md-3">
            @if($brands)
                <div class="card">
                    <div class="card-header">
                        <h4>Brands</h4>
                    </div>
                    <div class="card-body">
                        @foreach ($brands as $brand)
                            <label class="d-block">
                                <input type="checkbox" id="brand-{{ $brand->id }}" value="{{ $brand->id }}"
                                       wire:model="brandInputs"> {{ $brand->name }}
                            </label>
                        @endforeach
                        <button wire:click="$set('brandInputs', [])">Clear</button>
                    </div>
                </div>
            @endif
        </div>
        <div class="col-md-9">
            <div class="row">
                @forelse($products as $productItem)
                    <div class="col-md-4">
                        <div class="product-card">
                            <div class="product-card-img">
                                @if ($productItem->quantity > 0)
                                    <label class="stock bg-success">In Stock</label>
                                @else
                                    <label class="stock bg-warning">Out of Stock</label>
                                @endif

                                @if ($productItem->images->count() > 0)
                                    <a href="{{ url('/collections/'.$category->slug.'/'.$productItem->slug) }}">
                                        <img src="{{ $productItem->images[0]->path }}" alt="{{ $productItem->name}}">
                                    </a>
                                @endif

                            </div>
                            <div class="product-card-body">
                                <p class="product-brand">{{ $productItem->brand_name }}</p>
                                <h5 class="product-name">
                                    <a href="{{ url('/collections/'.$category->slug.'/'.$productItem->slug) }}">
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
            </div>
        </div>
    </div>

</div>
