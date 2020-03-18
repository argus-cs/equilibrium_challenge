@extends('layout.app')

@section('content')
  <div class="container">
    @if($staff)
      <div class="jumbotron">
        <h1>{{$staff->name}}</h1>
      </div>
      <p>created at {{$staff->created_at}}.</p>
      <h4>{{cpf_format($staff->cpf)}}</h4>
      <h3>{{$staff->carteira}}</h3>
      <h4>Phones</h4>
      <p>
        @if($staff->phones->isNotEmpty())
          @foreach ($staff->phones as $phone)
            {{$phone->number}},
          @endforeach
        @endif
      </p>
    @else
      <p>Algo deu errado...</p>
    @endif
  </div>
@endsection
