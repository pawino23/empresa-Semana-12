@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Lista de Personas</h2>
    @auth
    <a href="{{ route('personas.create') }}" class="btn btn-primary mb-3">Crear Persona</a>
    @endauth
    
    <table class="table">
        <thead>
            <tr>
                <th>Foto</th> 
                <th>Apellido</th>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Fecha de Nacimiento</th>
                <th>Edad</th>
                <th>Sueldo</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($personas as $persona)
                @auth
                    <tr>
                        <td>
                            @if ($persona->foto)
                                <img src="{{ asset('storage/' . $persona->foto) }}" alt="Foto de {{ $persona->cperApellido }}" style="max-width: 100px; height: auto;">
                            @else
                                <p>No foto</p>
                            @endif
                        </td>
                        
                        <td>{{ $persona->cperApellido }}</td>
                        <td>{{ $persona->cPerNombre }}</td>
                        <td>{{ $persona->cPerDireccion }}</td>
                        <td>{{ $persona->dPerFechaNac }}</td>
                        <td>{{ $persona->nPerEdad }}</td>
                        <td>{{ $persona->nPerSueldo }}</td>
                        <td>{{ $persona->nPerEstado ? 'Activo' : 'Inactivo' }}</td>
                        <td>
                            <a href="{{ route('personas.edit', $persona->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('personas.destroy', $persona->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Está seguro de que desea eliminar esta persona?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endauth
            @endforeach
        </tbody>
    </table>
</div>
@endsection