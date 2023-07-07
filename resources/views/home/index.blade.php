@extends('layouts.base')

@section('content')
    <style>
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
    <div class="tw-container mt-10">
        <div class="md:flex  md:space-x-1">
            <a href="#" class="w-full md:w-2/3 transition-all duration-400  border-0">
                <img src="https://www.mechta.kz/storage/2023/06/08/27969cd8968a1830752dca24003c08e1c4075cb0.jpg" alt=""
                     class="w-full h-full object-cover hover:opacity-60 my-1 rounded">
            </a>
            <a href="#" class="w-full md:w-1/3 transition-all duration-300 border-0  ">
                <img src="https://www.mechta.kz/storage/2023/05/19/d065e333d3c42d9c097e3dfdc74466c90ef5c74b.jpg" alt=""
                     class="w-full h-full object-cover hover:opacity-60 my-1 rounded">
            </a>
        </div>


        {{-- Смартфоны и гаджеты --}}
        <section class="mt-16">
            <div class="relative">
                <section class="mt-16 z-10">
                    <p class="text-4xl font-bold">Смартфоны и гаджеты</p>

                    <div class="flex mt-5 px-2 space-x-3 overflow-x-auto z-20">
                        <div class="w-1/5 border rounded-2 hover:shadow-xl hover:border-0 flex-shrink-0"
                             style="width: 280px;">
                            <img class="object-cover h-82 w-82 py-4"
                                 src="https://www.mechta.kz/images/product/55054/17000000094_1-286.webp" alt="Product">
                            <a href="#"
                               class="px-6 text-gray-500 font-semibold overflow-hidden overflow-ellipsis line-clamp-2">
                                Телефон сотовый APPLE iPhone 13 128GB Blue
                            </a>
                            <p class="px-6 mt-3 text-xl font-black whitespace-nowrap">499 990 ₸</p>
                        </div>

                        <div class="w-1/5 border rounded-2 hover:shadow-xl hover:border-0 flex-shrink-0"
                             style="width: 280px;">
                            <img class="object-cover h-82 w-82 py-4"
                                 src="https://www.mechta.kz/export/1cbitrix/import_files/37/374d2b4b-f418-11eb-a23f-005056b6dbd7-286.webp"
                                 alt="Product">
                            <a href="#"
                               class="px-6 text-gray-500 font-semibold overflow-hidden overflow-ellipsis line-clamp-2">
                                Наушники MARSHALL MAJOR IV BT (black)
                            </a>
                            <p class="px-6 mt-3 text-xl font-black whitespace-nowrap">89 900 ₸</p>
                        </div>

                        <div class="w-1/5 border rounded-2 hover:shadow-xl hover:border-0 flex-shrink-0"
                             style="width: 280px;">

                            <img class="object-cover h-82 w-82 py-4"
                                 src="https://www.mechta.kz/export/1cbitrix/import_files/fc/fc99ae54-0491-11ec-a23f-005056b6dbd7-286.webp"
                                 alt="Product">
                            <a href="#"
                               class="px-6 text-gray-500 font-semibold overflow-hidden overflow-ellipsis line-clamp-2">
                                Смарт часы SAMSUNG Galaxy Watch4 Classic 46mm Black (SM-R890NZKACIS)
                            </a>
                            <p class="px-6 mt-3 text-xl font-black whitespace-nowrap">111 890 T</p>
                        </div>

                        <div class="w-1/5 border rounded-2 hover:shadow-xl hover:border-0 flex-shrink-0"
                             style="width: 280px;">

                            <img class="object-cover h-82 w-82 py-4"
                                 src="https://www.mechta.kz/images/product/38070/30000007220_1-286.webp" alt="Product">
                            <a href="#"
                               class="px-6 text-gray-500 font-semibold overflow-hidden overflow-ellipsis line-clamp-2">
                                Телефон сотовый NOKIA 6310 (Черный)
                            </a>
                            <p class="px-6 mt-3 text-xl font-black whitespace-nowrap">29 490 ₸</p>
                        </div>

                        <div class="w-1/5 border rounded-2 hover:shadow-xl hover:border-0 flex-shrink-0"
                             style="width: 280px;">

                            <img class="object-cover h-82 w-82 py-4"
                                 src="https://www.mechta.kz/export/1cbitrix/import_files/0f/0f7611bd-3b12-11ed-a24a-005056b6dbd7-286.webp"
                                 alt="Product">
                            <a href="#"
                               class="px-6 text-gray-500 font-semibold overflow-hidden overflow-ellipsis line-clamp-2">
                                Телефон сотовый APPLE iPhone 14 Pro 128GB (Deep Purple)
                            </a>
                            <p class="px-6 mt-3 text-xl font-black whitespace-nowrap">699 990 ₸</p>
                        </div>
                    </div>
                </section>
            </div>
        </section>

        {{-- Ноутбуки и компьютеры --}}
        <section class="mt-16">
            <div class="relative">
                <section class="mt-16 z-10">
                    <p class="text-4xl font-bold">Ноутбуки и компьютеры</p>

                    <div class="flex mt-5 px-2 space-x-3 overflow-x-auto z-20">
                        <div class="w-1/5 border rounded-2 hover:shadow-xl hover:border-0 flex-shrink-0 "
                             style="width: 280px;">
                            <img class="object-cover h-82 w-82 py-4"
                                 src="https://www.mechta.kz/export/1cbitrix/import_files/26/26be8812-eeee-11ed-a25a-005056b6dbd7-286.webp"
                                 alt="Product">
                            <a href="#"
                               class="px-6 text-gray-500 font-semibold overflow-hidden overflow-ellipsis line-clamp-2">
                                Ноутбук ASUS ROG Strix SCAR 17 G733PZ-LL023X/17.3 WQXGA 240Hz/AMD Ryzen 9 7945HX 2.5
                                Ghz/32/SSD1TB/RTX4080/12/Win11Pro
                            </a>

                            <p class="px-6 mt-3 text-xl font-black whitespace-nowrap">1 599 900 ₸</p>
                        </div>

                        <div class="w-1/5 border rounded-2 hover:shadow-xl hover:border-0 flex-shrink-0"
                             style="width: 280px;">
                            <img class="object-cover h-82 w-82 py-4"
                                 src="https://www.mechta.kz/export/1cbitrix/import_files/af/aff0d4ec-1a8f-11ec-a23f-005056b6dbd7-286.webp"
                                 alt="Product">
                            <a href="#"
                               class="px-6 text-gray-500 font-semibold overflow-hidden overflow-ellipsis line-clamp-2">
                                Планшет APPLE 10.2-inch iPad Wi-Fi 64GB - Space Grey (MK2K3RK/A)
                            </a>

                            <p class="px-6 mt-3 text-xl font-black whitespace-nowrap">169 990 ₸
                            </p>
                        </div>

                        <div class="w-1/5 border rounded-2 hover:shadow-xl hover:border-0 flex-shrink-0"
                             style="width: 280px;">

                            <img class="object-cover h-82 w-82 py-4"
                                 src="https://www.mechta.kz/export/1cbitrix/import_files/b7/b79fb087-f69e-11ec-a24a-005056b6dbd7-286.webp"
                                 alt="Product">
                            <a href="#"
                               class="px-6 text-gray-500 font-semibold overflow-hidden overflow-ellipsis line-clamp-2">
                                МФУ лазерный HP LaserJet M141W
                            </a>

                            <p class="px-6 mt-3 text-xl font-black whitespace-nowrap">91 990 ₸</p>
                        </div>

                        <div class="w-1/5 border rounded-2 hover:shadow-xl hover:border-0 flex-shrink-0"
                             style="width: 280px;">

                            <img class="object-cover h-82 w-82 py-4"
                                 src="https://www.mechta.kz/export/1cbitrix/import_files/84/84cc754e-45c4-11ec-a240-005056b6dbd7-286.webp"
                                 alt="Product">
                            <a href="#"
                               class="px-6 text-gray-500 font-semibold overflow-hidden overflow-ellipsis line-clamp-2">
                                Графический планшет WACOM One Small (CTL-472-N), Разрешение 2540 lpi, Чувствительность к
                                нажатию 2048, Интерфейс USB, Размер 210*146*7,5 мм, Чёрный
                            </a>

                            <p class="px-6 mt-3 text-xl font-black whitespace-nowrap">19 990 ₸</p>
                        </div>

                        <div class="w-1/5 border rounded-2 hover:shadow-xl hover:border-0 flex-shrink-0"
                             style="width: 280px;">

                            <img class="object-cover h-82 w-82 py-4"
                                 src="https://www.mechta.kz/export/1cbitrix/import_files/e2/e254754b-8b10-11ec-a244-005056b6dbd7-286.webp"
                                 alt="Product">
                            <a href="#"
                               class="px-6 text-gray-500 font-semibold overflow-hidden overflow-ellipsis line-clamp-2">
                                Персональный компьютер ACER Predator PO3-630 (DG.E2CMC.003)/Core i5 11400F 2.6
                                Ghz/16/2TB+SSD512/RTX3070/8/Dos
                            </a>

                            <p class="px-6 mt-3 text-xl font-black whitespace-nowrap">729 990 ₸
                            </p>
                        </div>
                    </div>
                </section>
            </div>
        </section>

        {{-- Игры, консоли и развлечения --}}
        <section class="mt-16">
            <div class="relative">
                <section class="mt-16 z-10">
                    <p class="text-4xl font-bold">Игры, консоли и развлечения</p>

                    <div class="flex mt-5 px-2 space-x-3 overflow-x-auto z-20">
                        <div class="w-1/5 border rounded-2 hover:shadow-xl hover:border-0 flex-shrink-0"
                             style="width: 280px;">
                            <img class="object-cover h-82 w-82 py-4"
                                 src="https://www.mechta.kz/export/1cbitrix/import_files/c6/c6e27097-219b-11ec-a23f-005056b6dbd7-286.webp"
                                 alt="Product">
                            <a href="#"
                               class="px-6 text-gray-500 font-semibold overflow-hidden overflow-ellipsis line-clamp-2">
                                Игровая консоль PlayStation 5
                            </a>
                            <p class="px-6 mt-3 text-xl font-black whitespace-nowrap">339 990 ₸</p>
                        </div>

                        <div class="w-1/5 border rounded-2 hover:shadow-xl hover:border-0 flex-shrink-0"
                             style="width: 280px;">
                            <img class="object-cover h-82 w-82 py-4"
                                 src="https://www.mechta.kz/export/1cbitrix/import_files/0a/0a7c537b-fc80-11ea-a231-005056b6dbd7-286.webp"
                                 alt="Product">
                            <a href="#"
                               class="px-6 text-gray-500 font-semibold overflow-hidden overflow-ellipsis line-clamp-2">
                                Игровая приставка Xbox Series S
                            </a>
                            <p class="px-6 mt-3 text-xl font-black whitespace-nowrap">219 990 ₸</p>
                        </div>

                        <div class="w-1/5 border rounded-2 hover:shadow-xl hover:border-0 flex-shrink-0"
                             style="width: 280px;">

                            <img class="object-cover h-82 w-82 py-4"
                                 src="https://www.mechta.kz/export/1cbitrix/import_files/0e/0ef4c9bd-0762-11ea-a22b-005056b6dbd7-286.webp"
                                 alt="Product">
                            <a href="#"
                               class="px-6 text-gray-500 font-semibold overflow-hidden overflow-ellipsis line-clamp-2">
                                Игровая приставка NINTENDO Switch Neon Red/Blue
                            </a>
                            <p class="px-6 mt-3 text-xl font-black whitespace-nowrap">213 990 ₸</p>
                        </div>

                        <div class="w-1/5 border rounded-2 hover:shadow-xl hover:border-0 flex-shrink-0"
                             style="width: 280px;">

                            <img class="object-cover h-82 w-82 py-4"
                                 src="https://www.mechta.kz/export/1cbitrix/import_files/68/6818ced2-48ee-11ec-a240-005056b6dbd7-286.webp"
                                 alt="Product">
                            <a href="#"
                               class="px-6 text-gray-500 font-semibold overflow-hidden overflow-ellipsis line-clamp-2">
                                Игровая приставка RETRO GENESIS SEGA HD Ultra + 225 игр ZD-06b (2 беспроводных 2.4 ГГц
                                джойстика, HDMI кабель)
                            </a>
                            <p class="px-6 mt-3 text-xl font-black whitespace-nowrap">39 990 ₸</p>
                        </div>

                        <div class="w-1/5 border rounded-2 hover:shadow-xl hover:border-0 flex-shrink-0"
                             style="width: 280px;">

                            <img class="object-cover h-82 w-82 py-4"
                                 src="https://www.mechta.kz/export/1cbitrix/import_files/7b/7b09c0bc-6afc-11ed-a24d-005056b6dbd7-286.webp"
                                 alt="Product">
                            <a href="#"
                               class="px-6 text-gray-500 font-semibold overflow-hidden overflow-ellipsis line-clamp-2">
                                Игровая консоль PlayStation 5 + God of War Ragnarök
                            </a>
                            <p class="px-6 mt-3 text-xl font-black whitespace-nowrap">364 990 ₸</p>
                        </div>
                    </div>
                </section>
            </div>
        </section>
    </div>

    {{--  Бренды  --}}
    <section class="mt-20">
        {{--   Показывает до md --}}
        <div class="hidden md:flex whitespace-nowrap font-semibold text-xl sm:text-base md:text-4xl "> У каждой <p
                class="text-pink-500 mx-2">
                мечты</p> есть свой бренд!
        </div>

        {{--   Показывает после md --}}
        <div class="md:hidden text-2xl">У каждой <span class="text-pink-500 ml-1">мечты </span>есть свой бренд!</div>
        {{--   Показывает до md --}}
        <div class="hidden md:flex mt-5 mr-0 border md:space-x-2">
            <div class="md:w-3/12 md:flex">
                <img src="https://www.mechta.kz/img/samsung.1834dd76.jpg" alt="">
            </div>
            <div class="md:w-3/12 md:space-y-3">
                <div class="md:flex-row">
                    <div>
                        <a href="#" class="">
                            <img class="md:w-full md:h-full object-cover"
                                 src="https://www.mechta.kz/upload/medialibrary/2bd/2bd9be0d04f2fa6f0d682bbab395ff84.png"
                                 alt="">
                        </a>
                    </div>
                    <div class=" mt-2">
                        <a href="#">
                            <img class="md:w-full md:h-full object-cover"
                                 src="https://www.mechta.kz/upload/medialibrary/43a/43a9a2f93b5232e0d121647e0868e8d4.png"
                                 alt="">
                        </a>
                    </div>
                </div>
            </div>

            <div class="md:w-3/12 ">
                <div class="md:flex-row">
                    <div>
                        <a href="#" class="">
                            <img class="md:w-full md:h-full object-cover"
                                 src="https://www.mechta.kz/upload/medialibrary/040/0404ed086e1d76cdc21cce02aa005ec8.png"
                                 alt="">
                        </a>
                    </div>
                    <div class="mt-2">
                        <a href="#">
                            <img class="md:w-full md:h-full object-cover"
                                 src="https://www.mechta.kz/upload/medialibrary/a9d/a9d87fc8ac2846641c5085df2ce4e9f5.png"
                                 alt="">
                        </a>
                    </div>
                </div>
            </div>

            <div class="md:w-3/12 md:flex justify-end">
                <img src="https://www.mechta.kz/upload/medialibrary/92d/92df19a05e2b4df17b813d0e139537e4.png"
                     alt="">
            </div>

        </div>
        {{--   Показывает после md --}}
        <div class="md:hidden flex overflow-x-auto mt-5 mb-2">
            <div class="flex space-x-5">
                <div class="h-92 " style="width: 300px">
                    <img src="https://www.mechta.kz/img/samsung.1834dd76.jpg" alt="SAMSUNG"
                         class="w-full h-full object-cover">
                </div>
                <div class="h-92" style="width: 300px">
                    <img src="https://www.mechta.kz/upload/medialibrary/961/9618e9f5e70eafa125774b96d322fcaf.png"
                         alt="PHILIPS" class="w-full h-full object-cover">
                </div>
                <div class="h-92" style="width: 300px">
                    <img src="https://www.mechta.kz/upload/medialibrary/43a/43a9a2f93b5232e0d121647e0868e8d4.png"
                         alt="MI" class="w-full h-full object-cover">
                </div>
                <div class="h-92" style="width: 300px">
                    <img src="https://www.mechta.kz/upload/medialibrary/040/0404ed086e1d76cdc21cce02aa005ec8.png"
                         alt="DYSON" class="w-full h-full object-cover">
                </div>
                <div class="h-92" style="width: 300px">
                    <img src="https://www.mechta.kz/upload/medialibrary/56d/56dcb96e781cbe374137159b4c91e8e6.png"
                         alt="LG" class="w-full h-full object-cover">
                </div>
                <div class="h-92" style="width: 300px">
                    <img src="https://www.mechta.kz/upload/medialibrary/92d/92df19a05e2b4df17b813d0e139537e4.png"
                         alt="APPLE" class="w-full h-full object-cover">
                </div>

            </div>
        </div>
    </section>

@endsection

{{--// Принцип открытости-закрытости--}}
{{--// Принцип разделения интерфейсов--}}
{{--// Принцип подстановки Барбары Лисков--}}
{{--// Принцип инверсии зависимостей--}}
{{--// Принцип единственной обязанности--}}
