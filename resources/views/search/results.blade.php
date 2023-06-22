        <div class="row border">
            @if($products->isEmpty())
                <div class="col-12 d-flex justify-content-center align-items-center">
                    Продукты не найдены!
                </div>
            @else
                <div class="col-12 mb-2">
                    <h2 class="display-7">
                        Результаты поиска для {{$search ?? 0}}
                    </h2>
                </div>

                <div class="col-12">
                    <div class="row border">
                        @foreach($products as $product)
                            <div class="col-md-4 gy-3">
                                <div class="card h-100 shadow border border-dark border-opacity-25">
                                    <div class="cart-header">
                                        <div class="card-img-bottom">
                                            @if(count($product->images) > 0 && $product->images[0]->imagePath)
                                                <img class="card-img"
                                                     src="{{Storage::url($product->images[0]->imagePath)}}"
                                                     alt=""
                                                     style="max-height: 150px">
                                            @else
                                                <x-no-image>No Image</x-no-image>
                                            @endif
                                        </div>
                                        <div class="card-title text-truncate">{{$product->title}}</div>
                                    </div>
                                    <div class="cart-body">
                                        <div class="card-text text-truncate">{{$product->description}}</div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
