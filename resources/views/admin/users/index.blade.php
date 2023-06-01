@extends('layouts.base')

@section('content')
    <div class="container">
        <div class="row justify-content-around">
            @foreach($users as $user)
                <!-- {{$roles = $user->roles()->pluck('name')}} -->
                <div class="col-md-4">
                    <div class="card">
                        <img src="https://mir-s3-cdn-cf.behance.net/project_modules/max_1200/8c636942495305.57ce932845ee3.jpg" class="card-img-top img-fluid" alt="">
                            <div class="card-body">
                            <h5 class="card-title text-center">{{$user->name}}</h5>
                            <h6 class="card-subtitle text-center">{{$user->email}}</h6>
                            @if($user->roles()->count() > 0)
                                <ul class="list-group">
                                    <li class="list-group-item "><h6 class="card-subtitle">Роли:</h6></li>
                                    @foreach($roles as $role)
                                        <li class="list-group-item">{{$role}}</li>
                                    @endforeach
                                </ul>
                            @else
                                <h6 class="border rounded p-2 text-center">Ролей нет</h6>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
