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

                <div class="form-group">

                    <label>Título Evento</label>
                    <input type="text" class="form-control" name="title" value="{{$event->title}}">

                </div>

                <div class="form-group">

                    <label>Descrição Rápida Evento</label>
                    <input type="text" class="form-control" name="description" value="{{$event->description}}">

                </div>

                <div class="form-group">

                    <label>Fale mais Sobre o Evento</label>
                    <textarea name="body" id="" cols="30" rows="10" class="form-control">{{$event->body}}</textarea>

                </div>

                <div class="form-group">

                    <label>Quando Vai Acontecer?</label>
                    <input type="text" class="form-control" name="start_event" value="{{$event->start_event}}">

                </div>

                <button type="submit" class="btn btn-lg btn-success">Atualizar Evento</button>

            </form>

        </div>
    </div>
@endsection
