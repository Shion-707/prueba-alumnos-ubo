<x-layout>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <a class="btn btn-success mt-4" href="{{ route('alumnos.create') }}" role="button">
                    <i class="fa-solid fa-plus"></i> Registrar Alumno
                </a>
            </div>
        </div>

        <h1 class="mt-4">Listado de Alumnos</h1>

        <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">RUT</th>
                <th scope="col">Nombres</th>
                <th scope="col">Apellido Paterno</th>
                <th scope="col">Apellido Materno</th>
                <th scope="col">Fecha de nacimiento</th>
                <th scope="col">Correo</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Carrera</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alumnos as $alumno)
                <tr>
                    <th scope="row">{{ $alumno->id }}</th>
                    <td>{{ $alumno->rut }}</td>
                    <td>{{ $alumno->nombres }}</td>
                    <td>{{ $alumno->apellido_paterno }}</td>
                    <td>{{ $alumno->apellido_materno }}</td>
                    <td>{{ $alumno->fecha_nacimiento }}</td>
                    <td>{{ $alumno->correo }}</td>
                    <td>{{ $alumno->telefono }}</td>
                    <td>{{ $alumno->carrera->nombre }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('alumnos.edit', $alumno) }}" role="button">
                            <i class="fa-solid fa-pen" data-bs-toggle="tooltip" title="Editar"></i>
                        </a>
                        <form method="POST" action="{{ route('alumnos.destroy', $alumno) }}" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirmDelete(event)">
                                <i class="fa-solid fa-trash" data-bs-toggle="tooltip" title="Eliminar"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>

    <script type="text/javascript">
        function confirmDelete(event) {
            if (!confirm('¿Estás seguro de que deseas eliminar este registro?')) {
                event.preventDefault(); // Cancela el envío del formulario si el usuario hace clic en "Cancelar"
            }
            // Si el usuario hace clic en "Aceptar", el formulario se enviará normalmente.
        }
    </script>
</x-layout>