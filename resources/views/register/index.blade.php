@extends('layouts.base')

@section('content')
    <div class="tw-container mt-28 flex justify-center">
        <form action="{{route('register.store')}}" method="POST" class="w-96 space-y-6">
            @csrf
            <div class="text-gray-600 text-4xl font-semibold mb-6">Registration</div>
            <div class="relative">
                <input type="email" name="email" placeholder="Email"
                       class="w-full border-b border-black pl-2 py-2 focus:outline-none text-lg focus:border-red-500"
                       required>
            </div>

            <div class="relative">
                <input type="text" name="name" placeholder="Name"
                       class="w-full border-b border-black pl-2 py-2 focus:outline-none text-lg focus:border-red-500"
                       required>
            </div>

            <div class="relative">
                <input type="password" name="password" placeholder="Password"
                       class="w-full border-b border-black pl-2 py-2 focus:outline-none text-lg focus:border-red-500"
                       required>
            </div>

            <div class="relative">
                <input type="password" name="password_confirmation" placeholder="Confirm Password"
                       class="w-full border-b border-black pl-2 py-2 focus:outline-none text-lg focus:border-red-500"
                       required>
            </div>


            <div class="flex justify-content-between text-xl px-2">
                <p class="text-gray-600">Already register?</p>
                <a href="{{route('login')}}" class="text-blue-400 hover:blue-500 transition-all duration-300">login</a>
            </div>
            <button
                class="px-10 py-2 text-white border rounded
                 bg-gradient-to-bl from-pink-500 to-pink-700 hover:bg-gradient hover:bg-gradient-to-r
                  hover:from-pink-300 hover:to-pink-600 transition-all duration-300"
                type="submit">Register
            </button>
        </form>
    </div>
@endsection
