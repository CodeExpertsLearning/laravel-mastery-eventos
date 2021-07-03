@extends('layouts.auth')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifique Seu E-mail') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Reenviamos um link novo de verificação de conta!') }}
                        </div>
                    @endif

                    {{ __('Antes de continuar é preciso verificar seu e-mail, enviamos um link de ativação.') }}
                    {{ __('Se você não recebeu o e-mail') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Clique Para Receber Novo Link') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
