@extends('layouts.base')

@section('content')
    <x-container>
        <div class="row product-body d-flex flex-column">

            <div class=" text-start col-10">
                <div class="card-0">
                    <div class="cart-title">
                        <h3 class="display-6 pb-1 d-inline">
                           {{$product->title}}
                        </h3>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="average_rating">
                    @if($product->average_rating == 0 || $product->average_rating == null)
                        <div class="rating d-flex">
                            @for($i=0;$i<5;$i++)
                                <img class="ms-1 mt-3" width="10" height="10"
                                     src="https://img.icons8.com/ios/50/star--v1.png" alt="star--v1"/>
                            @endfor
                            <p class="ps-2 mt-2">Нет отзывов</p>
                        </div>
                    @else
                        <div class="rating d-flex">
                            @for($i=0;$i<$product->average_rating;$i++)
                                <img class="ms-1 mt-2" width="10" height="10"
                                     src="https://img.icons8.com/fluency/48/star.png" alt="star"/>
                            @endfor
                            <p class="ms-2 mb-1">отзыва {{$product->feedbacks()->count()}}</p>
                        </div>
                    @endif
                </div>
            </div>


            <div class="row pt-3 ">
                <div class="col-md-6 ">
                    <div class="image w-100 h-100 align-items-center">
                        @if($images->count()>0)
                            <div class="mb-4">
                                <img id="main-image" src="{{ Storage::url($product->images[0]->imagePath) }}"
                                     class="img-fluid img-thumbnail shadow" alt="Main Image"
                                     style="max-height: 400px">
                            </div>
                        @else
                            <div class="d-flex justify-content-center align-items-center" style="height: 200px">
                                <span class="text-muted">No image</span>
                            </div>
                        @endif

                        @if($images->count()>1)
                            <div class="d-flex flex-wrap">
                                @foreach($product->images as $image)
                                    <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-3">
                                        <img class="img-fluid img-thumbnail shadow"
                                             src="{{ Storage::url($image->imagePath) }}"
                                             alt="Additional Image" style="max-height: 100px;"
                                             onclick="changeMainImage('{{ Storage::url($image->imagePath) }}')">
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>

                </div>
                <div class="col-md-4  d-flex flex-column justify-content-between ">
                    <div class="border rounded">
                        <div class="row d-flex justify-content-center ">
                            <div>
                                <div class="ms-1 mb-3 mt-3  d-flex nowrap flex-column"
                                     style="font-size: 22px; font-weight: 700;">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12">Cтоимость:</div>
                                        <div class="col-lg-6 col-md-12">{{$product->price}} ₸</div>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="row mt-2">
                            <div class="col-12">
                                @if(Auth::check())
                                    <x-form class="d-flex justify-content-start"
                                            action="{{route('cart.add',$product->id)}}" method="POST">
                                        @csrf
                                        <x-button class="border pe-5 ps-5 pt-3 pb-3 w-100" type="submit">Добавить в
                                            корзину
                                        </x-button>
                                    </x-form>
                                @else
                                    <x-form class="d-flex justify-content-start"
                                            action="{{route('cart.addSession',$product->id)}}" method="POST">
                                        @csrf
                                        <x-button class="border pe-5 ps-5 pt-3 pb-3 w-100" type="submit">Добавить в
                                            корзину
                                        </x-button>
                                    </x-form>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <div class="categories">
                                    <h3 class="display-7 fw-bold">
                                        Категории
                                    </h3>
                                </div>
                                @if($product->categories()->count() === 0)
                                    <div class="fw-light">Категорий нет</div>
                                @else
                                    @foreach($product->categories as $category)
                                        <ul class="list-group">
                                            <li class="list-group-item">{{$category->name}}</li>
                                        </ul>
                                    @endforeach
                                @endif

                            </div>

                            <div class="col-md-12 fw-bold h3 display-7 ">Описание</div>
                            <div class="col-md-12">
                                 <span class="text-wrap text-break">
                               {{$product->description}}
                                </span>
                            </div>


                        </div>
                    </div>
                </div>

                <div class="col-md-2 ">
                    <div class="text-danger mt-2">Доставка в <span class="fw-bolder">Астана</span></div>
                    <div class="mt-2">Курьером по городу – <p class="fw-bolder text-success">Бесплатно</p>
                        Товар доставляется курьерской службой компании.
                    </div>

                    <div class="pt-4" style="font-size: 15px">Самовывоз из магазина
                        – <span style="font-size: 18px" class="fw-bolder text-success">Бесплатно</span>
                        <br>

                        <p style="font-size:12px;">
                            Заберите товар самостоятельно в одном из магазинов «Мечта».
                        </p>

                        <p>
                        <h3 class="fw-bold mt-3" style="font-size: 20px">Оплата</h3></p>
                        <p class="mt-2">Наличными при получении</p>

                        <span class="mt-2">
                            <svg width="66" height="21" viewBox="0 0 66 21" fill="none"
                                 xmlns="http://www.w3.org/2000/svg" style="height: 14px; width: 44px;"><path
                                    d="M28.5999 20.6972H23.2535L26.5975 0.368652H31.9437L28.5999 20.6972Z"
                                    fill="#00579F"></path><path
                                    d="M47.9813 0.865467C46.9268 0.454148 45.2542 0 43.186 0C37.9062 0 34.1882 2.768 34.1654 6.72541C34.1215 9.64517 36.8274 11.2669 38.8511 12.2404C40.9196 13.2352 41.6227 13.8846 41.6227 14.7713C41.6017 16.1332 39.9513 16.7609 38.412 16.7609C36.2774 16.7609 35.1337 16.4373 33.3956 15.6796L32.6916 15.3548L31.9434 19.9181C33.1974 20.4797 35.5076 20.9782 37.9062 21C43.5161 21 47.1683 18.2748 47.2116 14.0576C47.2329 11.7434 45.8041 9.97026 42.7238 8.5213C40.8538 7.59116 39.7086 6.96398 39.7086 6.01228C39.7305 5.1471 40.6772 4.26094 42.7881 4.26094C44.5262 4.21753 45.8032 4.62828 46.7707 5.03931L47.2542 5.25517L47.9813 0.865467V0.865467Z"
                                    fill="#00579F"></path><path
                                    d="M55.0873 13.4955C55.5276 12.3277 57.2218 7.80776 57.2218 7.80776C57.1996 7.85116 57.6612 6.61835 57.9252 5.86154L58.2989 7.61317C58.2989 7.61317 59.3113 12.4792 59.5312 13.4955C58.6956 13.4955 56.1433 13.4955 55.0873 13.4955ZM61.6868 0.368652H57.5513C56.276 0.368652 55.3071 0.735994 54.7569 2.05532L46.8154 20.6969H52.4253C52.4253 20.6969 53.3489 18.1879 53.5474 17.6475C54.1628 17.6475 59.6201 17.6475 60.4118 17.6475C60.5653 18.3612 61.0497 20.6969 61.0497 20.6969H66L61.6868 0.368652V0.368652Z"
                                    fill="#00579F"></path><path
                                    d="M18.7879 0.368652L13.552 14.2308L12.9798 11.4194C12.0118 8.17539 8.97587 4.65086 5.58795 2.89837L10.3839 20.6757H16.0376L24.4413 0.368652H18.7879V0.368652Z"
                                    fill="#00579F"></path><path
                                    d="M8.68994 0.368652H0.0880012L0 0.779397C6.71005 2.46635 11.154 6.5327 12.9798 11.4202L11.1098 2.07745C10.802 0.779109 9.85589 0.41148 8.68994 0.368652Z"
                                    fill="#FAA61A"></path></svg>
                            <svg width="33" height="25" viewBox="0 0 33 25" fill="none"
                                 xmlns="http://www.w3.org/2000/svg" style="height: 14px; width: 19px;"><g
                                    clip-path="url(#clip0_9229_6232)"><path
                                        d="M5.98108 24.9451V23.286C5.98108 22.6513 5.58477 22.2357 4.90442 22.2357C4.56425 22.2357 4.19435 22.3453 3.94005 22.7061C3.74189 22.4032 3.45786 22.2357 3.03182 22.2357C2.7478 22.2357 2.46377 22.3195 2.23919 22.6223V22.2905H1.64471V24.9451H2.23919V23.4793C2.23919 23.0089 2.49349 22.7866 2.88981 22.7866C3.28613 22.7866 3.48429 23.0347 3.48429 23.4793V24.9451H4.07876V23.4793C4.07876 23.0089 4.36279 22.7866 4.72938 22.7866C5.1257 22.7866 5.32386 23.0347 5.32386 23.4793V24.9451H5.98108ZM14.7991 22.2905H13.8348V21.4883H13.2403V22.2905H12.702V22.8156H13.2403V24.0334C13.2403 24.6423 13.4946 24.9999 14.1749 24.9999C14.4292 24.9999 14.7133 24.9161 14.9114 24.8066L14.7397 24.3072C14.568 24.4168 14.3698 24.4458 14.2278 24.4458C13.9438 24.4458 13.8315 24.2782 13.8315 24.0044V22.8156H14.7958V22.2905H14.7991ZM19.8456 22.2325C19.5054 22.2325 19.2775 22.4 19.1355 22.6191V22.2873H18.541V24.9419H19.1355V23.4471C19.1355 23.0057 19.3337 22.7544 19.7036 22.7544C19.8158 22.7544 19.9579 22.7834 20.0735 22.8092L20.2452 22.2551C20.1263 22.2325 19.9579 22.2325 19.8456 22.2325ZM12.2198 22.5096C11.9357 22.3163 11.5394 22.2325 11.1134 22.2325C10.433 22.2325 9.98058 22.5643 9.98058 23.0895C9.98058 23.5308 10.3208 23.7821 10.9152 23.8627L11.1993 23.8917C11.5097 23.9464 11.6814 24.0302 11.6814 24.1687C11.6814 24.362 11.4536 24.5005 11.0572 24.5005C10.6609 24.5005 10.3472 24.362 10.149 24.2235L9.86499 24.6648C10.1754 24.8871 10.6015 24.9967 11.0275 24.9967C11.8202 24.9967 12.2759 24.6359 12.2759 24.1397C12.2759 23.6694 11.906 23.4213 11.3413 23.3375L11.0572 23.3085C10.8029 23.2795 10.6048 23.2248 10.6048 23.0605C10.6048 22.8672 10.8029 22.7576 11.1167 22.7576C11.4569 22.7576 11.797 22.8962 11.9688 22.9799L12.2198 22.5096ZM28.0361 22.2325C27.696 22.2325 27.4681 22.4 27.3261 22.6191V22.2873H26.7316V24.9419H27.3261V23.4471C27.3261 23.0057 27.5242 22.7544 27.8941 22.7544C28.0064 22.7544 28.1484 22.7834 28.264 22.8092L28.4357 22.2615C28.3202 22.2325 28.1517 22.2325 28.0361 22.2325ZM20.4401 23.6178C20.4401 24.42 21.0081 24.9999 21.8866 24.9999C22.2829 24.9999 22.567 24.9161 22.851 24.6971L22.567 24.2267C22.3391 24.3942 22.1145 24.4748 21.8569 24.4748C21.3747 24.4748 21.0345 24.1429 21.0345 23.6178C21.0345 23.1185 21.3747 22.7866 21.8569 22.7609C22.1112 22.7609 22.3391 22.8446 22.567 23.0089L22.851 22.5386C22.567 22.3163 22.2829 22.2357 21.8866 22.2357C21.0081 22.2325 20.4401 22.8156 20.4401 23.6178ZM25.9389 23.6178V22.2905H25.3445V22.6223C25.1463 22.3743 24.8623 22.2357 24.4924 22.2357C23.7262 22.2357 23.1317 22.8156 23.1317 23.6178C23.1317 24.42 23.7262 24.9999 24.4924 24.9999C24.8887 24.9999 25.1727 24.8614 25.3445 24.6133V24.9451H25.9389V23.6178ZM23.7559 23.6178C23.7559 23.1475 24.0664 22.7609 24.5783 22.7609C25.0604 22.7609 25.4006 23.1217 25.4006 23.6178C25.4006 24.0882 25.0604 24.4748 24.5783 24.4748C24.0697 24.4458 23.7559 24.085 23.7559 23.6178ZM16.642 22.2325C15.8494 22.2325 15.2813 22.7866 15.2813 23.6146C15.2813 24.4458 15.8494 24.9967 16.6717 24.9967C17.0681 24.9967 17.4644 24.8871 17.7781 24.6359L17.4941 24.2203C17.2662 24.3878 16.9822 24.4973 16.7015 24.4973C16.3316 24.4973 15.965 24.3298 15.8791 23.8627H17.8904C17.8904 23.7789 17.8904 23.7241 17.8904 23.6404C17.9168 22.7866 17.4049 22.2325 16.642 22.2325ZM16.642 22.7319C17.0119 22.7319 17.2662 22.9542 17.3224 23.3665H15.9055C15.9617 23.0089 16.216 22.7319 16.642 22.7319ZM31.4114 23.6178V21.2402H30.8169V22.6223C30.6188 22.3743 30.3348 22.2357 29.9649 22.2357C29.1987 22.2357 28.6042 22.8156 28.6042 23.6178C28.6042 24.42 29.1987 24.9999 29.9649 24.9999C30.3612 24.9999 30.6452 24.8614 30.8169 24.6133V24.9451H31.4114V23.6178ZM29.2284 23.6178C29.2284 23.1475 29.5388 22.7609 30.0507 22.7609C30.5329 22.7609 30.8731 23.1217 30.8731 23.6178C30.8731 24.0882 30.5329 24.4748 30.0507 24.4748C29.5388 24.4458 29.2284 24.085 29.2284 23.6178ZM9.32666 23.6178V22.2905H8.73218V22.6223C8.53403 22.3743 8.25 22.2357 7.8801 22.2357C7.11389 22.2357 6.51941 22.8156 6.51941 23.6178C6.51941 24.42 7.11389 24.9999 7.8801 24.9999C8.27642 24.9999 8.56045 24.8614 8.73218 24.6133V24.9451H9.32666V23.6178ZM7.11719 23.6178C7.11719 23.1475 7.42764 22.7609 7.93955 22.7609C8.42174 22.7609 8.76191 23.1217 8.76191 23.6178C8.76191 24.0882 8.42174 24.4748 7.93955 24.4748C7.42764 24.4458 7.11719 24.085 7.11719 23.6178Z"
                                        fill="black"></path><path d="M20.952 2.12939H12.0216V17.7802H20.952V2.12939Z"
                                                                  fill="#FF5A00"></path><path
                                        d="M12.6161 9.9549C12.6161 6.77513 14.1485 3.95296 16.5 2.12951C14.7694 0.802191 12.5864 0 10.2052 0C4.56425 0 0 4.45232 0 9.9549C0 15.4575 4.56425 19.9098 10.2052 19.9098C12.5864 19.9098 14.7694 19.1076 16.5 17.7803C14.1452 15.9826 12.6161 13.1347 12.6161 9.9549Z"
                                        fill="#EB001B"></path><path
                                        d="M33 9.9549C33 15.4575 28.4357 19.9098 22.7948 19.9098C20.4136 19.9098 18.2306 19.1076 16.5 17.7803C18.8812 15.9536 20.3839 13.1347 20.3839 9.9549C20.3839 6.77513 18.8515 3.95296 16.5 2.12951C18.2273 0.802191 20.4103 0 22.7915 0C28.4357 0 33 4.48131 33 9.9549Z"
                                        fill="#F79E1B"></path></g><defs><clipPath id="clip0_9229_6232"><rect width="33"
                                                                                                             height="25"
                                                                                                             fill="white"></rect></clipPath></defs></svg>
                            <svg width="32" height="25" viewBox="0 0 32 25" fill="none"
                                 xmlns="http://www.w3.org/2000/svg" style="height: 14px; width: 19px;"><path
                                    d="M31.696 16.0829V15.6973H31.6L31.488 15.9543L31.376 15.6973H31.28V16.0829H31.344V15.7937L31.456 16.0507H31.536L31.648 15.7937V16.0829H31.696ZM31.056 16.0829V15.7615H31.184V15.6973H30.864V15.7615H30.992V16.0829H31.056Z"
                                    fill="#00A2E5"></path><path d="M20.32 17.7378H11.664V2.12085H20.32V17.7378Z"
                                                                fill="#7375CF"></path><path
                                    d="M12.224 9.92931C12.224 6.76414 13.696 3.93638 16 2.12082C14.32 0.787275 12.192 0 9.888 0C4.432 0 0 4.45051 0 9.92931C0 15.4081 4.432 19.8586 9.888 19.8586C12.192 19.8586 14.32 19.0713 16 17.7378C13.696 15.9222 12.224 13.0945 12.224 9.92931Z"
                                    fill="#EB001B"></path><path
                                    d="M32 9.92931C32 15.4081 27.568 19.8586 22.112 19.8586C19.808 19.8586 17.68 19.0713 16 17.7378C18.304 15.9222 19.776 13.0945 19.776 9.92931C19.776 6.76414 18.304 3.93638 16 2.12082C17.68 0.787275 19.808 0 22.112 0C27.568 0 32 4.45051 32 9.92931Z"
                                    fill="#00A2E5"></path><path
                                    d="M23.232 22.1563C23.344 22.1563 23.52 22.1723 23.632 22.2205L23.456 22.7668C23.328 22.7186 23.216 22.7025 23.104 22.7025C22.736 22.7025 22.544 22.9435 22.544 23.3773V24.8555H21.968V22.2205H22.528V22.5419C22.688 22.3009 22.912 22.1563 23.232 22.1563ZM21.12 22.7347H20.192V23.9236C20.192 24.1807 20.288 24.3574 20.576 24.3574C20.72 24.3574 20.912 24.3092 21.088 24.2128L21.248 24.7109C21.072 24.8394 20.784 24.9198 20.528 24.9198C19.856 24.9198 19.616 24.5502 19.616 23.9397V22.7347H19.088V22.2045H19.616V21.4011H20.192V22.2045H21.12V22.7347ZM13.808 23.297C13.872 22.9114 14.096 22.6543 14.512 22.6543C14.88 22.6543 15.12 22.8793 15.184 23.297H13.808ZM15.776 23.538C15.776 22.7186 15.264 22.1563 14.528 22.1563C13.76 22.1563 13.216 22.7186 13.216 23.538C13.216 24.3735 13.776 24.9198 14.56 24.9198C14.96 24.9198 15.312 24.8234 15.632 24.5502L15.344 24.1325C15.12 24.3092 14.848 24.4056 14.576 24.4056C14.208 24.4056 13.872 24.2289 13.792 23.7629H15.744C15.76 23.6826 15.776 23.6183 15.776 23.538ZM18.288 22.8953C18.128 22.7989 17.808 22.6704 17.472 22.6704C17.152 22.6704 16.976 22.7829 16.976 22.9757C16.976 23.1524 17.168 23.2006 17.424 23.2327L17.696 23.2649C18.272 23.3452 18.608 23.5862 18.608 24.0522C18.608 24.5502 18.176 24.9198 17.408 24.9198C16.976 24.9198 16.576 24.8073 16.272 24.5824L16.544 24.1325C16.736 24.2771 17.024 24.4056 17.424 24.4056C17.808 24.4056 18.016 24.2932 18.016 24.0843C18.016 23.9397 17.872 23.8593 17.552 23.8111L17.28 23.779C16.688 23.6987 16.368 23.4255 16.368 23.0078C16.368 22.4776 16.8 22.1563 17.456 22.1563C17.872 22.1563 18.256 22.2527 18.528 22.4294L18.288 22.8953ZM25.328 22.6865C25.216 22.6865 25.104 22.7025 25.008 22.7507C24.912 22.7989 24.816 22.8471 24.752 22.9275C24.688 23.0078 24.624 23.0881 24.576 23.2006C24.528 23.297 24.512 23.4255 24.512 23.538C24.512 23.6665 24.528 23.779 24.576 23.8754C24.624 23.9718 24.672 24.0682 24.752 24.1486C24.832 24.2289 24.912 24.2771 25.008 24.3253C25.104 24.3735 25.216 24.3896 25.328 24.3896C25.44 24.3896 25.552 24.3735 25.648 24.3253C25.744 24.2771 25.84 24.2289 25.904 24.1486C25.984 24.0682 26.032 23.9879 26.08 23.8754C26.128 23.779 26.144 23.6505 26.144 23.538C26.144 23.4095 26.128 23.297 26.08 23.2006C26.032 23.1042 25.984 23.0078 25.904 22.9275C25.824 22.8471 25.744 22.7989 25.648 22.7507C25.552 22.7186 25.44 22.6865 25.328 22.6865ZM25.328 22.1563C25.536 22.1563 25.728 22.1884 25.888 22.2687C26.064 22.333 26.208 22.4294 26.336 22.5579C26.464 22.6865 26.56 22.8311 26.64 22.9917C26.704 23.1685 26.752 23.3452 26.752 23.538C26.752 23.7308 26.72 23.9236 26.64 24.0843C26.576 24.261 26.464 24.4056 26.336 24.5181C26.208 24.6466 26.064 24.743 25.888 24.8073C25.712 24.8716 25.52 24.9198 25.328 24.9198C25.12 24.9198 24.928 24.8876 24.768 24.8073C24.592 24.743 24.448 24.6466 24.32 24.5181C24.192 24.3896 24.096 24.245 24.016 24.0843C23.952 23.9075 23.904 23.7308 23.904 23.538C23.904 23.3452 23.936 23.1524 24.016 22.9917C24.08 22.815 24.192 22.6704 24.32 22.5579C24.448 22.4294 24.592 22.333 24.768 22.2687C24.928 22.1884 25.12 22.1563 25.328 22.1563ZM10.48 23.538C10.48 23.0721 10.784 22.6865 11.28 22.6865C11.76 22.6865 12.064 23.056 12.064 23.538C12.064 24.02 11.744 24.3735 11.28 24.3735C10.784 24.3735 10.48 24.004 10.48 23.538ZM12.608 23.538V22.2205H12.032V22.5419C11.856 22.3009 11.584 22.1563 11.2 22.1563C10.464 22.1563 9.888 22.7347 9.888 23.538C9.888 24.3414 10.464 24.9198 11.2 24.9198C11.568 24.9198 11.84 24.7752 12.032 24.5342V24.8555H12.608V23.538ZM9.392 24.8555V23.2006C9.392 22.574 8.992 22.1563 8.352 22.1563C8.016 22.1563 7.664 22.2527 7.424 22.6222C7.248 22.333 6.96 22.1563 6.56 22.1563C6.288 22.1563 6 22.2366 5.792 22.5419V22.2205H5.216V24.8555H5.792V23.3934C5.792 22.9435 6.048 22.6865 6.432 22.6865C6.816 22.6865 7.008 22.9275 7.008 23.3773V24.8394H7.584V23.3773C7.584 22.9275 7.856 22.6704 8.224 22.6704C8.608 22.6704 8.8 22.9114 8.8 23.3613V24.8234H9.392V24.8555Z"
                                    fill="black"></path><path
                                    d="M27.36 24.6467V24.711H27.424C27.44 24.711 27.456 24.711 27.456 24.6949C27.472 24.6949 27.472 24.6788 27.472 24.6628C27.472 24.6467 27.472 24.6467 27.456 24.6467C27.456 24.6467 27.44 24.6306 27.424 24.6306H27.36V24.6467ZM27.424 24.6146C27.456 24.6146 27.472 24.6146 27.488 24.6306C27.504 24.6467 27.52 24.6628 27.52 24.6949C27.52 24.711 27.52 24.727 27.504 24.7431C27.488 24.7592 27.472 24.7592 27.44 24.7592L27.52 24.8556H27.456L27.376 24.7592H27.36V24.8556H27.312V24.6146H27.424ZM27.408 24.9359C27.44 24.9359 27.456 24.9359 27.488 24.9198C27.52 24.9038 27.536 24.8877 27.552 24.8716C27.568 24.8556 27.584 24.8395 27.6 24.8074C27.616 24.7752 27.616 24.7592 27.616 24.727C27.616 24.6949 27.616 24.6788 27.6 24.6467C27.584 24.6146 27.568 24.5985 27.552 24.5824C27.536 24.5664 27.52 24.5503 27.488 24.5342C27.472 24.5182 27.44 24.5182 27.408 24.5182C27.376 24.5182 27.36 24.5182 27.328 24.5342C27.296 24.5503 27.28 24.5664 27.264 24.5824C27.248 24.5985 27.232 24.6306 27.216 24.6467C27.2 24.6788 27.2 24.6949 27.2 24.727C27.2 24.7592 27.2 24.7752 27.216 24.8074C27.232 24.8395 27.248 24.8556 27.264 24.8716C27.28 24.8877 27.312 24.9038 27.328 24.9198C27.36 24.9359 27.376 24.9359 27.408 24.9359ZM27.408 24.47C27.44 24.47 27.472 24.47 27.504 24.486C27.536 24.5021 27.568 24.5182 27.584 24.5342C27.6 24.5503 27.632 24.5824 27.648 24.6146C27.664 24.6467 27.664 24.6788 27.664 24.711C27.664 24.7431 27.664 24.7752 27.648 24.8074C27.632 24.8395 27.616 24.8716 27.584 24.8877C27.552 24.9038 27.536 24.9359 27.504 24.952C27.472 24.968 27.44 24.968 27.408 24.968C27.376 24.968 27.328 24.968 27.296 24.952C27.264 24.9359 27.232 24.9198 27.216 24.8877C27.2 24.8716 27.168 24.8395 27.152 24.8074C27.136 24.7752 27.136 24.7431 27.136 24.711C27.136 24.6788 27.136 24.6467 27.152 24.6146C27.168 24.5824 27.184 24.5503 27.216 24.5342C27.232 24.5182 27.264 24.486 27.296 24.486C27.328 24.47 27.376 24.47 27.408 24.47Z"
                                    fill="black"></path></svg>
                        </span>

                        <p class="mt-1"> Безналичная оплата <br>
                            для юридических лиц
                        </p>

                    </div>
                </div>


            </div>
        </div>


        @include('product.feedbacks')
    </x-container>
    @include('product.modals.feedback')
