<!doctype html>
<html lang="en" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
<header class="px-2 border-b rounded flex items-center justify-between h-14">
    <a class="uppercase font-bold text-purple-800 " href="">webDev</a>
    <nav class="hidden md:flex items-center">

        <ul class="text-gray-600 font-semibold inline-flex items-center">
            <li><a class="header-link" href="">Home</a>
            </li>
            <li><a class="header-link" href="">About</a>
            </li>
            <li><a class="header-link" href="">Free</a>
            </li>
        </ul>

        <ul class="flex items-center">

            <li>
                <button
                    class="py-1 ml-4 px-2  border-2 rounded-full border-purple-800 font-mono hover:text-white hover:bg-purple-500
                     hover:shadow-md hover:shadow-purple-800 transition-all duration-300">
                    Login
                </button>
            </li>

            <li>
                <button
                    class="py-1 ml-2 px-2 border-2 rounded-full border-purple-800 font-mono hover:text-white hover:bg-purple-500
                     hover:shadow-md hover:shadow-purple-800 transition-all duration-300">
                    Register
                </button>
            </li>

        </ul>
    </nav>
    <button class="inline-block md:hidden">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
             class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
        </svg>
    </button>
</header>

{{--  breadcrumbs  --}}
<div>
    <div class="px-2 flex items-center">
        <div class="py-4 overflow-y-auto whitespace-nowrap flex items-center">

            <a class="text-gray-600 hover:text-gray-900 transition-all duration-300" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"/>
                </svg>
            </a>

            <span class="mx-2 text-gray-300">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
                </svg>
            </span>
            <a class="text-gray-600 hover:text-gray-900 transition-all duration-300" href="#">News</a>


            <span class="mx-2 text-gray-300">
                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                      stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
                </svg>
            </span>
            <a class="text-gray-600 hover:text-gray-900 transition-all duration-300" href="#">Tech</a>
        </div>
    </div>
</div>

{{-- banners --}}
<section class="lg:space-x-2 lg:flex">
    <a href="#"
       class="w-full lg:w-2/3 bg-gradient-to-tr from-red-500 via-purple-500 transition-all duration-300  to-blue-500 hover:via-purple-500/90 h-96 relative inline-block rounded overflow-hidden">

        <div class="absolute top-0 w-full h-full z-10 bg-gradient-to-b from-black/10 to-black/70"></div>
        <img src="{{asset('storage/localImages/iPhone-14-Pro-renders.jpg')}}" alt="product"
             class="absolute top-0 w-full h-full z-0 object-cover">
        <div class="p-4 absolute bottom-0 z-20">
            <h2 class="text-4xl font-semibold text-gray-100 leading-tight">Lorem ipsum dolor sit amet, consectetur
                adipisicing elit.</h2>
        </div>
    </a>
    <a href="#"
       class="w-full lg:w-1/3 bg-gradient-to-l from-pink-500 to-purple-700 transition-all duration-300  hover:to-green-500 bg-blue-500 h-96 relative inline-block rounded overflow-hidden">
        <div class="absolute top-0 w-full h-full z-10 bg-gradient-to-b from-black/10 to-black/70"></div>
        <img src="{{asset('storage/localImages/Purple-iPhone-14-Pro.jpg')}}" alt="product"
             class="absolute top-0 w-full h-full z-0 object-cover">
        <div class="p-4 absolute bottom-0 z-20">
            <h2 class="text-4xl text-gray-100 font-semibold leading-tight">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, itaque!
            </h2>
        </div>
    </a>

