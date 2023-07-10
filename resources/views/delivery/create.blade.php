@extends('layouts.base')

@section('content')
    <div class="tw-container mt-24 flex justify-center mb-24 border">
        <form action="{{route('delivery.store')}}" class="flex-col justify-center h-auto min-w-[80px] px-10"
              method="POST">
            <p class="text-3xl font-semibold w-full text-center">Delivery options</p>
            <div class="w-full md:flex mt-3">
                <div class="w-full md:w-1/2 md:mr-2 mb-3">
                    <label for="first_name" class="text-xl">First Name:</label>
                    <input id="first_name" type="text" name="first_name" placeholder="First Name"
                           class="w-full text-center py-1 text-xl focus:outline-none border-b-2 border-gray-500 focus:border-red-500 transition-colors duration-500">
                </div>

                <div class="w-full md:w-1/2 md:ml-2 mb-3">
                    <label for="last_name" class="text-xl">Last Name:</label>
                    <input id="last_name" type="text" name="last_name" placeholder="Last Name"
                           class="w-full text-center py-1 text-xl focus:outline-none border-b-2 border-gray-500 focus:border-red-500 transition-colors duration-500">
                </div>
            </div>

            <div class="w-full md:flex mt-3">
                <div class="w-full md:w-1/2 md:mr-2 mb-3">
                    <label for="phone" class="text-xl">Phone:</label>
                    <input id="phone" type="text" name="phone" placeholder="Phone"
                           class="w-full text-center py-1 text-xl focus:outline-none border-b-2 border-gray-500 focus:border-red-500 transition-colors duration-500">
                </div>

                <div class="w-full md:w-1/2 md:ml-2 mb-3">
                    <label for="address" class="text-xl">Address:</label>
                    <input id="address" type="text" name="address" placeholder="Address"
                           class="w-full text-center py-1 text-xl focus:outline-none border-b-2 border-gray-500 focus:border-red-500 transition-colors duration-500">
                </div>
            </div>

            <div class="w-full md:flex mt-3">
                <div class="w-full md:w-1/2 md:mr-2 mb-3">
                    <label for="city" class="text-xl">City:</label>
                    <input id="city" type="text" name="city" placeholder="City"
                           class="w-full text-center py-1 text-xl focus:outline-none border-b-2 border-gray-500 focus:border-red-500 transition-colors duration-500">
                </div>

                <div class="w-full md:w-1/2 md:ml-2 mb-3">
                    <label for="country" class="text-xl">Country:</label>
                    <input id="country" type="text" name="country" placeholder="Country"
                           class="w-full text-center py-1 text-xl focus:outline-none border-b-2 border-gray-500 focus:border-red-500 transition-colors duration-500">
                </div>
            </div>
            <div class="w-full md:ml-2 mb-3">
                <label for="notes" class="text-xl">Notes:</label>
                <textarea id="notes" name="notes" placeholder="Notes"
                          class="w-full text-center py-1 text-xl focus:outline-none border-b-2 border-gray-500 focus:border-red-500 transition-colors duration-500"></textarea>
            </div>

            <button
                class="border py-3 px-4 text-white bg-gradient-to-b from-pink-500 to-pink-700 hover:bg-gradient-to-br hover:from-pink-400 hover:to-pink-600"
                type="submit">Submit
            </button>
        </form>
    </div>
@endsection
