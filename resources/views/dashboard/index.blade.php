@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h1>Zelf kijken? Open hier de pagina</h1>
        {{-- <img src="https://api.qrserver.com/v1/create-qr-code/?data={{ url('/') }}&size=220x220&margin=10" alt="qrcode"> --}}

        <h1>Voortgangsmeter</h1>

        <h1>Voltooide vakken</h1>
        <h2>Periode 1</h2>
        <h3>Blok 1</h3>
        <h3>Blok 2</h3>
        <h3>Blok 3</h3>
        <h3>Blok 4</h3>
        
        <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
        </div>

        <?php
            $maxBlock = 0;
            foreach ($courses as $course) {
                if($course->block > $maxBlock) $maxBlock = $course->block;
            }
        ?>

        <div class="m-progress">

            <div class="m-progress__block">
                <div class="m-progress__block__content">blok</div>
                <div class="m-progress__block__period">Periode</div>
            </div>
            @for ($block = $maxBlock; $block > 0; $block--)
                {{-- Clac the period --}}
                @if ((($block - 1) % 4) + 1 == 4)
                    <div class="m-progress__year">
                @endif

                    <div class="m-progress__year__block">
                        <div class="m-progress__year__block__content">{{$block}}</div>
                        <div class="m-progress__year__block__period">{{(($block - 1) % 4) + 1}}</div>
                    </div>

                @if ((($block - 1) % 4) + 1 == 1)
                    </div>
                @endif
            @endfor
        </div>
    </div>
@endsection