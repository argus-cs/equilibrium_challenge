@extends('layout.app')

@section('content')
  <div class="container">
    <div class="jumbotron">
      <h1>Edit {{$staff->name}}</h1>
    </div>
    <div class="row">
      <div class="col-md-12">
        {!! Form::open(['action' => ['StaffsController@update', $staff->id], 'method' => 'POST']) !!}
          <div class="row">
            <div class="col-md-6 col-sm-12">
              <div class="form-group">
                {{Form::label('name', 'Name')}}
                {{Form::text('name', $staff->name, ['class' => 'form-control', 'placeholder' => 'Name'])}}
              </div>
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="form-group">
                {{Form::label('cpf', 'CPF')}}
                {{Form::text('cpf', $staff->cpf, ['class' => 'form-control', 'placeholder' => 'CPF'])}}
              </div>
            </div>
          </div>
          {{Form::hidden('_method', 'PUT')}}
          {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
        {!! Form::close() !!}
      </div>
    </div>
  </div>
@endsection
