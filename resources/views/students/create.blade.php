@extends('layouts.app')

@section('title', 'NWS - Créer un Étudiant')

@section('content')
    <div class="container mx-auto mt-5">
        <h2 class="b-4">Créer un Nouvel Étudiant</h2>

        <form action="{{ route('students.store') }}" method="post">
            @csrf

            <div class="row mb-4">
                <label for="lastname" class="form-label">Nom:</label>
                <input type="text" name="lastname" id="lastname" class="form-input w-50 mt-1 " value="{{ old('lastname') }}" required>
                @error('lastname')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="row mb-4">
                <label for="firstname" class="form-label">Prénom:</label>
                <input type="text" name="firstname" id="firstname" class="form-input w-50 mt-1 " value="{{ old('firstname') }}" required>
                @error('firstname')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="row mb-4">
                <label for="mail" class="form-label">Email:</label>
                <input type="email" name="mail" id="mail" class="form-input w-50 mt-1 " value="{{ old('mail') }}" required>
                @error('mail')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

    
        
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Créer Étudiant</button>
        </form>
    </div>
@endsection
