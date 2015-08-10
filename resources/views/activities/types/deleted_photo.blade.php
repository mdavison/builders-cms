{{ $activity->user->name }}
deleted
@if( ! empty($activity->subject->filename))
    photo <em>{!! pretty_photo_filename($activity->subject->filename) !!}</em>
@else
    a photo
@endif
{{ $activity->created_at->diffForHumans() }}