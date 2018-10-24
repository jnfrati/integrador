@extends('welcome')
@section('content')

<form action="/save" method="POST">
	 @csrf 
  <div class="form-group">
    <label for="nombreDeGrupo">Nombre del grupo</label>
    <input class="form-control" type="text" placeholder="{{ $grupo->nombre }}" readonly>
    <input type="hidden" name="idGrupo" value="{{ $grupo->id }}">
  </div>
  @for ($i = 0; $i < $cantIntegrantes; $i++)
    <div class="form-group">
      <label for="nombreApellido">Nombre y Apellido</label>
      <input type="text" class="form-control" id="nombreApellido" name="nombreApellido" placeholder="Nombre y Apellido">
    </div>
    <div class="form-group">
      <label for="dni">DNI</label>
      <input type="text" class="form-control" id="dni" name="dni" placeholder="DNI">
    </div>
    <div class="form-group">
      <label for="telefono">Telefono</label>
      <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono">
    </div>
    <div class="form-group">
      <label for="roles">Example select</label>
      <select class="form-control" id="roles" name="rol">
        @foreach($roles as $rol)
          <option value="{{ $rol->id }}">{{ $rol->nombre }}</option>
        @endforeach
      </select>
    </div>
  
  @endfor
  <button class="btn btn-submit" type="submit">
    Enviar
  </button>
</form>
@endsection
