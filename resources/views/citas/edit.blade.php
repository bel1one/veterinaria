@extends('layout.admin')

@section('contenido')

<h1 class="title-menu text-center">EDITAR CITA</h1>

<div class="container mt-4">
    <form action="{{ route('citas.update', $cita->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="mascota" class="form-label">Mascota</label>
            <input type="text" class="form-control" id="mascota" name="mascota" value="{{ old('mascota', $cita->mascota) }}" required>
        </div>

        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha</label>
            <input type="date" class="form-control" id="fecha" name="fecha" value="{{ old('fecha', $cita->fecha) }}" required>
        </div>

        <div class="mb-3">
            <label for="hora" class="form-label">Hora</label>
            <input type="time" class="form-control" id="hora" name="hora" value="{{ old('hora', $cita->hora) }}" required>
        </div>

        <div class="mb-3">
            <label for="motivo" class="form-label">Motivo</label>
            <textarea class="form-control" id="motivo" name="motivo" required>{{ old('motivo', $cita->motivo) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="veterinario" class="form-label">Veterinario</label>
            <input type="text" class="form-control" id="veterinario" name="veterinario" value="{{ old('veterinario', $cita->veterinario) }}" required>
        </div>

        <div class="mb-3">
            <label for="observaciones" class="form-label">Observaciones</label>
            <textarea class="form-control" id="observaciones" name="observaciones">{{ old('observaciones', $cita->observaciones) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Cita</button>
        <a href="{{ route('citas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

@endsection
