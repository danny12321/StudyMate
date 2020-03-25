@extends('layouts.dashboard')

@section('head')
    <script src="https://kit.fontawesome.com/8ccf398d8a.js" crossorigin="anonymous"></script>
@endsection

@section('content')
    <div class="container">
        {{-- <h1>Zelf kijken? Open hier de pagina</h1> --}}
        {{-- <img src="https://api.qrserver.com/v1/create-qr-code/?data={{ route('dashboard') }}&size=220x220&margin=10" alt="qrcode"> --}}

        {{-- <h1>Voortgangsmeter</h1>

        <h1>Voltooide vakken</h1>
        <h2>Periode 1</h2>
        <h3>Blok 1</h3>
        <h3>Blok 2</h3>
        <h3>Blok 3</h3>
        <h3>Blok 4</h3>
        
        <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
        </div> --}}

        <div class="progress">
            <div title="{{$currStudyPoints}} van de {{$maxStudyPoints}} behaald" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="{{$currStudyPoints}}" aria-valuemin="0" aria-valuemax="{{$maxStudyPoints}}" style="width: 75%"></div>
        </div>

        <div class="m-progress">

            @if ((($maxBlock - 1) % 4) + 1 !== 4)
            <div class="m-progress__year">

                <div class="m-progress__year__block">
                    <div class="m-progress__year__block__content">
                        <h3>Blok</h3>
                    </div>
                    <div class="m-progress__year__block__period">
                        <h3>Periode</h3>
                    </div>
                </div>
            @endif
            
            @for ($block = $maxBlock; $block > 0; $block--)
                {{-- Clac the period --}}
                @if ((($block - 1) % 4) + 1 == 4)
                    <div class="m-progress__year">

                        <div class="m-progress__year__block">
                            <div class="m-progress__year__block__content">
                                <h3>Blok</h3>
                            </div>
                            <div class="m-progress__year__block__period">
                                <h3>Periode</h3>
                            </div>
                        </div>
                @endif
                        <div class="m-progress__year__block">
                            <div class="m-progress__year__block__content">
                                <span>{{$block}}</span>
                            </div>
                            <div class="m-progress__year__block__period">
                                <span>{{(($block - 1) % 4) + 1}}</span>
                            </div>
                            <div class="m-progress__year__block__courses">

                                @foreach($courses as $course)
                                    @if($course->block == $block)
                                        <div class="m-progress__year__block__courses__course">
                                            <div class="m-progress__year__block__courses__course__heading">
                                                <i class="far fa-check-circle"></i>
                                                <h3>{{$course->name}}</h3>
                                            </div>

                                            @if($course->grade)
                                            <div class="m-progress__year__block__courses__course__points">
                                                <span class="m-progress__year__block__courses__course__points__point">{{$course->grade}}</span>
                                                <span>Cijfer</span>
                                            </div>
                                            @endif
                                            
                                            <div class="m-progress__year__block__courses__course__points">
                                                <span class="m-progress__year__block__courses__course__points__point">{{$course->study_points}}</span>
                                                <span>studiepunten</span>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach

                            </div>
                        </div>

                @if ((($block - 1) % 4) + 1 == 1)
                    </div>
                @endif
            @endfor
        </div>
    </div>

    
@endsection