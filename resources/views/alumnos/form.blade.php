<x-layout>
    
    <form method="POST" class="row g-3" action="{{ $alumno->exists ? route('alumnos.update', $alumno) : route('alumnos.store') }}">
        @csrf 
        @if($alumno->exists) @method('PUT') @endif

        @if(!$alumno->exists)
        <div class="col-md-4">
            <label for="inputRut" class="form-label">RUT</label>
            <input type="text" class="form-control" id="inputRut" name="rut" value="">
            @error('rut') <div>{{ $message }}</div> @enderror
        </div>
        @endif

        <div class="col-md-12">
            <label for="inputNombres" class="form-label">Nombres</label>
            <input type="text" class="form-control" id="inputNombres" name="nombres" value="{{ old('nombres', $alumno->nombres)}}">
            @error('nombres') <div>{{ $message }}</div> @enderror
        </div>

        <div class="col-6">
            <label for="inputApellidoP" class="form-label">Apellido Paterno</label>
            <input type="text" class="form-control" id="inputApellidoP" name="apellido_paterno" value="{{ old('apellido_paterno', $alumno->apellido_paterno)}}">
            @error('apellido_paterno') <div>{{ $message }}</div> @enderror
        </div>

        <div class="col-6">
            <label for="inputApellidoM" class="form-label">Apellido Materno</label>
            <input type="text" class="form-control" id="inputApellidoM" name="apellido_materno" value="{{ old('apellido_materno', $alumno->apellido_materno)}}">
            @error('apellido_materno') <div>{{ $message }}</div> @enderror
        </div>

        @if(!$alumno->exists)
        <div class="col-6">
            <label for="inputFecha" class="form-label">Fecha de Nacimiento</label>
            <input type="date" class="form-control" id="inputFecha" name="fecha_nacimiento" value="">
            @error('fecha_nacimiento') <div>{{ $message }}</div> @enderror
        </div>
        @endif

        <div class="col-7">
            <label for="inputCorreo" class="form-label">Correo</label>
            <input type="email" class="form-control" id="inputCorreo" name="correo" value="{{ old('correo', $alumno->correo)}}">
            @error('correo') <div>{{ $message }}</div> @enderror
        </div>

        <div class="col-5">
            <label for="inputFono" class="form-label">Teléfono</label>
            <input type="text" class="form-control" id="inputFono" name="telefono" value="{{ old('telefono', $alumno->telefono)}}">
            @error('telefono') <div>{{ $message }}</div> @enderror
        </div>

        <div class="col-md-4">
            <label for="inputCarrera" class="form-label">Carrera</label>
            <select id="inputCarrera" class="form-select" name="carrera_id">
                <option value ="">Eligir carrera</option>
                @foreach($carreras as $carrera)
                    <option value="{{ $carrera->id }}"
                        {{ old('carrera_id', $alumno->carrera_id ?? '') == $carrera->id ? 'selected' : '' }} >
                        {{ $carrera->nombre }}
                    </option>
                @endforeach
            </select>
            @error('carrera_id') <div>{{ $message }}</div> @enderror
        </div>
        <div class="col-12">
            <a class="btn btn-secondary" role="button" aria-disabled="true" href="{{ route('alumnos.index') }}">
                <i class="fa-solid fa-arrow-left" data-bs-toggle="tooltip" title="Volver"></i>
            </a>
            <button type="submit" class="btn btn-primary">
                {{ $alumno->exists ? 'Actualizar' : 'Registrar' }}
            </button>
        </div>
    </form>

</x-layout>