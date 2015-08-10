@foreach($activities as $activity)
    <li class="list-group-item">

        @include("activities.types.{$activity->name}")

    </li>
@endforeach