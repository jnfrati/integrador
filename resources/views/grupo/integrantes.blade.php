@extends('welcome')
@section('content')

<form action="/save" method="POST">
	 @csrf 
  <div class="form-group">
    <label for="nombreDeGrupo">Nombre del grupo</label>
    <input class="form-control" type="text" value="{{ $grupo->nombre }}" id="nombreDeGrupo" name="nombreDeGrupo" readonly>
  </div>
  <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre y Apellido</th>
      <th scope="col">DNI</th>
      <th scope="col">Telefono</th>
      <th scope="col">
        Rol 
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AgregarRol">
          Agregar Rol
        </button>
      </th>
    </tr>
  </thead>
  <tbody>
  @for ($i = 0; $i < $cantIntegrantes; $i++)
    <tr>
      <th scope="row">{{ $i }}</th>
      <td>
        <div class="form-group">
          <label for="nombreApellido">Nombre y Apellido</label>
          <input type="text" class="form-control" id="nombreApellido" name="nombreApellido[]" placeholder="Nombre y Apellido">
        </div>
      </td>
      <td>
        <div class="form-group">
          <label for="dni">DNI</label>
          <input type="text" class="form-control" id="dni" name="dni[]" placeholder="DNI">
        </div>
      </td>
      <td>
        <div class="form-group">
        <label for="telefono">Telefono</label>
        <input type="text" class="form-control" id="telefono" name="telefono[]" placeholder="Telefono">
        </div>
      </td>
      <td>   
        <div class="form-group">
          <label for="roles">Example select</label>
          <select class="form-control" id="roles" name="rol[]">
            @foreach($roles as $rol)
              <option value="{{ $rol->id }}">{{ $rol->nombre }}</option>
            @endforeach
          </select>
        </div>    
      </td>
    </tr>
  @endfor
</tbody>
</table>
  <button class="btn btn-submit" type="submit">
    Enviar
  </button>
</form>
<form action="/" method="POST">
  @csrf
  <input class="form-control" type="hidden" value="{{ $grupo->nombre }}" id="nombreDeGrupo" name="nombreDeGrupo">
  <input class="form-control" type="hidden" value="{{ $cantIntegrantes }}" id="cantIntegrantes" name="cantIntegrantes">
  <button class="btn btn-submit" type="submit">
    Volver
  </button>
</form>


<!-- Modal -->
<div class="modal fade" id="AgregarRol" tabindex="-1" role="dialog" aria-labelledby="AgregarRolModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="AgregarRolModal">Agergar nuevo Rol</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/addIntegrantes" method="GET">
        <input class="form-control" type="hidden" value="{{ $grupo->nombre }}" id="nombreDeGrupo" name="nombreDeGrupo">
        <input class="form-control" type="hidden" value="{{ $cantIntegrantes }}" id="cantIntegrantes" name="cantIntegrantes">
        <div class="modal-body">
          <div class="form-group">
            <label for="newRol">Nuevo Rol</label>
            <input type="text" class="form-control" id="newRol" name="nombre" placeholder="Bajista">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Aceptar</button>
        </div>
      </form>    
    </div>
  </div>
</div>
@endsection