</section>
{{-- main --}}
<main class="lg:flex">
    {{--    Новости --}}
    <div class="w-full lg:w-2/3">
        <a class="block w-full lg:flex mb-10" href="#">
            <img src="{{asset('storage/localImages/iphone.jpg')}}" alt="gaming pc"
                 class="w-full h-48 lg:w-48 lg:mr-4 opacity-80 object-cover mr-4">
            <div class="flex">

                <div>
                    <h3 class="mt-3 mb-2 text-gray-700 font-bold text-2xl">Lorem ipsum dolor sit amet,
                        consectetur.</h3>

                    <p class="text-gray-700">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Accusantium
                        debitis
                        ex, expedita labore
                        maxime minus quis repellendus totam veritatis voluptas.
                    </p>
                </div>
            </div>
        </a>

        <a class="block w-full lg:flex mb-10" href="#">
            <img src="{{asset('storage/localImages/gaming_laptop.jpg')}}" alt="gaming pc"
                 class="w-full h-48 lg:w-48 lg:mr-4 opacity-80 object-cover mr-4">
            <div class="flex">
                <div>
                    <h3 class="mt-3 mb-2 text-gray-700 font-bold text-2xl">Lorem ipsum dolor sit amet,
                        consectetur.</h3>

                    <p class="text-gray-700">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Accusantium
                        debitis
                        ex, expedita labore
                        maxime minus quis repellendus totam veritatis voluptas.
                    </p>
                </div>
            </div>
        </a>

        <a class="block w-full lg:flex mb-10" href="#">
            <img src="{{asset('storage/localImages/washing_machine.jpg')}}" alt="gaming pc"
                 class="w-full h-48 lg:w-48 lg:mr-4 opacity-80 object-cover mr-4">
            <div class="flex">
                <div>
                    <h3 class="mt-3 mb-2 text-gray-700 font-bold text-2xl">Lorem ipsum dolor sit amet,
                        consectetur.</h3>

                    <p class="text-gray-700">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Accusantium
                        debitis
                        ex, expedita labore
                        maxime minus quis repellendus totam veritatis voluptas.
                    </p>
                </div>
            </div>
        </a>
        {{--  Pagination  --}}
        <div class="mt-20 mb-10 ">
            <ul class="flex justify-center  h-100">
                <li>
                    <a class="pagination-item rounded-l-lg "
                       href="#">Previous</a></li>
                <li>
                    <a class="pagination-item"
                       href="#">1</a></li>
                <li>
                    <a class="pagination-item"
                       href="#">2</a>
                </li>

                <li>
                    <a class="pagination-item border-blue-300 text-blue-800 transition-all duration-300 hover:bg-blue-100" href="#">3</a>
                </li>

                <li>
                    <a class="pagination-item "
                       href="#">4</a></li>
                <li>
                    <a class="pagination-item"
                       href="#">5</a></li>
                <li>
                    <a class="pagination-item"
                       href="#">6</a></li>
                <li>
                    <a class="pagination-item rounded-r-lg "
                       href="#">Next</a></li>
            </ul>
        </div>
    </div>

    <div class="w-full  lg:w-1/3 flex flex-col  mt-4 ">
        <div class="mb-5">
            <h5 class="font-bold text-lg uppercase text-gray-700 mb-2">Popular News</h5>
            <ul>
                <li class="px-1 py-4 border-y border-white transition-all duration-300 hover:border-gray-200">
                    <a href="#" class="flex items-center text-gray-600">
                            <span
                                class="inline-block w-4 h-4 mr-3 bg-gradient-to-tr from-green-500 to-green-700"></span>
                        Vue
                        <span class="text-gray-500 ml-auto">23 Articles</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="mb-5">
            <ul>
                <li class="px-1 py-4 border-y border-white hover:border-gray-200">
                    <a href="#" class="flex items-center text-gray-600">
                        <span class="inline-block w-4 h-4 mr-3 bg-gradient-to-tr from-red-500 to-red-700"></span>
                        Angular
                        <span class="text-gray-500 ml-auto">9 Articles</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="mb-5  border-b-2">
            <ul>
                <li class="px-1 py-4 border-y border-white hover:border-gray-200">
                    <a href="#" class="flex items-center text-gray-600">
                        <span class="inline-block w-4 h-4 mr-3 bg-gradient-to-tr from-pink-500 to-pink-700"></span>
                        React
                        <span class="text-gray-500 ml-auto">17 Articles</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class=" px-1 py-4 border  shadow-inner">
            <div class="flex flex-col">
                <p class="text-gray-700 text-2xl  ">Подписка на новости</p>
                <input class="border border-red-100 rounded py-1 mt-2  " placeholder="email" type="text">
                <button
                    class="border rounded bg-blue-400 text-gray-200 font-semibold hover:bg-blue-700 hover:text-white">
                    Подписаться
                </button>
            </div>
        </div>
    </div>

</main>

{{-- footer --}}
<footer class="border-t mt-10 px-2">
    <div class="md:flex md:justify-center">
        <div class="w-full mb-5 md:w-2/5">
            Контакты
        </div>

        <div class="w-full mb-5 md:w-2/5">
            О нас
        </div>

        <div class="w-full md:w-1/5">
            Работа
        </div>
    </div>
</footer>


</body>
</html>
