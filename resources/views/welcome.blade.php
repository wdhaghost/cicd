@extends('layouts.app')

@section('title', 'Accueil - Normandie Web School')

@section('content')
    <div class="container mx-auto mt-5">
        <h1 >Bienvenue à la Normandie Web School</h1>
        <p>Inventaire NWS</p>
        
        <div class="card-group">
            <div class="card p-2 w-50">
                <h2 class="card-title">Étudiants</h2>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item"><a href="{{ route('students.index') }}" class="card-link">Liste des Étudiants</a></li>
                        <li class="list-group-item">  <a href="{{ route('students.create') }}" class="card-link">Ajouter du matériel</a>    </li>
                    </ul>
                </div>
            </div>
        </div>

        
    </div>
@endsection
