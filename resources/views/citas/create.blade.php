@extends('layout.admin')
@section('contenido')
<div class="form-container">
    <div class="titulo-container">
        <div class="container mt-5">
            <div class="bordesr p-4 border rounded shadow">
                <div class="row mb-3">
                    <div class="col-md-8">
                        <h1 class="principal-titulo">NUEVA CITA</h1>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <form method="POST" class="formulario" action="{{ route('citas.store') }}">
                            @csrf
                                <label for="mascota" class="labels">Mascota</label>
                                <input type="text" class="cuadro-text form-control" id="mascota" value="{{ old('mascota')}}" name="mascota" placeholder="Nombre de la Mascota" required>
                                @error('mascota')
                                    <div class="sms">{{ $message }}</div>
                                @enderror
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="mb-3">
                            <label for="fecha" class="labels">Fecha</label>
                            <input type="date" class="cuadro-text form-control" id="fecha" value="{{ old('fecha')}}" name="fecha" required>
                            @error('fecha')
                                <div class="sms">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="mb-3">
                            <label for="hora" class="labels">Hora</label>
                            <input type="time" class="cuadro-text form-control" id="hora" value="{{ old('hora')}}" name="hora" required>
                            @error('hora')
                                <div class="sms">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="mb-3">
                            <label for="motivo" class="labels">Motivo</label>
                            <textarea class="cuadro-text form-control" id="motivo" name="motivo" placeholder="Motivo de la Cita" required>{{ old('motivo') }}</textarea>
                            @error('motivo')
                                <div class="sms">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="mb-3">
                            <label for="veterinario" class="labels">Veterinario</label>
                            <input type="text" class="cuadro-text form-control" id="veterinario" value="{{ old('veterinario')}}" name="veterinario" placeholder="Nombre del Veterinario" required>
                            @error('veterinario')
                                <div class="sms">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="mb-3">
                            <label for="observaciones" class="labels">Observaciones</label>
                            <textarea class="cuadro-text form-control" id="observaciones" name="observaciones" placeholder="Observaciones">{{ old('observaciones') }}</textarea>
                            @error('observaciones')
                                <div class="sms">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                </div>
                
                <div class="row mt-4 justify-content-end">
                    <div class="col-md-auto">
                        <button class="guardar btn btn-primary" type="submit">Guardar</button>
                        </form>
                        <a href="{{ route('citas.index') }}" class="cancelar btn btn-secondary">Cancelar</a>
                    </div>
                </div>
            </div>
        </div>

        @if(session('msn_error'))
            <div class="error-box alert alert-danger">{{ session('msn_error') }}</div>
        @endif
    </div>
</div>
@endsection
