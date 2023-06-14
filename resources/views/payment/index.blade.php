@extends('layouts.base')


{{--4242424242424242--}}
@section('content')
    <x-container>
        <div class="row justify-content-center align-items-center" style="height: 500px;">
            <div class="col-6 border p-4">
                <h1 class="text-center mb-4">Payment Form</h1>
                <x-form action="{{ route('payment.process') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <x-label for="card_number">Card Number</x-label>
                        <div class="input-group">
                            <input type="number" id="card_number" name="card_number" required class="form-control"
                                   maxlength="16"/>
                            <span class="input-group-text"><i class="las la-credit-card"></i></span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <x-label for="expiration_date">Expiration Date</x-label>
                            <x-input type="text" id="expiration_date" name="expiration_date" required
                                     class="form-control"/>
                        </div>

                        <div class="col-md-6 mb-3">
                            <x-label for="cvc">CVC</x-label>
                            <x-input type="text" id="cvc" name="cvc" required class="form-control"/>
                        </div>
                    </div>

                    <div class="mb-3">
                        <x-label for="amount">Amount</x-label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <x-input type="number" id="amount" name="amount" step="0.01" min="0" required
                                     class="form-control"/>
                        </div>
                    </div>

                    <div class="text-center">
                        <x-button type="submit" class="border">Submit Payment</x-button>
                    </div>
                </x-form>
            </div>
        </div>
    </x-container>
@endsection
