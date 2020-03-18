@extends('layout.app')

@section('title', 'Criar Funcionário')

@section('content')
  <div class="container">
      <h1>Criar um Funcionário.</h1>
    <div class="row">
      <div class="col-md-12">
        <form action="{{route('staffs.store')}}" method="POST" >
          @csrf
          <div class="row">
            <div class="col-md-6 col-sm-12">
              <div class="form-group">
                <label for="name" class="col-form-label">Name</label>
                <input type="text" class="form-control" placeholder="Name" id="name" name="name">
              </div>
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="form-group">
                <label for="cpf" class="col-form-label">CPF</label>
                <input type="text" class="form-control" placeholder="CPF" id="cpf" name="cpf" arial-describedby="cpf_helper">
                <small id="cpf_helper" class="form-text text-muted">Digite somente números.</small>
              </div>
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="form-group">
                <label for="carteira" class="col-form-label">CTPS</label>
                <input type="text" class="form-control" placeholder="Digite a CTPS" id="carteira" name="carteira">
              </div>
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="form-group">
                <label for="sector" class="col-form-label">Setor</label>
                <select id="sector" name="sector" class="form-control">
                  <option selected>Escolha um setor...</option>
                  @foreach ($sectors as $sector)
                    <option value="{{$sector->id}}">{{$sector->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="form-group">
                <label for="phone" class="col-form-label">Telefone</label>
                <input type="text" class="form-control" placeholder="Digite um numero de Telefone..." id="phone" name="phone" arial-describedby="phone_helper">
                <small id="phone_helper" class="form-text text-muted">Digite somente números.</small>
              </div>
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="form-group">
                <label for="phone2" class="col-form-label">Telefone 2</label>
                <input type="text" class="form-control" placeholder="Digite um outro numero de Telefone..." id="phone2" name="phone2" arial-describedby="phone2_helper">
                <small id="phone2_helper" class="form-text text-muted">Digite somente números.</small>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
      </div>
    </div>
  </div>
@endsection
