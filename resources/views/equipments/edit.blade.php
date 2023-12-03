@extends('layouts.app')

@section('title', 'NWS - Modifier le matériel')

@section('content')
    <div class="container mx-auto mt-5">
        <h2 class="text-2xl font-semibold mb-4">Modifier matériel</h2>

        <form action="{{ route('equipments.update', $equipment->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="row mb-4">
                <label for="name" class="form-label">Nom:</label>
                <input type="text" name="name" id="name" class="form-input w-50" value="{{ old('name', $equipment->name) }}" required>
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="row mb-4">
                <label for="description" class="form-label">Prénom:</label>
                <input type="text" name="description" id="description" class="form-input w-50" value="{{ old('description', $equipment->description) }}" required>
                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="row mb-4">
                <label for="quantity" class="form-label">quantity:</label>
                <input type="number" name="quantity" id="quantity" class="form-input w-50" value="{{ old('quantity', $equipment->quantity) }}" required>
                @error('quantity')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

         
        
            <button type="submit" class="btn btn-primary">Mettre à jour Étudiant</button>
        </form>
    </div>
@endsection
