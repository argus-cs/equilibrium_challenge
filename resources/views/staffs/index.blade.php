@extends('layout.app')

@section('title', 'Listar funcionarios')

@section('content')
    <h6 class="border-bottom border-gray pb-2 mb-0">Recent updates</h6>
    @if($staffs->isNotEmpty())
      @foreach ($staffs as $staff)
        <div class="media text-muted pt-3">
          <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>
          <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <a class="" href="{{route('staffs.show', $staff->id)}}">
              <strong class="d-block text-gray-dark">{{$staff->name}}</strong>
            </a>
            <strong>CPF:</strong> {{cpf_format($staff->cpf)}}
            <strong>Setor:</strong> {{$staff->sector->name}}
          </p>
          <div class="media-action align-self-end mb-0 border-bottom border-gray">
            <a href="{{route('staffs.edit', $staff->id)}}" class="btn btn-sm">
              <i class="material-icons">edit</i>
            </a>
            <button class="btn btn-sm delete_modal" data-id="{{$staff->id}}" data-toggle="modal" data-target="#delete">
              <i class="material-icons">delete_outline</i>
            </button>
          </div>
        </div>

      @endforeach
      <small class="d-block text-right mt-3">
        <a href="#">All updates</a>
      </small>
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
      <p>Sem Funcionarios...</p>
    @endif
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
