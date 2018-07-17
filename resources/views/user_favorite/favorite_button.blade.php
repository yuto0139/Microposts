   
    @if (Auth::user()->is_favoring($micropost->id))
        {!! Form::open(['route' => ['user.cancel_favorite', $micropost->id], 'method' => 'delete']) !!}
            {!! Form::submit('Unfavorite', ['class' => "btn btn-warning btn-block form-inline"]) !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['user.give_favorite', $micropost->id]]) !!}
            {!! Form::submit('Favorite', ['class' => "btn btn-success btn-block form-inline"]) !!}
        {!! Form::close() !!}
    @endif