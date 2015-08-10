{{ $activity->user->name }}
updated
@if( ! empty($activity->subject->name))
    user <em>{{ $activity->subject->name }}</em>
@else
    a user
@endif
{{ $activity->created_at->diffForHumans() }}