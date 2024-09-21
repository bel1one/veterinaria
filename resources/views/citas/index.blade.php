@extends('layout.admin')

@section('contenido')

@if(session('msn_success'))
    <script>
      let mensaje = "{{ session('msn_success') }}";
      Swal.fire({
        icon: "success",
        html: `<span style="font-size: 16px;">${mensaje}</span>`,
      });
    </script>
@endif

<h1 class="title-menu text-center">CITAS VETERINARIAS</h1>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <a class="btn btn-success" href="{{ route('citas.create') }}">Registrar</a>
        <div class="table-search">
            <input type="search" class="form-control" placeholder="Buscar" style="width: 250px;">
            <i class="ri-search-line" id="search" style="cursor:pointer;"></i>
        </div>
    </div>

    <div class="table-responsive w-90 mx-auto"> 
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>MASCOTA</th>
                    <th>FECHA</th>
                    <th>HORA</th>
                    <th>MOTIVO</th>
                    <th>VETERINARIO</th>
                    <th>OBSERVACIONES</th>
                    <th>ACCIONES</th>
                </tr>
            </thead>
            <tbody>
            @foreach($citas as $cita)
                <tr>
                    <td>{{ $cita->id }}</td>
                    <td>{{ $cita->mascota }}</td>
                    <td>{{ $cita->fecha }}</td>
                    <td>{{ $cita->hora }}</td>
                    <td>{{ $cita->motivo }}</td>
                    <td>{{ $cita->veterinario }}</td>
                    <td>{{ $cita->observaciones }}</td>

                    <td class="d-flex">
                        <a href="{{ route('citas.edit',[$cita->id]) }}" class="btn btn-warning me-2">Editar</a>
                        <form onsubmit='confirmaEliminarEquipo(event)' action="{{route('citas.destroy', [$cita->id]) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center mt-4">
        {{ $citas->links('pagination::bootstrap-4') }}
    </div>
    </div>
</div>

<!-- Script para confirmar la eliminación -->
<script>
    function confirmaEliminarEquipo(event){
        event.preventDefault();
        let form = event.target;
        Swal.fire({
            text: "¿Estás seguro de que deseas eliminar este registro?",
            icon: "question",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Sí",
            cancelButtonText: "No"
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    }
</script>

@endsection
