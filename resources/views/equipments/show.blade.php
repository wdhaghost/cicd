@extends('layouts.app')

@section('title', 'NWS - Détails de l\'Étudiant')

@section('content')
    <div class="container mx-auto mt-5">
        <h2 class="text-2xl font-semibold mb-4">Détails du matériel</h2>

        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="px-4 py-5 sm:p-6">
                <dl>
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            matériel
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $equipment->name }}
                        </dd>
                    </div>
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Description :
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $equipment->description }}
                        </dd>
                    </div>
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Quantité :
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $equipment->quantity }}
                        </dd>
                    </div>
                    
                </dl>
            </div>
            <div class="bg-gray-100 px-4 py-4 sm:px-6">
                <a href="{{ route('equipments.index') }}" class="text-indigo-600 hover:text-indigo-900">Retour à la liste des matériels</a>
            </div>
        </div>
    </div>
@endsection
