@extends('layouts.app')


@section('title') Criar Evento -  @endsection

@section('content')
    <div class="row">
        <div class="col-12 my-5">
            <h2>Criar Evento</h2>
        </div>
    </div>

    {{--
    @if($errors->any())

        <div class="alert alert-danger">
            <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
            </ul>
        </div>

    @endif
    --}}

    <div class="row">
        <div class="col-12">

            <form action="{{route('admin.events.store')}}" method="post">
                @csrf

                <div class="form-group">

                    <label>Título Evento</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title">

                    @error('title')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                   @enderror
                </div>

                <div class="form-group">

                    <label>Descrição Rápida Evento</label>
                    <input type="text" class="form-control @error('description') is-invalid @enderror" name="description">

                    @error('description')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror

                </div>

                <div class="form-group">

                    <label>Fale mais Sobre o Evento</label>
                    <textarea name="body" id="" cols="30" rows="10" class="form-control @error('body') is-invalid @enderror"></textarea>

                    @error('body')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror

                </div>

                <div class="form-group">

                    <label>Quando Vai Acontecer?</label>
                    <input type="text" class="form-control @error('start_event') is-invalid @enderror" name="start_event">

                    @error('start_event')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror

                </div>

                <button type="submit" class="btn btn-lg btn-success">Criar Evento</button>

            </form>

        </div>
    </div>
@endsection
