@extends('layouts.base')

@section('content')
    <style>
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .custom-text-primary {
            color: #e61771;
        }
    </style>
    <x-container class="tw-container mt-10">
        {{-- Баннеры --}}
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

        <section class="mt-20">
            {{--   Показывает до md --}}
            <div class="hidden md:flex whitespace-nowrap font-semibold text-xl sm:text-base md:text-4xl "> У каждой <p
                    class="text-pink-500 mx-2">
                    мечты</p> есть свой бренд!
            </div>

            {{--   Показывает после md --}}
            <div class="md:hidden text-2xl">У каждой <span class="text-pink-500 ml-1">мечты </span>есть свой бренд!
            </div>
            {{--   Показывает до md --}}
            <div class="hidden md:flex mt-5 mr-0 md:space-x-2">
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
                    <div class="h-92" style="width: 300px">
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

        {{-- Рассылка --}}
        <div class="mt-5">
            <div class="w-full lg:flex">
                <div class="w-full lg:w-1/2 ">
                    <svg viewBox="0 0 114 17" xmlns="http://www.w3.org/2000/svg" class="inline-block vertical-middle "
                         style="width: 209px; height: 32px;">
                        <path class="text-pink-500"
                              d="M8.712 0a8.867 8.867 0 0 0-4.84 1.432A8.549 8.549 0 0 0 .665 5.245a8.308 8.308 0 0 0-.497 4.91 8.438 8.438 0 0 0 2.38 4.352 8.781 8.781 0 0 0 4.459 2.328c1.689.33 3.44.163 5.032-.479a8.67 8.67 0 0 0 3.912-3.126 8.355 8.355 0 0 0 .821-7.98 8.462 8.462 0 0 0-1.887-2.765A8.703 8.703 0 0 0 12.053.641 8.873 8.873 0 0 0 8.712 0Zm0 15.246a7.04 7.04 0 0 1-3.844-1.138 6.788 6.788 0 0 1-2.548-3.03 6.597 6.597 0 0 1-.392-3.902 6.7 6.7 0 0 1 1.897-3.455A6.973 6.973 0 0 1 7.37 1.876a7.078 7.078 0 0 1 3.997.39 6.882 6.882 0 0 1 3.102 2.49 6.632 6.632 0 0 1 1.16 3.753 6.685 6.685 0 0 1-2.035 4.76 7.023 7.023 0 0 1-4.882 1.977Z"></path>
                        <path class="text-pink-500"
                              d="M6.464 4.968 12.697 7.9a.676.676 0 0 1 .286.245.652.652 0 0 1 0 .713.676.676 0 0 1-.286.245l-6.233 2.93a.693.693 0 0 1-.65-.044.65.65 0 0 1-.312-.557V5.57a.65.65 0 0 1 .313-.557.69.69 0 0 1 .649-.044Zm21.934 5.445a130.49 130.49 0 0 0-4.075-8.75h-3.741v13.675h2.64V5.156c.79 1.628 2.087 4.604 3.888 8.927h2.14c1.559-3.59 2.89-6.573 4.033-8.927v10.182h2.682V1.662h-3.553c-1.56 3.022-2.898 5.939-4.014 8.751Zm13.83-5.237c-3.26 0-4.927 1.294-4.927 5.12 0 1.942.437 3.213 1.33 4.017.893.804 2.162 1.197 3.805 1.197a15.277 15.277 0 0 0 3.995-.55l-.416-1.923a13.835 13.835 0 0 1-3.267.412c-.977 0-1.68-.176-2.1-.51-.416-.353-.623-.937-.644-1.957h6.901c.083-2.41-.207-3.806-1.04-4.668-.81-.863-1.87-1.138-3.637-1.138Zm-2.206 3.942c.142-1.542.706-2.024 2.307-2.024.769 0 1.285.136 1.56.431.269.275.442.832.477 1.588l-4.344.005Zm13.501-1.823a7.19 7.19 0 0 1 2.453.432l.582-2.08c-.89-.314-1.977-.471-3.223-.471-1.725 0-3.015.392-3.908 1.177-.89.766-1.33 2-1.33 3.943 0 1.941.437 3.213 1.33 4.017.893.804 2.183 1.197 3.908 1.197 1.247 0 2.328-.177 3.223-.51l-.582-2.08a6.803 6.803 0 0 1-2.453.47c-.998 0-1.705-.216-2.141-.627-.415-.432-.624-1.173-.624-2.428.104-2.766.79-3.04 2.765-3.04ZM65.45 5.529c-.52-.236-1.205-.353-2.1-.353a6.654 6.654 0 0 0-2.91.686v-4.69h-2.577v14.166h2.578V8.256c0-.55.89-.883 2.037-.883 1.497 0 2.12.51 2.12 2.531v5.434h2.579v-5.63c-.001-2.433-.666-3.73-1.727-4.18Zm8.565 7.881c-1.143 0-1.6-.568-1.6-1.745V7.47h3.512V5.349h-3.514V2.663l-2.577 1.001v1.687h-1.767v2.121h1.767v4.41c0 1.413.27 2.374.831 2.884.561.491 1.456.746 2.703.746a9.193 9.193 0 0 0 2.91-.452l-.458-1.922a6.42 6.42 0 0 1-1.807.273Zm12.405 1.418c-1.549.463-3.16.693-4.781.682-1.68 0-2.866-.236-3.513-.687-.644-.47-.957-1.253-.957-2.546 0-1.314.333-2.178 1.02-2.61.685-.451 1.745-.667 3.139-.667a14.2 14.2 0 0 1 2.618.274c0-.883-.166-1.35-.494-1.627-.332-.294-1.04-.432-2.141-.432a9.823 9.823 0 0 0-3.202.49l-.478-2a17.403 17.403 0 0 1 4.22-.53c1.622 0 2.786.294 3.493.868.727.566 1.077 1.565 1.077 3.02v5.765Zm-2.47-3.905a10.804 10.804 0 0 0-2.1-.176c-1.559 0-1.976.193-1.976 1.432 0 .668.125.996.375 1.193.249.177.768.275 1.58.275a8.614 8.614 0 0 0 2.121-.23v-2.494Zm8.192 2.983c0 1.295-.382 1.53-1.608 1.53-1.166 0-1.549-.235-1.549-1.53 0-1.196.383-1.374 1.549-1.374 1.227.002 1.608.178 1.608 1.374Zm8.93 1.432c-2.313-3.278-3.72-5.042-4.284-5.278v5.278h-2.494V1.172h2.494v8.888c.563-.451 1.95-2.06 3.961-4.709h2.956c-1.97 2.59-3.379 4.121-3.921 4.532.523.314 2.051 2.138 4.223 5.455h-2.935ZM114 5.351v.491c-1.448 2.276-3.921 5.71-5.269 7.378h5.128v2.12h-9.029v-.492c1.95-2.41 4.348-5.768 5.349-7.377h-5.007V5.349l8.828.002Z"></path>
                    </svg>

                    <div class="space-y-3 mt-3">
                        <p class="font-bold text-2xl">Торговая сеть электроники</p>

                        <p class="text-gray-600">
                            “Мечта” - специализированная торговая сеть магазинов электроники и бытовой техники.
                            Компания является одной из ведущих торговых сетей по продаже бытовой техники в Казахстане,
                            в которой работает более 4500 человек.
                        </p>

                        <div class="text-gray-600">
                            <span class="mr-1 text-black font-bold">Наша миссия:</span>
                            Вдохновленные “Мечтой”, мы раскрываем свой потенциал и делаем жизнь людей ярче, а быт
                            комфортнее.
                        </div>

                        <div class="text-gray-600">
                            <span class="mr-1 text-black font-bold">Наш девиз:</span>
                            Качество во всем!
                        </div>

                        <p class="text-gray-500"><a href="{{route('about')}}">Читать полностью -></a></p>

                    </div>
                </div>

                <div class="w-full lg:w-1/2 mt-5">
                    <div class="space-y-3 text-center">
                        <div class="text-5xl">
                            Узнавайте <span class="custom-text-primary">о специальных предложениях</span> первыми!
                        </div>

                        <div><p class="text-gray-500 text-xl">Оставьте свой e-mail, чтобы сделать будущие покупки
                                выгодней!
                            </p>
                        </div>

                        <div class="w-full flex justify-end lg:ml-20 ">
                            <div class="w-10/12 lg:w-2/3 flex ">
                                <input type="email"
                                       class="w-full border rounded-l rounded-b pl-2 py-3 hover:border-black focus:border-red-500 focus:outline-none"
                                       placeholder="Ваш Email">
                            </div>

                            <div class="w-2/12 lg:w-1/3 flex ">
                                <button class="border py-3 px-3 text-white bg-gradient-to-b from-pink-500 to-pink-700
                hover:bg-gradient-to-br hover:from-pink-400 hover:to-pink-600" type="submit">Отправить</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-container>

    {{--  Бренды  --}}

@endsection

{{--// Принцип открытости-закрытости--}}
{{--// Принцип разделения интерфейсов--}}
{{--// Принцип подстановки Барбары Лисков--}}
{{--// Принцип инверсии зависимостей--}}
{{--// Принцип единственной обязанности--}}
