@extends('layouts.app')


@section('title') Editar Evento -  @endsection

@section('content')
    <div class="row">
        <div class="col-12 my-5">
            <h2>Editar Evento</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-12">

            <form action="{{route('admin.events.update', ['event' => $event->id])}}" method="post">
                @csrf
                @method('PUT')

                <div class="form-group">

                    <label>Título Evento</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{$event->title}}">

                    @error('title')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror

                </div>

                <div class="form-group">

                    <label>Descrição Rápida Evento</label>
                    <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{$event->description}}">

                    @error('description')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror

                </div>

                <div class="form-group">

                    <label>Fale mais Sobre o Evento</label>
                    <textarea name="body" id="" cols="30" rows="10" class="form-control @error('body') is-invalid @enderror">{{$event->body}}</textarea>

                    @error('body')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror

                </div>

                <div class="form-group">

                    <label>Quando Vai Acontecer?</label>
                    <input type="text" class="form-control @error('start_event') is-invalid @enderror" name="start_event" value="{{$event->start_event}}">

                    @error('start_event')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror

                </div>

                <button type="submit" class="btn btn-lg btn-success">Atualizar Evento</button>

            </form>

        </div>
    </div>
@endsection
