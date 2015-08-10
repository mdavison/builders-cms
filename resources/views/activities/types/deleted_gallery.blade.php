{{ $activity->user->name }}
deleted
@if( ! empty($activity->subject->name))
    gallery <em>{{ $activity->subject->name }}</em>
@else
    a gallery
@endif
{{ $activity->created_at->diffForHumans() }}