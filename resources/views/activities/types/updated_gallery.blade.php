{{ $activity->user->name }}
updated
@if( ! empty($activity->subject->name))
    the gallery <a href="/galleries/{{$activity->subject->link_token}}">{{ $activity->subject->name }}</a>
@else
    a gallery
@endif
{{ $activity->created_at->diffForHumans() }}