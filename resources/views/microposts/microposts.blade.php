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
                
                <!-- モーダルへのボタン -->
                @if (Auth::id() == $micropost->user_id)
                <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal{{$micropost->id}}">Delete</button>
                @endif
                
                <!-- モーダル本体 -->
                <div class="modal fade" id="myModal{{$micropost->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h3 class="modal-title"></h3>
                     <h4 class="modal-title alert alert-danger">『{{ $micropost->content }}』</h4>
                    </div>
                    <div class="modal-body">
                      <h4>Are you really sure to delete it?</h4>
                    </div>
                    <div class="modal-footer">
                      
                　　<!-- 削除ボタンフォーム -->
                    {!! Form::open(['route' => ['microposts.destroy', $micropost->id], 'method' => 'delete']) !!}
                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">close</button>
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                    {!! Form::close() !!}
                    </div>
                  </div>
                </div>
                </div>
                
                
            </div>
        </div>
    </li>
@endforeach
</ul>
{!! $microposts->render() !!}