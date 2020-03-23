@extends('layouts.deadline')

@section('content')
<div class="container l-deadline">
    <h1>Vakken</h1>

    @if(count($courses))
    @foreach ($courses as $course)
        Course
    @endforeach
    @else
        <b>Er zijn geen vakken gevonden</b>
    @endif
</div>
@endsection