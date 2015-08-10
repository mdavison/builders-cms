{{ $activity->user->name }}
added
@if( ! empty($activity->subject->name))
    new user <em>{{ $activity->subject->name }}</em>
@else
    a new user
@endif
{{ $activity->created_at->diffForHumans() }}