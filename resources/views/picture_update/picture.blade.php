    {!! Form::open(['url' => '/upload', 'method' => 'post', 'class' => 'form', 'files' => true]) !!}

    {{--成功時のメッセージ--}}
    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
    <div class="form-group">
        @if ($user->avatar_filename)
            <p>
            　<img src="{{ $url }}" />
            </p>
        @endif
        {!! Form::label('myfile', 'ユーザー画像アップロード', ['class' => 'control-label']) !!}
        {!! Form::file('myfile', ['class' => 'center-block']) !!}
    </div>
    
    <div class="form-group">
        {!! Form::submit('アップロード', ['class' => 'btn btn-success']) !!}
    </div>
    {!! Form::close() !!}
    