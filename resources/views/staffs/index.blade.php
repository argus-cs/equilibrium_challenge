@extends('layout.app')

@section('content')
  <div class="container">
    <div class="jumbotron">
      <h1>Funcionários</h1>
    </div>
    @if($staffs->isNotEmpty())
      <table class="table table-borded">
        <thead>
          <tr>
            <th scope="col">Nome</th>
            <th scope="col">CPF</th>
            <th scope="col">Setor</th>
            <th scope="col">Ações</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($staffs as $staff)
            <tr>
              <th scope="row">
                <a href="/staffs/{{$staff->id}}">
                  {{$staff->name}}
                </a>
              </th>
              <td>{{cpf_format($staff->cpf)}}</td>
              <td>
                {{$staff->sector->name}}
              </td>
              <td>
                <a href="/staffs/{{$staff->id}}/edit" class="btn btn-sm">
                  <i class="material-icons">edit</i>
                </a>
                <button class="btn btn-sm delete_modal" data-id="{{$staff->id}}" data-toggle="modal" data-target="#delete">
                  <i class="material-icons">delete_outline</i>
                </button>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="delete">Delete Funcionário?</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
              <div class="modal-body">
                Deseja realmente deletar esse Funcionário?
                a ação não poderar ser desfeita.
              </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button class="btn btn-primary" id="btn_delete">Sim, Deletar</button>
            </div>
          </div>
        </div>
      </div>
    @else
      <p>no staffs...</p>
    @endif
  </div>
@endsection

@section('footer_scripts')
  <script>
    $('td').on('click', '.delete_modal', function (e) {
      var location = "/staffs/"+$(this).data('id')+"/delete";
      $('#btn_delete').on('click', function(event) {
        console.log(location);
        window.location = location;
      });
      $('#delete_modal').modal('show');
    });
  </script>
@endsection
