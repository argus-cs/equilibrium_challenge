@extends('layout.app')

@section('title', 'Editar Funcionário')

@section('content')
  <div class="container">
    <div class="jumbotron">
      <h1>Editar um Funcionário.</h1>
      <p>{{$staff->name}}</p>
    </div>
    <div class="row">
      <div class="col-md-12">
        <form action="{{route('staffs.update')}}" method="POST" role="form" >
          @csrf
          <input type="hidden" name="id" value="{{$staff->id}}" />
          <div class="row">
            <div class="col-md-6 col-sm-12">
              <div class="form-group">
                <label for="name" class="col-form-label">Name</label>
                <input type="text" value="{{old('name', $staff->name)}}" class="form-control" placeholder="Digite um Nome..." id="name" name="name">
              </div>
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="form-group">
                <label for="cpf" class="col-form-label">CPF</label>
                <input type="text" readonly value="{{cpf_format(old('cpf', $staff->cpf))}}" class="form-control-plaintext" id="cpf" name="cpf" arial-describedby="cpf_helper">
                <small id="cpf_helper" class="form-text text-muted">Item unico.</small>
              </div>
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="form-group">
                <label for="carteira" class="col-form-label">CTPS</label>
                <input type="text" value="{{old('carteira', $staff->carteira)}}" class="form-control" placeholder="Digite uma CTPS..." id="carteira" name="carteira">
              </div>
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="form-group">
                <label for="sector" class="col-form-label">Setor</label>
                <select id="sector" name="sector" class="form-control">
                  @foreach ($sectors as $key => $label)
                    @if($staff->sector->id == $key)
                      <option value="{{$key}}" selected>{{$label}}</option>
                    @else
                      <option value="{{$key}}">{{$label}}</option>
                    @endif
                  @endforeach
                </select>
              </div>
            </div>
            @foreach ($staff->phones as $phone)
              <div class="col-md-6 col-sm-12">
                <div class="form-group">
                  <label for="{{$phone->id}}" class="col-form-label">Telefone</label>
                  <input type="text" class="form-control" value="{{old('phone', $phone->number)}}" placeholder="Digite um numero de Telefone..." id="phone" name="{{$phone->id}}" arial-describedby="phone_helper">
                  <small id="phone_helper" class="form-text text-muted">Digite somente números.</small>
                </div>
              </div>
            @endforeach
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
      </div>
    </div>
  </div>
@endsection
