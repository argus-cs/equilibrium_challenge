@extends('layout.app')

@section('content')
  <div class="container">
    <div class="jumbotron">
      <h1>Create a Staff</h1>
    </div>
    <div class="row">
      <div class="col-md-12">
        {!! Form::open(['action' => 'StaffsController@store', 'method' => 'POST']) !!}
          <div class="row">
            <div class="col-md-6 col-sm-12">
              <div class="form-group">
                {{Form::label('name', 'Name')}}
                {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name'])}}
              </div>
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="form-group">
                {{Form::label('cpf', 'CPF')}}
                {{Form::text('cpf', '', ['class' => 'form-control', 'placeholder' => 'CPF'])}}
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-sm-12">
              <div class="form-group">
                {{Form::label('sector', 'Setor')}}
                {{Form::select('sector', [$sectors], '', ['class' => 'form-control', 'placeholder' => 'Setor'])}}
              </div>
            </div>
          </div>
          {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
        {!! Form::close() !!}
      </div>
    </div>
  </div>
@endsection
