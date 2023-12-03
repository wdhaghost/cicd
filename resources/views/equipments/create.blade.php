@extends('layouts.app')

@section('title', 'NWS - Ajouter du matériel')

@section('content')
    <div class="container mx-auto mt-5">
        <h2 class="b-4">Ajouter du matériel</h2>

        <form action="{{ route('equipments.store') }}" method="post">
            @csrf

            <div class="row mb-4">
                <label for="name" class="form-label">Nom:</label>
                <input type="text" name="name" id="name" class="form-input w-50 mt-1 " value="{{ old('name') }}" required>
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="row mb-4">
                <label for="description" class="form-label">Description:</label>
                <input type="text" name="description" id="description" class="form-input w-50 mt-1 " value="{{ old('description') }}" required>
                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="row mb-4">
                <label for="quantity" class="form-label">Quantité:</label>
                <input type="number" name="quantity" id="quantity" class="form-input w-50 mt-1 " value="{{ old('quantity') }}" required>
                @error('quantity')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

    
        
            <button type="submit" class="btn btn-success">Créer Étudiant</button>
        </form>
    </div>
@endsection
