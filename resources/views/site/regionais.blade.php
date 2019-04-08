@extends('layout.app', ['title' => 'Regionais'])

@section('content')

@php
use App\Http\Controllers\Helper;
@endphp

<section id="pagina-cabecalho" class="mt-1">
  <div class="container-fluid text-center nopadding position-relative pagina-titulo-img">
    <img src="{{ asset('img/seccionais.png') }}" />
    <div class="row position-absolute pagina-titulo">
      <div class="container text-center">
        <h1 class="branco text-uppercase">
          Seccionais
        </h1>
      </div>
    </div>
  </div>
</section>

<section id="pagina-busca">
  <div class="container">
    <div class="row" id="conteudo-principal">
      <div class="col">
        <div class="row nomargin">
          <div class="flex-one pr-4 align-self-center">
            <h4 class="stronger">Lista de Seccionais</h4>
          </div>
          <div class="align-self-center">
            <a href="/" class="btn-voltar">Voltar</a>
          </div>
        </div>
      </div>
    </div>
    <div class="linha-lg"></div>
    <div class="row mt-2">
      <div class="col-sm-8">
        @foreach($regionais as $regional)
        <div class="box-resultado">
          <h5 class="pb-1">{{ $regional->regional }}</h5>
          <p class="light"><strong>Endereço:</strong> {{ $regional->endereco }}, {{ $regional->numero }} - {{ $regional->complemento }}</p>
          <p class="light"><strong>Localização: </strong>{{ $regional->bairro }} - {{ $regional->cep }}</p>
          <p class="light"><strong>Telefone:</strong> {{ $regional->telefone }}</p>
          <p class="light"><strong>Email:</strong> {{ $regional->email }}</p>
        </div>
        @endforeach
      </div>
      <div class="col-sm-4">
        @include('site.inc.content-sidebar')
      </div>
    </div>
  </div>
</section>



@endsection