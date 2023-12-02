@extends('layouts.app')

@section('title', 'NWS - Liste des Étudiants')

@section('content')
    <div class=" mx-auto mt-5">
        <h2 class="text-2xl font-semibold mb-4">Liste des Étudiants</h2>
        <a href="{{ route('students.create') }}" class="btn btn-success mb-2">Ajouter un Étudiant</a>    
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Succès!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <table class=" table table-primary">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Email</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr  class="table-secondary">
                        <th scope="row">1</th>

                        <td >{{ $student->lastname }}</td>
                        <td >{{ $student->firstname }}</td>
                        <td >{{ $student->mail }}</td>
                        <td class="d-flex p-2" >

                        
                            <a href="{{ route('students.show', $student->id) }}" class="btn btn-primary">Voir</a>
                            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-secondary">Modifier</a>
                            <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="inline ml-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
