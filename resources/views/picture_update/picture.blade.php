    {!! Form::open(['url' => '/upload', 'method' => 'post', 'files' => true]) !!}

    {{--成功時のメッセージ--}}
    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
    <!--
    {{-- エラーメッセージ --}}
    @if ($errors->any())
        <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        </div>
    @endif
    -->
    
    <div class="form-group">
        @if ($user->avatar_filename)
            <p>
                <img src="{{ asset('storage/avatar/' . $user->avatar_filename) }}" alt="avatar" />
            </p>
        @endif
        {!! Form::label('file', 'ユーザー画像アップロード', ['class' => 'control-label']) !!}
        {!! Form::file('file', ['class' => 'center-block']) !!}
    </div>
    
    <div class="form-group">
        {!! Form::submit('アップロード', ['class' => 'btn btn-success']) !!}
    </div>
    {!! Form::close() !!}