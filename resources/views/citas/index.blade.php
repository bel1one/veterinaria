@extends('layout.admin')
@section('contenido')
<h1 class="title-menu">Citas Veterinarias</h1>
<div class="table-header">
    <a class="btn btn-success" href="{{-- route('citas.create') --}}">Registrar</a>
    <div class="table-search">
        <input type="search" placeholder="Buscar">
        <i class="ri-search-line" id="search"></i>
    </div>
</div>

<div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>MASCOTA</th>
                    <th>FECHA</th>
                    <th>HORA</th>
                    <th>MOTIVO</th>
                    <th>VETERINARIO</th>
                    <th>OBSERVACIONES</th>
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

            <td>
                <a href="{{-- route('citas.edit',[$cita->id]) --}}" class= "btn btn-warning">Editar</a>
                <form onsubmit='window.confirmaEliminarEquipo(event)' action="{{--route('citas.destroy', [$cita->id])--}}" method="POST" style="display: inline;">
                     @csrf
                     @method('DELETE')
                <button type="submit" class= "btn btn-danger">Eliminar</button>
                </form>    
            </td>
        </tr>
        @endforeach
        </tbody>
     </table>
</div>

<!-- Script para confirmar la eliminación -->
<script>
    function confirmaEliminarEquipo(event){
        event.preventDefault();
        let form=event.target;
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
