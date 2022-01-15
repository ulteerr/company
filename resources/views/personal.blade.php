@extends('welcome')
@section('title'){{ Auth::user()->name}}@endsection
@section('js')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js" defer></script>
    <script src="{{ asset('js/dragAndDrop.js') }}" defer></script>

@endsection
@section('main_content')
    <div class="container">
        <div class="row justify-content-center edit_block_user">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Редактирование профиля</div>

                    <div class="card-body">
                        <form method="POST" id="form_edit" action="" enctype="multipart/form-data">

                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">Имя:</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                           class="form-control @error('name') is-invalid @enderror"
                                           name="name" value="{{Request::old('name') ?: Auth::user()->name }}" required
                                           autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">Почта:</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email')
                                        is-invalid @enderror" name="email"
                                           value="{{Request::old('email') ?: Auth::user()->email }}"
                                           required autocomplete="email" readonly>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="avatar_old row mb-3">
                                @if (empty(Auth::user()->avatar == "/images/no_image.png"))
                                    <label class="col-md-4 col-form-label text-md-end">Ваша фотография:</label>
                                    <div class="img_avatar">
                                        <img class="img" src="{{Auth::user()->avatar}}" alt="avatar">
                                        <a href="{{ route('avatar_delete', ['id' => Auth::user()->id])}}">
                                            <img class="btn_delete_x" src="/img/x.svg" alt="x">
                                        </a>
                                    </div>
                            </div>
                            @else
                                <label for="upload">
                                    <div class="d-flex dnd_block mb-2">
                                        @csrf
                                        <input type="file" id="upload" class="form-control-file">
                                        <div class="drag-and-drop" id="file">
                                            <h3 class="drag-and-drop-title text-center">
                                                Перетащите одну фотографию для загрузки или нажмите
                                            </h3>
                                            <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>
                                        </div>
                                    </div>
                                </label>
                                <div class="avatar row mb-3">
                                    <label class="col-md-4 col-form-label text-md-end">Ваша новая фотография:</label>
                                    <div class="images-list"></div>
                                </div>
                            @endif
                            <div class="row mb-0 d-flex justify-content-center">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Обновить
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
