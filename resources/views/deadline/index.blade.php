@extends('layouts.deadline')

@section('content')
<div class="container l-deadline">
    <h1>Vakken</h1>

    <h2>Sorteren</h2>
    <a href="{{ route('deadline', [
        'sort'=> 'teacher',
        'order' => 'asc'
    ])}}">docent</a>

    <a href="{{ route('deadline', [
        'sort'=> 'course',
        'order' => 'asc'
    ])}}">vak</a>

    <a href="{{ route('deadline', [
        'sort'=> 'deadline',
        'order' => 'asc'
    ])}}">deadline</a>

    <a href="{{ route('deadline', [
        'sort'=> 'categorie',
        'order' => 'asc'
    ])}}">categorie</a>

    @if(count($courses))
    @foreach ($courses as $course)
        <div class="row">
            <div class="col-md-12">
                <h2><b>{{$course->name}}</b> - <code>{{$course->deadline}}</code></h2>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <h3>Docenten</h3>

                @foreach ($course->teachers as $teacher)
                <h5>
                    <span class="badge badge-secondary">{{$teacher->name}}</span>
                </h5>
                @endforeach
            </div>

            <div class="col-md-6">
                <h3>Tags</h3>
                @foreach ($course->tags as $tag)
                <h5>
                    <span class="badge badge-secondary">{{$tag->tag}}</span>
                </h5>
                @endforeach
            </div>
            
        </div>

        <hr>
    @endforeach
    @else
        <b>Er zijn geen vakken gevonden</b>
    @endif
</div>
@endsection