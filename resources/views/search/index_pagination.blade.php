<div class="grid grid-cols-1 lg:grid-cols-3 gap-3">
    @foreach($products as $product)
        <div class="flex-col">
            <div>
                @if($product->images()->count()>0)
                    <img src="{{Storage::url($product->images[0]->imagePath)}}" alt=""
                         class="h-72 w-full object-center border-2 rounded-t-lg">
                @else
                    <div class="h-72 w-full flex justify-center items-center border-2 rounded-t-lg">
                        <p class="text-pink-500">No Image</p>
                    </div>
                @endif
            </div>

            <div class="border hover:scale-y-125 transition px-2">
                <div class="text-lg overflow-hidden text-black mt-2">
                    <div class="whitespace-nowrap">
                        <a href="{{route('product.show',$product->id)}}"> {{$product->title}}</a>
                    </div>
                </div>

                <div class="text-xl whitespace-nowrap text-black font-bold mt-1 overflow-ellipsis">
                    {{$product->price}} ₸
                </div>
                <div class="flex mt-1">
                    @if($product->average_rating > 0)
                        <div class="flex items-center">
                            @for($i=1; $i <= $product->average_rating; $i++)
                                <div class="text-pink-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                         fill="currentColor"
                                         class="w-5 h-5">
                                        <path fill-rule="evenodd"
                                              d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                              clip-rule="evenodd"/>
                                    </svg>
                                </div>
                            @endfor
                            <span
                                class="text-lg">
                                        /{{$product->feedbacks()->count()}}
                                {{trans_choice('отзыв|отзыва|отзывов',$product->feedbacks()->count())}}
                                    </span>
                        </div>

                    @else
                        <div class="flex items-end">
                            Нет отзывов
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mb-0.5 ml-0.5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z"/>
                            </svg>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
</div>
<div class="mt-2">
    {{$products->links()}}
</div>
