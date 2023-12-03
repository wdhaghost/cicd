@extends('layouts.app')

@section('title', 'NWS - Liste des Étudiants')

@section('content')
    <div class=" mx-auto mt-5">
        <h2 class="text-2xl font-semibold mb-4">Liste des prêts</h2>
        <a href="{{ route('loans.create') }}" class="btn btn-success mb-2">Emprunter du matériel</a>
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Succès!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <table class=" table table-primary">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Matériel</th>
                    <th scope="col">Date d'emprunt</th>
                    <th scope="col">Date de Retour</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Rendu</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @php $i = 1; @endphp
                @foreach ($loans as $loan)
                    <tr class="table-secondary">
                        <th scope="row">{{ $i }}</th>
                        <td>{{ $loan->equipment->name }}</td>
                        <td>{{ date('d M Y',strtotime($loan->loan_date)) }}</td>
                        <td>{{ date('d M Y',strtotime($loan->return_date)) }}</td>
                        <td>{{ $loan->student->lastname }}</td>
                        <td>{{ $loan->student->firstname }}</td>
                        <td>{{ $loan->returned == 0?"Non":"Oui"}}</td>
                        <td class="d-flex p-2">
                            @if ($loan->returned == 0)
                            <form action="{{ route('loans.update', $loan->id) }}" method="POST" class="inline ml-2">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="returned" id="returned" value="1">
                                <button type="submit" class="btn btn-success">Retour</button>
                            </form>
                            @endif
                            <form action="{{ route('loans.destroy', $loan->id) }}" method="POST" class="inline ml-2">
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
