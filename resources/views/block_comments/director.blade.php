{!! Form::open(['class'=>'form_comments']) !!}
{!! Form::label('director', 'Сообщение') !!}
{!! Form::textarea('director', null,['type'=>'text','class'=>'form-control','rows' => 2, 'cols' => 40]) !!}
<div class="errorBlock"></div>
<button type="submit" id="send_comment_director" class="btn btn-success mt-5">
    Добавить
</button>
{!! Form::close() !!}
<div id="comments_director">
@foreach ($comments as $comment)
    @if (!$comment->director == null)
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
                        <p>{{$comment->director}}</p>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endforeach
</div>
