@extends('welcome')
@section('content')

<form action="/addIntegrantes" method="POST">
	 @csrf
  <div class="form-group">
    <label for="nombreDeGrupo">Nombre del grupo</label>
    <input type="text" class="form-control" id="nombreDeGrupo"  name="nombreDeGrupo" placeholder="Nombre de ejemplo" 
    @if(isset($nombre))
      value="{{ $nombre }}" 
    @endif
    >
  </div>
   <div class="form-group">
    <label for="cantidadIntegrantes">Cantidad De Integrantes</label>
    <input type="text" class="form-control" id="cantidadIntegrantes" name="cantidadIntegrantes" placeholder="Cantidad De Integrantes" 
    @if(isset($cantIntegrantes))
      value="{{ $cantIntegrantes }}"
    @endif
    >
  </div>
  <button type="submit" class="btn btn-submit">Aceptar</button>

	<a href="/" class="btn btn-danger">Volver</a>

</form>

@endsection
