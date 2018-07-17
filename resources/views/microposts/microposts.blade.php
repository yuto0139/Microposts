<ul class="media-list">
@foreach ($microposts as $micropost)
    <?php $user = $micropost->user; ?>
    <li class="media">
        <div class="media-left">
            <img class="media-object img-rounded" src="{{ Gravatar::src($user->email, 50) }}" alt="">
        </div>
        <div class="media-body">
            <div>
                {!! link_to_route('users.show', $user->name, ['id' => $user->id]) !!} <span class="text-muted">posted at {{ $micropost->created_at }}</span>
            </div>
            <div>
                <p>{!! nl2br(e($micropost->content)) !!}</p>
            </div>
            <div>
                @if (Auth::user()->is_favoring($micropost->id))
                    {!! Form::open(['route' => ['user.cancel_favorite', $micropost->id], 'method' => 'delete', 'style' => 'display: inline;']) !!}
                        {!! Form::submit('Unfavorite', ['class' => "btn btn-warning btn-xs"]) !!}
                    {!! Form::close() !!}
                @else
                    {!! Form::open(['route' => ['user.give_favorite', $micropost->id], 'style' => 'display: inline;']) !!}
                        {!! Form::submit('Favorite', ['class' => "btn btn-success btn-xs"]) !!}
                    {!! Form::close() !!}
                @endif
                
                @if (Auth::id() == $micropost->user_id)
                    {!! Form::open(['route' => ['microposts.destroy', $micropost->id], 'method' => 'delete', 'style' => 'display: inline;']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                    {!! Form::close() !!}
                @endif
            </div>
        </div>
    </li>
@endforeach
</ul>
{!! $microposts->render() !!}