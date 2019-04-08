@extends('admin.layout.app')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-12">
        <h1 class="d-inline mr-3 align-middle">{{ ucfirst($variaveis->pluraliza) }}</h1>
        @if(isset($variaveis->btn_criar))
        {!! $variaveis->btn_criar !!}
        @endif
        @if(isset($variaveis->btn_lixeira))
        {!! $variaveis->btn_lixeira !!}
        @endif
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title d-inline">
              Lista de {{ $variaveis->pluraliza }} do CORE-SP
            </h3>
            @if(isset($busca))
              @if(isset($variaveis->slug))
              <a href="/admin/{{ $variaveis->slug }}" class="badge badge-primary d-inline ml-2">Mostrar todos</a>
              @else
              <a href="/admin/{{ $variaveis->plural }}" class="badge badge-primary d-inline ml-2">Mostrar todos</a>
              @endif
            @endif
            <div class="card-tools">
              <form class="input-group input-group-sm"
                method="GET"
                role="form"
                @if(isset($variaveis->busca))
                action ="/admin/{{ $variaveis->busca }}/busca">
                @else
                action ="/admin/{{ $variaveis->plural }}/busca">
                @endif
                <input type="text"
                  name="q"
                  class="form-control float-right"
                  placeholder="Pesquisar" />
                <div class="input-group-append">
                  <button type="submit" class="btn btn-default">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </form>
            </div>
          </div>
          <div class="card-body">
            @if($resultados->count() > 0)
            {!! $tabela !!}
            @else
              @if(isset($busca))
              Nenhum {{ $variaveis->singular }} encontrado
                @if(isset($variaveis->slug))
                <a href="/admin/{{ $variaveis->slug }}" class="badge badge-primary d-inline ml-2">Mostrar todos</a>
                @else
                <a href="/admin/{{ $variaveis->plural }}" class="badge badge-primary d-inline ml-2">Mostrar todos</a>
                @endif
              @endif
            @endif
          </div>
          <div class="card-footer">
            @if($resultados)
            <div class="row">
              <div class="col-sm-5 align-self-center">
              @if($resultados->count() > 1)
              Exibindo {{ $resultados->firstItem() }} a {{ $resultados->lastItem() }} {{ $variaveis->plural }} de {{ $resultados->total() }} resultados.
              @endif
              </div>
              <div class="col-sm-7">
                <div class="float-right">
                  {{ $resultados->links() }}
                </div>
              </div>
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection