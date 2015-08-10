{{ $activity->user->name }}
created a gallery
@if( ! empty($activity->subject->name))
    called <a href="/galleries/{{$activity->subject->link_token}}">{{ $activity->subject->name }}</a>
@endif
{{ $activity->created_at->diffForHumans() }}