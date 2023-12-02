@extends('layouts.app')

@section('title', 'NWS - Détails de l\'Étudiant')

@section('content')
    <div class="container mx-auto mt-5">
        <h2 class="text-2xl font-semibold mb-4">Détails de l'Étudiant</h2>

        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="px-4 py-5 sm:p-6">
                <dl>
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Nom
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $student->lastname }}
                        </dd>
                    </div>
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Prénom
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $student->firstname }}
                        </dd>
                    </div>
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Email
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $student->mail }}
                        </dd>
                    </div>
                    
                </dl>
            </div>
            <div class="bg-gray-100 px-4 py-4 sm:px-6">
                <a href="{{ route('students.index') }}" class="text-indigo-600 hover:text-indigo-900">Retour à la liste des étudiants</a>
            </div>
        </div>
    </div>
@endsection
