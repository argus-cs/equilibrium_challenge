@extends('layout.app')

@section('content')
  <div class="container">
    <div class="jumbotron">
      <h1>Staffs</h1>
    </div>
    @if(count($staffs) > 1)
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
              <td>{{preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $staff->cpf)}}</td>
              <td></td>
              <td>
                <a href="/staffs/{{$staff->id}}/edit" class="btn btn-sm">
                  <i class="material-icons">edit</i>
                </a>
                <button class="btn btn-sm" data-id="{{$staff->id}}" data-toggle="modal" data-target="#delete">
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
            <form action="{{route('staffs.destroy', 'test')}}" method="POST">
              {{ method_field("DELETE") }}
              {{ csrf_field() }}
              <div class="modal-body">
                <input type="hidden" name="delete_id" id="delmodel" value="">
                Deseja realmente deletar esse Funcionário?
                a ação não poderar ser desfeita.
              </div>
          </form>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Sim, Deletar</button>
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
    $("#delete").on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget);
      var id = button.data('id');
      var modal = $(this);

      modal.find('.modal-body #delmodel').val(id);
    })
  </script>
@endsection
