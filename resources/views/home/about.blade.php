@extends('layouts.base')

@section('content')
    <div class="tw-container ">
        <div class="flex">
            <nav class="flex w-full">
                <ul class="flex items-center ">
                    <li>
                        <a href="{{route('home')}}" class="text-blue-400 font-semibold">
                            Главная
                        </a>
                    </li>

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="w-6 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
                    </svg>

                    <li><a href="#" class="text-gray-700 font-bold opacity-30">О компании</a></li>
                </ul>
            </nav>
        </div>


        <div class="flex mt-7 mb-10 w-50">
            <p class="text-gray-700 text-xl">
                О компании
            </p>
        </div>
    </div>

    {{-- ABOUT --}}
    <div class="bg-gradient-to-r from-blue-400 to-pink-500 ">
        <div class="tw-container md:h-82">
            <div class="w-full md:flex items-center">
                <div class="w-full md:w-1/2 md:order-1 md:pl-10">
                    <div class="flex text-white text-4xl font-bold">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                             class="w-10 h-10 inline-block border-2 rounded-full">
                            <path fill-rule="evenodd"
                                  d="M4.5 5.653c0-1.426 1.529-2.33 2.779-1.643l11.54 6.348c1.295.712 1.295 2.573 0 3.285L7.28 19.991c-1.25.687-2.779-.217-2.779-1.643V5.653z"
                                  clip-rule="evenodd"></path>
                        </svg>
                        <p class="ml-1">Mechta.kz</p>
                    </div>
                    <div class="mt-3">
                        <p class="text-white font-bold">специализированная торговая сеть магазинов <br> электроники и
                            бытовой техники,
                            является одной из ведущих
                            торговых сетей по продаже бытовой техники в Казахстане
                        </p>
                    </div>
                </div>

                <div class="w-full md:w-1/2 md:order-2">
                    <div class="mt-4">
                        <img src="{{asset('storage/localImages/mechta.png')}}" class="object-cover md:max-w-xl" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{--MAP --}}
    <div class="w-full md:flex tw-container h-90 mt-20 flex-wrap">
        <div class="w-full md:w-1/2 flex-1">
            <img src="{{asset('storage/localImages/about_map.png')}}" alt="mechta_map" class="h-full w-full">
        </div>
        <div class="w-full md:w-1/2 flex-1">
            <div class="flex h-1/2 items-center sm:mt-2 sm:ml-10">
                <div class="ml-2 md:w-1/2 flex flex-col items-center overflow-hidden">
                    <img src="{{asset('storage/localImages/about_map_1.png')}}" class="max-h-32 z-20">
                    <p class="border rounded-2xl bg-white px-10 py-4 shadow-md mb-5 text-center text-black font-bold"
                       style="margin-top: -20px; max-width: 100%;">
                        103 магазинов
                    </p>
                </div>
                <div class="ml-2 md:w-1/2 flex flex-col items-start overflow-hidden">
                    <img src="{{asset('storage/localImages/about_map_2.png')}}" class="max-h-32 z-20 ml-5">
                    <p class="border rounded-2xl bg-white px-16 py-4 shadow-md mb-5 text-center text-black font-bold"
                       style="margin-top: -20px; max-width: 100%;">
                        44 городов
                    </p>
                </div>
            </div>
            <div class="flex h-1/2 items-center sm:mt-2 sm:ml-10">
                <div class="ml-2 md:w-1/2 flex flex-col items-center overflow-hidden">
                    <img src="{{asset('storage/localImages/about_map_3.png')}}" class="max-h-32 z-0">
                    <p class="border rounded-2xl bg-white px-10 py-4 shadow-md mb-5 text-center z-10 text-black font-bold"
                       style="margin-top: -20px; max-width: 100%;">
                        > 4 500 сотрудников
                    </p>
                </div>
                <div class="ml-2 md:w-1/2 flex flex-col items-start overflow-hidden">
                    <img src="{{asset('storage/localImages/about_map_4.png')}}" class="max-h-32 z-20">
                    <p class="border rounded-2xl bg-white px-10 py-4 shadow-md mb-5 text-center text-black font-bold"
                       style="margin-top: -20px; max-width: 100%;">
                        > 20 000 товаров
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="tw-container border ">
        <div class="flex flex-col items-center mt-16">
            <div class="text-gray-500">Наш девиз</div>
            <div class="text-black font-bold text-4xl">Качество во всем</div>
        </div>

        <div class="mt-14">
            <div class="lg:flex justify-start space-x-3 space-y-2">
                <div class="lg:w-1/3 border rounded-2xl shadow flex-row justify-start px-5 pb-10 ml-3 mt-2">
                    <p class="mt-5 text-2xl font-bold text-black">Наша миссия</p>
                    <p class="mt-4 text-xl text-gray-500">
                        Вдохновленные «Мечтой», мы раскрываем свой потенциал и делаем жизнь людей ярче, а быт
                        комфортнее.
                    </p>
                </div>
                <div class="lg:w-1/3 border rounded-2xl shadow flex-row justify-start px-5 pb-10">
                    <p class="mt-5 text-2xl font-bold text-black">Ценности компании</p>
                    <p class="mt-4 text-xl text-gray-500">
                        Честность, командный дух, профессионализм, свобода и ответственность, забота о клиенте,
                        лидерство,
                        креативность
                    </p>
                </div>
                <div class="lg:w-1/3 border rounded-2xl shadow flex-row justify-start px-5 pb-10">
                    <p class="mt-5 text-2xl font-bold text-black">Социальная ответственность</p>
                    <p class="mt-4 text-xl text-gray-500">
                        Руководство компании «Мечта» осознаёт свою ответственность за будущее нового поколения, и
                        всемерно
                        способствует обучению и карьерному продвижению молодых сотрудников
                    </p>
                </div>
            </div>
        </div>

        <div class="flex mt-32 mx-3">
            <p class="font-semibold text-xl">Реквизиты компании</p>
        </div>

        <div class="mt-7 mx-3">
            <div class="w-full lg:w-10/12 border rounded-2xl bg-gray-50 px-10 py-10 shadow">
                <p class="font-semibold text-xl">
                    ТОО “Мечта Маркет”
                </p>
                <div class="w-full md:flex ">
                    <div class="w-full md:w-1/2">
                        <p class="text-sm mt-2 text-gray-500">
                            Юридический и фактический адрес:
                        </p>
                        <p>Республика Казахстан, 010000, город Астана, район Алматы, ул. Амман, дом 14</p>

                        <div class="w-full md:flex flex-row mt-5 justify-between md:space-x-16 whitespace-nowrap">
                            <div class="w-full md:w-1/3">
                                <ul class="mt-5">
                                    <li class="text-gray-500">БИН</li>
                                    <li>121040002914</li>
                                </ul>
                            </div>
                            <div class="w-full md:w-1/3">
                                <ul class="mt-5">
                                    <li class="text-gray-500">Код ОКПО</li>
                                    <li>51761947</li>
                                </ul>
                            </div>

                            <div class="w-full md:w-1/3">
                                <ul class="mt-5">
                                    <li class="text-gray-500">Код ОКЭД</li>
                                    <li>47540</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="w-full md:w-1/2 md:ml-20 ">
                        <p class="text-sm mt-2 text-gray-500">
                            Банковские реквизиты:
                        </p>
                        <p>AО "Народный Банк Казахстана"</p>

                        <div class="w-full md:flex mt-10 whitespace-nowrap md:space-x-10">
                            <div class="w-full md:w-1/2  mt-5">
                                <ul>
                                    <li class="text-gray-500">Расчётный счёт</li>
                                    <li>KZ156010111000171755</li>
                                </ul>
                            </div>
                            <div class="w-full md:w-1/2 mt-5">
                                <ul>
                                    <li class="text-gray-500">БИК</li>
                                    <li>HSBKKZKX</li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection



