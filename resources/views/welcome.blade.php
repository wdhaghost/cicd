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
                        <li class="list-group-item">  <a href="{{ route('students.create') }}" class="card-link">Ajouter un étudiant</a>    </li>
                    </ul>
                </div>
            </div>
            <div class="card p-2 w-50">
                <h2 class="card-title">Matériels</h2>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item"><a href="{{ route('equipments.index') }}" class="card-link">Liste des matériels</a></li>
                        <li class="list-group-item">  <a href="{{ route('equipments.create') }}" class="card-link">Ajouter du matériel</a>    </li>
                    </ul>
                </div>
        </div>
        <div class="card p-2 w-50">
            <h2 class="card-title">Prêt de matériels</h2>
            <div class="card-body">
                <ul class="list-group">
                    <li class="list-group-item"><a href="{{ route('loans.index') }}" class="card-link">Liste des prêts</a></li>
                    <li class="list-group-item">  <a href="{{ route('loans.create') }}" class="card-link">Emprunter du matériel</a>    </li>
                </ul>
            </div>
        
    </div>
@endsection
