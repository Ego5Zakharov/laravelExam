<div class="bg-light">
<div class="container">
    <div>
        <div class="bg-opacity-25 bg-dark">
            <div class="row justify-content-between align-items-center text-center p-3">

                <div class="col-4 display-6">
                    <a href="{{ route('home') }}" class="navbar-brand">
                        {{ config('app.name') }}
                    </a>
                </div>

                <div class="col-4">
                    <x-form class="me-1" action="{{ route('search.index',['orderBy'=>$orderBy ??'']) }}" class="d-flex pt-2" method="GET">
                        <div class="input-group">
                            <x-input id="sort-order" value="{{$search ?? ''}}" class="form-control rounded-5" name="search" aria-label="Search" aria-describedby="search-icon">
                            </x-input>
                            <button class="btn " type="submit" id="search-icon">
                                <img width="30" height="30" src="https://img.icons8.com/ios/50/search--v1.png" alt="search--v1"/>
                            </button>
                        </div>
                    </x-form>
                </div>

                <div class="col-4 d-flex justify-content-evenly-end ps-5">
                    <a href="{{ route('cart.index') }}" class="text-decoration-none me-2 ps-3">
                        <img width="40" height="40" src="https://img.icons8.com/ios/50/shopping-cart--v1.png"
                             alt="shopping-cart--v1"/>
                    </a>
                    <a href="{{ route('home') }}" class="text-decoration-none ps-4">
                        <img width="40" height="40" src="https://img.icons8.com/ios/50/like--v1.png" alt="like--v1"/>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
