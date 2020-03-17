@extends('layout.app')

@section('content')
  <div class="container">
    @if($staff)
      <div class="jumbotron">
        <h1>{{$staff->name}}</h1>
      </div>
      <p>created at {{$staff->created_at}}.</p>
      <h4>{{preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $staff->cpf)}}</h4>
    @else
      <p>algo deu errado...</p>
    @endif
  </div>
@endsection
