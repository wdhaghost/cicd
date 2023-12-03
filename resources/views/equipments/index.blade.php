@extends('layouts.app')

@section('title', 'NWS - Liste des Étudiants')

@section('content')
    <div class=" mx-auto mt-5">
        <h2 class="text-2xl font-semibold mb-4">Liste des matériels</h2>
        <a href="{{ route('equipments.create') }}" class="btn btn-success mb-2">Ajouter du matériel</a>    
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
                    <th scope="col">Description</th>
                    <th scope="col">Quantité</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @php $i = 1; @endphp
                @foreach ($equipments as $equipment)
                    <tr  class="table-secondary">
                        <th scope="row">{{$i}}</th>

                        <td >{{ $equipment->name }}</td>
                        <td >{{ $equipment->description }}</td>
                        <td >{{ $equipment->quantity }}</td>
                        <td class="d-flex p-2" >

                        
                            <a href="{{ route('equipments.show', $equipment->id) }}" class="btn btn-primary">Voir</a>
                            <a href="{{ route('equipments.edit', $equipment->id) }}" class="btn btn-secondary">Modifier</a>
                            <form action="{{ route('equipments.destroy', $equipment->id) }}" method="POST" class="inline ml-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                    @php $i++; @endphp 
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
