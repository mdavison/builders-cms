{{ $activity->user->name }}
uploaded
@if( ! empty($activity->subject->filename))
    photo <a href="/photos/{{$activity->subject_id}}">{!! pretty_photo_filename($activity->subject->filename) !!}</a>
@else
    a photo
@endif
{{ $activity->created_at->diffForHumans() }}