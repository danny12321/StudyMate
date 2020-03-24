@extends('layouts.deadline')

@section('content')
<div class="container l-deadline">
    <h1>Vakken</h1>

    <h2>Sorteren</h2>
    <a href="{{ route('deadline', [
        'sort'=> 'coordinator',
        'order' => $sort == 'coordinator' && $order == 'asc' ? 'desc' : 'asc'
    ])}}">Coordinator</a>

    <a href="{{ route('deadline', [
        'sort'=> 'course',
        'order' => $sort == 'course' && $order == 'asc' ? 'desc' : 'asc'
    ])}}">vak</a>

    <a href="{{ route('deadline', [
        'sort'=> 'deadline',
        'order' => $sort == 'deadline' && $order == 'asc' ? 'desc' : 'asc'
    ])}}">deadline</a>

    <a href="{{ route('deadline', [
        'sort'=> 'categorie',
        'order' => $sort == 'categorie' && $order == 'asc' ? 'desc' : 'asc'
    ])}}"
    >categorie</a>

    @if(count($courses))
        @foreach ($courses as $course)
            <form action="{{route('deadline_coures_done', ['course'=> $course->id])}}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-10">
                        <h2>
                            <b>{{$course->name}}</b> -
                            <span>{{$course->assessment->type}}</span>
                        </h2>
                        <h5>
                            <a href="{{route('deadline_course_edit', ['course'=> $course->id])}}">
                                @if($course->deadline)
                                <code>{{$course->deadline}}</code> 
                                @else 
                                Voeg deadline toe 
                                @endif
                            </a>
                        </h5>
                    </div>

                    <div class="col-md-2 text-right">
                        @if($course->deadline_done)
                            <h2><span class="badge badge-secondary badge-success">Done</span></h2>
                        @else
                            <button class="btn btn-primary" type="submit">Aftekenen</button>
                        @endif
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <h3>Docenten</h3>

                        <div class="d-flex">
                                <h5><span class="badge badge-danger">{{$course->coordinator->name}}</span></h5>
                            
                            @foreach ($course->teachers as $teacher)
                            <h5 class="ml-1">
                                <span class="badge badge-secondary">{{$teacher->name}}</span>
                            </h5>
                        @endforeach
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="d-flex">
                            <h3>Tags</h3>
                            <a class="btn btn-link" href="{{route('deadline_course_edit', ['course'=> $course->id])}}">Wijzigen</a>
                        </div>
                        
                        <div class="d-flex">
                            @foreach ($course->tags as $tag)
                                <h5 class="ml-1">
                                    <span class="badge badge-secondary">{{$tag->tag}}</span>
                                </h5>
                            @endforeach
                        </div>
                    </div>
                    
                </div>
                
                <hr>
            </form>
            @endforeach
        @else

        <div>
            <b>Er zijn geen vakken gevonden</b>
        </div>
    @endif
</div>
@endsection