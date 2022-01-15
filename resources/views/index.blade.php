@extends('welcome')
@section('title')Главная@endsection
@section('js')
    <script src="{{ asset('js/companyAdd.js') }}" defer></script>
@endsection
@section('main_content')
    <div class="img_block">
        <img src="{{ asset('img/company.svg') }}" alt="">
    </div>
    <div id="last_company">
        @foreach ($company as $company)
            <div class='mt-4'>
                <div class='company_list d-md-flex me-3'>
                    <h2>{{ $company->name }}</h2>
                    <p>{{ mb_strimwidth($company->info, 0, 100)}}...</p>
                    <a href="{{ route('company_show', ['id' => $company->id]) }}" title=''>
                        <button class='btn btn-warning mt-3'>Посмотреть</button>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    @if(Auth::check())
        <div class="col-md-8 mb-3">
            <button type="button" id="add_company__btn" class="btn btn-success mt-5 mb-3">
                Добавить компанию
            </button>
            <div id="form_company">
                <form class="form_company" action="" method="">
                    {{csrf_field()}}
                    <label for="name">Название</label>
                    <input type="text" value="" name="name" id="name" class="form-control">
                    <div class="errorBlock"></div>

                    <label for="inn">ИНН</label>
                    <input type="text" value="" name="inn" id="inn" class="form-control">
                    <div class="errorBlock"></div>

                    <label for="info">Общая информация</label>
                    <input type="text" value="" name="info" id="info" class="form-control">
                    <div class="errorBlock"></div>

                    <label for="director">Генеральный директор</label>
                    <input type="text" value="" name="director" id="director" class="form-control">
                    <div class="errorBlock"></div>

                    <label for="address">Адрес</label>
                    <input type="text" value="" name="address" id="address" class="form-control">
                    <div class="errorBlock"></div>

                    <label for="phone">Телефон</label>
                    <input type="text" value="" name="phone" id="phone" class="form-control">
                    <div class="errorBlock"></div>

                    <button type="submit" id="add_btn" class="btn btn-success mt-5">
                        Добавить
                    </button>
                </form>
                <div class="alert alert-success form_block"></div>
            </div>
        </div>
    @endif

@endsection
