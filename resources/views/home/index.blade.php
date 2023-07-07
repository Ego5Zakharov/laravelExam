@extends('layouts.base')

@section('content')
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
            <p class="text-4xl font-bold ">Смартфоны и гаджеты</p>

            <div class="flex mt-5 px-2 space-x-3 overflow-x-auto ">
                <div class="w-1/5 border rounded-2 hover:shadow-xl hover:border-0 flex-shrink-0" style="width: 300px;">
                    <img class="object-cover h-82 w-82 py-4"
                         src="https://www.mechta.kz/images/product/55054/17000000094_1-286.webp" alt="Product">
                    <p class="px-6 text-gray-500 font-semibold overflow-ellipsis">Телефон сотовый APPLE Iphone 13 128GB
                        Blue</p>
                    <p class="px-6 mt-3 text-xl font-black whitespace-nowrap">499 990 T</p>
                </div>

                <div class="w-1/5 border rounded-2 hover:shadow-xl hover:border-0 flex-shrink-0" style="width: 300px;">
                    <img class="object-cover h-82 w-82 py-4"
                         src="https://www.mechta.kz/export/1cbitrix/import_files/37/374d2b4b-f418-11eb-a23f-005056b6dbd7-286.webp"
                         alt="Product">
                    <p class="px-6 text-gray-500 font-semibold overflow-ellipsis">Наушники Marshall Major IV
                        BT(black)</p>
                    <p class="px-6 mt-3 text-xl font-black whitespace-nowrap">89 990 T</p>
                </div>

                <div class="w-1/5 border rounded-2 hover:shadow-xl hover:border-0 flex-shrink-0" style="width: 300px;">

                    <img class="object-cover h-82 w-82 py-4"
                         src="https://www.mechta.kz/export/1cbitrix/import_files/fc/fc99ae54-0491-11ec-a23f-005056b6dbd7-286.webp"
                         alt="Product">
                    <p class="px-6 text-gray-500 font-semibold overflow-ellipsis">Смарт часы SAMSUNG Galaxy Watch4
                        Classic 46mm Black
                    </p>
                    <p class="px-6 mt-3 text-xl font-black whitespace-nowrap">111 890 T</p>
                </div>

                <div class="w-1/5 border rounded-2 hover:shadow-xl hover:border-0 flex-shrink-0" style="width: 300px;">

                    <img class="object-cover h-82 w-82 py-4"
                         src="https://www.mechta.kz/images/product/38070/30000007220_1-286.webp" alt="Product">
                    <p class="px-6 text-gray-500 font-semibold overflow-ellipsis">Телефон сотовый NOKIA 6310(Черный)</p>
                    <p class="px-6 mt-3 text-xl font-black whitespace-nowrap">29 490 Т</p>
                </div>

                <div class="w-1/5 border rounded-2 hover:shadow-xl hover:border-0 flex-shrink-0" style="width: 300px;">

                    <img class="object-cover h-82 w-82 py-4"
                         src="https://www.mechta.kz/export/1cbitrix/import_files/0f/0f7611bd-3b12-11ed-a24a-005056b6dbd7-286.webp"
                         alt="Product">
                    <p class="px-6 text-gray-500 font-semibold overflow-ellipsis">Телефон сотовый APPLE Iphone 14 Pro
                        128GB (Deep purple)</p>
                    <p class="px-6 mt-3 text-xl font-black whitespace-nowrap">499 990 T</p>
                </div>
            </div>
        </section>


    </div>
@endsection
