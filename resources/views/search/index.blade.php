@extends('layouts.base')

@section('content')
    <x-container>
        <div class="row mb-2 border-opacity-50 border-secondary">
            <div class="col-md-12 col-lg-6">
                <div id="search-form">
                    <x-form class="">
                        <div class="row">
                            <div class="col-md-12 col-lg-9 mt-2">
                                <input name="search" id="search" value="{{$search ?? ''}}" placeholder="search"
                                       class="border border-success">
                            </div>

                            <div class="col-md-12 col-lg-3 mt-2">
                                <x-button class="search-button border-success text-success" type="button">
                                    Поиск
                                </x-button>
                            </div>
                        </div>
                        <div id="search-results">
                            @include('search.results')
                        </div>
                    </x-form>
                </div>
            </div>
        </div>
    </x-container>
@endsection

@section('scripts')
    <script src="{{ asset('js/searchProduct.js') }}"></script>
@endsection

