<div class="mt-4">
    <h4>Комментарии</h4>
    {!! Form::open(['class'=>'form_comments']) !!}
    {!! Form::label('main', 'Сообщение') !!}
    {!! Form::textarea('main', null,['type'=>'text','class'=>'form-control','rows' => 2, 'cols' => 40]) !!}
    <div class="errorBlock"></div>
    <button type="submit" id="main_send" class="btn btn-success mt-5">
        Добавить
    </button>
    {!! Form::close() !!}
    <div id="comments_main">
        @foreach ($comments as $comment)
            @if (!$comment->main == null)
                <div class="comments media">
                    <div class="content_comments">
                        <img class="img-media"
                             src="{{$user->avatar}}"
                             alt="Generic placeholder image">
                        <div class="body_comments">
                            <div class="comment_user_name">
                                <p>{{$user->name}}</p>
                                <span>{{$comment->updated_at
                                        ->diffForHumans()}}</span>
                            </div>
                            <div class="comment_block">
                                <p>{{$comment->main}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>
