@extends('layouts.app')

@section('title', 'NWS - Modifier Étudiant')

@section('content')
    <div class="container mx-auto mt-5">
        <h2 class="text-2xl font-semibold mb-4">Modifier Étudiant</h2>

        <form action="{{ route('students.update', $student->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="row mb-4">
                <label for="lastname" class="form-label">Nom:</label>
                <input type="text" name="lastname" id="lastname" class="form-input w-50" value="{{ old('lastname', $student->lastname) }}" required>
                @error('lastname')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="row mb-4">
                <label for="firstname" class="form-label">Prénom:</label>
                <input type="text" name="firstname" id="firstname" class="form-input w-50" value="{{ old('firstname', $student->firstname) }}" required>
                @error('firstname')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="row mb-4">
                <label for="mail" class="form-label">Email:</label>
                <input type="email" name="mail" id="mail" class="form-input w-50" value="{{ old('mail', $student->mail) }}" required>
                @error('mail')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

         
        
            <button type="submit" class="btn btn-primary">Mettre à jour Étudiant</button>
        </form>
    </div>
@endsection
