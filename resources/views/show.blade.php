@extends('welcome')
@section('title'){{ $company->name }}@endsection
@section('js')
    <script src="{{ asset('js/show.js') }}" defer></script>
@endsection
@section('main_content')
    <div class="info_company_list">
        <h1>{{ $company->name }}</h1>
        <div class='d-block justify-content-between'>
            <p><b>ИНН: </b>{{ $company->inn }}</p>
            @include('block_btn.btn_add_comments')
        </div>
        <div id="block_inn" class="block_comments">
            @include('block_comments.inn')
        </div>
        <div class='d-block justify-content-between'>
            <p><b>Директор: </b>{{ $company->director }}</p>
            @include('block_btn.btn_add_comments')
        </div>
        <div id="block_director" class="block_comments">
            @include('block_comments.director')
        </div>
        <div class='d-block  justify-content-between'>
            <p><b>Общая информация: </b>{{ $company->info }}</p>
            @include('block_btn.btn_add_comments')
        </div>
        <div id="block_info" class="block_comments">
            @include('block_comments.info')
        </div>
        <div class='d-block  justify-content-between'>
            <p><b>Адресс: </b>{{ $company->address }}</p>
            @include('block_btn.btn_add_comments')
        </div>
        <div id="block_address" class="block_comments">
            @include('block_comments.address')
        </div>
        <div class='d-block  justify-content-between'>
            <p><b>Телефон: </b>{{ $company->phone }}</p>
            @include('block_btn.btn_add_comments')
        </div>
        <div id="block_phone" class="block_comments">
            @include('block_comments.phone')
        </div>
    @if(Auth::check())
        @include('block_comments.main')
    @endif
@endsection
