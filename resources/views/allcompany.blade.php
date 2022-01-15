@extends('welcome')
@section('title')Все Компании@endsection
@section('js')
    <script src="{{ asset('js/pagination.js') }}" defer></script>
@endsection
@section('main_content')
    <div id="last_company">
        @foreach ($companies as $company)
            <div class='mt-4'>
                <div class='company_list d-md-flex me-3'>
                    <h2>{{ $company->name }}</h2>
                    <p>{{ mb_strimwidth($company->info, 0, 100)}}</p>
                    <a href="{{ route('company_show', ['id' => $company->id]) }}" title=''>
                        <button class='btn btn-warning mt-3'>Посмотреть</button>
                    </a>
                </div>
            </div>
        @endforeach
    <div class="d-flex justify-content-center mt-3">
        {{ $companies->onEachSide(2)->links("pagination::bootstrap-4") }}
    </div>
@endsection
