@extends('layout.app')

@section('title', 'Criar Funcionário')

@section('nav')
  <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-purple rounded shadow-sm">
    <img class="mr-3" src="https://getbootstrap.com/docs/4.4/assets/brand/bootstrap-outline.svg" alt="" width="48" height="48">
    <div class="lh-100">
      <h6 class="mb-0 text-white lh-100">Funcionário</h6>
      <small>Criação</small>
    </div>
  </div>
@endsection

@section('content')
  <div class="container">
    <div class="py-5 text-center">
      <img class="d-block mx-auto mb-4" src="https://getbootstrap.com/docs/4.4/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
      <h2>Criar Funcionário</h2>
      <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
    </div>
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
          <button type="submit" class="btn btn-primary btn-lg btn-block  ">Cadastrar</button>
        </form>
      </div>
    </div>
  </div>
@endsection
