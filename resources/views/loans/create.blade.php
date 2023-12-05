@extends('layouts.app')

@section('title', 'NWS - Ajouter du matériel')

@section('content')
    <div class="container mx-auto mt-5">
        <h2 class="b-4">Emprunter du matériel</h2>

        <form action="{{ route('loans.store') }}" method="post">
            @csrf

            <div class="row mb-4">
                <label for="loan_date" class="form-label">Date d'emprunt:</label>
                <input type="date" name="loan_date" id="loan_date" class="form-input w-50 mt-1 " value="{{ old('loan_date') }}" required>
                @error('loan_date')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="row mb-4">
                <label for="student_id" class="form-label">Etudiant:</label>
                <select name="student_id" id="student_id" class="form-select w-full" required>
                    <option value="" disabled selected>Sélectionnez un étudiant</option>
                    @foreach ($students as $student)
                        <option value="{{ $student['id'] }}">{{ $student['nom'] }}, {{ $student['prenom']}}</option>
                    @endforeach
                </select>
                @error('student_id')
                    <div class="text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="row mb-4">
                <label for="equipment_id" class="form-label">Matériel:</label>
                <select name="equipment_id" id="equipment_id" class="form-select w-full" required>
                    <option value="" disabled selected>Sélectionnez un équipement</option>
                    @foreach ($equipments as $equipment)
                        <option value="{{ $equipment->id }}">{{ $equipment->name }}</option>
                    @endforeach
                </select>
                @error('equipment_id')
                    <div class="text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

    
        
            <button type="submit" class="btn btn-success">Emprunter</button>
        </form>
    </div>
@endsection
