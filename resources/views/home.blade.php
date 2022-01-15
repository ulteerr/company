@extends('welcome')
@section('title')Личный Кабинет@endsection
@section('main_content')
<div class="container">
    <div class="row justify-content-center">
        <div class="сol-12 col-md-8 mt-2 personal">
            <div class="card">
                <div class="card-header">Личный кабинет</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   <h6>Привет {{ Auth::user()->name }}</h6>
                        <a class="btn btn-warning" href="{{ route('update_user', ['id' => $user->id]) }}" title=''>Редактировать профиль</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
