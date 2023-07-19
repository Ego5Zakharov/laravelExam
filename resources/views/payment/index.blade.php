@extends('layouts.base')

@section('content')
    <x-container class="mt-3">
        <x-breadcrumb back="user.account.index" current="Пополнение счета"></x-breadcrumb>
        <div class="flex justify-center items-center h-auto">
            <div class="w-96 border p-4 ">
                <h1 class="text-center mb-4 text-2xl font-bold">Payment Form</h1>
                <form action="{{ route('payment.process') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="card_number" class="block mb-1">Card Number</label>
                        <div class="relative">
                            <input type="number" id="card_number" name="card_number" required
                                   class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-pink-500"
                                   maxlength="16"/>
                            <span class="absolute top-1/2 right-3 transform -translate-y-1/2 text-gray-400">
                                <i class="las la-credit-card"></i>
                            </span>
                        </div>
                    </div>

                    <div class="flex mb-3">
                        <div class="w-1/2 mr-2">
                            <label for="expiration_date" class="block mb-1">Expiration Date</label>
                            <input type="text" id="expiration_date" name="expiration_date" required
                                   class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-pink-500"/>
                        </div>

                        <div class="w-1/2 ml-2">
                            <label for="cvc" class="block mb-1">CVC</label>
                            <input type="text" id="cvc" name="cvc" required
                                   class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-pink-500"/>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="amount" class="block mb-1">Amount</label>
                        <div class="relative">
                            <span class="absolute top-1/2 left-3 transform -translate-y-1/2 text-gray-400">$</span>
                            <input type="number" id="amount" name="amount" step="0.01" min="0" required
                                   class="w-full border border-gray-300 rounded-md py-2 px-10 focus:outline-none focus:border-pink-500"/>
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit"
                                class="px-4 py-2 bg-pink-500 text-white rounded-md hover:bg-pink-600 focus:outline-none">
                            Submit Payment
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </x-container>
@endsection