@endsection

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


<script>
    $(document).ready(function () {
        $('.like-btn').click(function () {
            const button = $(this);
            const form = button.closest('.like-form');
            const url = form.attr('action');

            if (!button.hasClass('disabled')) {
                button.addClass('disabled');
                const dislikeButton = form.find('.dislike-btn');
                dislikeButton.addClass('disabled');

                $.ajax({
                    url: url,
                    type: 'POST',
                    dataType: 'json',
                    data: form.serialize(),
                    success: function (response) {
                        const likeCount = response.like_count;
                        const dislikeCount = response.dislike_count;
                        const message = response.message;

                        if (message === "Лайк уже поставлен") {
                            toastr.warning(message);
                            return;
                        } else {
                            toastr.success(message);
                        }

                        form.find('.like-count').text(likeCount);
                        form.find('.dislike-count').text(dislikeCount);
                    },
                    error: function (xhr, status, error) {
                        // Обработка ошибки, если необходимо
                    }
                });
            }
        });

        $('.dislike-btn').click(function () {
            const button = $(this);
            const form = button.closest('.dislike-form');
            const url = form.attr('action');

            if (!button.hasClass('disabled')) {
                button.addClass('disabled');
                const likeButton = form.find('.like-btn');
                likeButton.addClass('disabled');

                $.ajax({
                    url: url,
                    type: 'POST',
                    dataType: 'json',
                    data: form.serialize(),
                    success: function (response) {
                        const likeCount = response.like_count;
                        const dislikeCount = response.dislike_count;
                        const message = response.message;

                        if (message === "Дизлайк уже поставлен") {
                            toastr.warning(message);
                            return;
                        } else {
                            toastr.success(message);
                        }

                        form.find('.like-count').text(likeCount);
                        form.find('.dislike-count').text(dislikeCount);
                    },
                    error: function (xhr, status, error) {
                        // Обработка ошибки, если необходимо
                    }
                });
            }
        });
    });
</script>
`
