@extends('layouts.site')

@section('title') Evento: {{$event->title}} - @endsection


@section('content')

        @if($event->banner)
            <div class="row mb-5">
                <div class="col-12">
                    <img src="{{asset('storage/' . $event->banner)}}" alt="Banner do Evento {{$event->title}}" class="img-fluid">
                </div>
            </div>
        @endif

        <div class="row mb-5">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <div>
                <h2>Evento: {{$event->title}}</h2>
                <p>
                    Evento acontecerá em {{$event->start_event->format('d/m/Y H:i:s')}}
                </p>
            </div>

            <div>
                <a href="{{route('enrollment.start', $event->slug)}}" class="bnt btn-lg btn-success">Inscrever-se</a>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-12">

            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#about" role="tab" aria-controls="about" aria-selected="true">Sobre</a>
                </li>

                @if($event->photos->count())
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#photos" role="tab" aria-controls="photos" aria-selected="false">Fotos</a>
                    </li>
                @endif

            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active pt-5" id="about" role="tabpanel" aria-labelledby="about-tab">

                    {{$event->body}}

                </div>

                @if($event->photos->count())
                    <div class="tab-pane fade pt-5" id="photos" role="tabpanel" aria-labelledby="photos-tab">

                        <div class="row">
                            @foreach($event->photos as $photo)
                                <div class="col-3">
                                    <img src="{{$photo->photo}}" alt="Foto do Evento {{$event->title}}" class="img-fluid">
                                </div>
                            @endforeach
                        </div>

                    </div>
                @endif

            </div>

        </div>

    </div>
@endsection
