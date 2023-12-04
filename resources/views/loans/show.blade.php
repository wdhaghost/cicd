@extends('layouts.app')

@section('title', 'NWS - Détails de l\'Étudiant')

@section('content')
    <div class="container mx-auto mt-5">
        <h2 class="text-2xl font-semibold mb-4">Détails du prêt</h2>

        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="px-4 py-5 sm:p-6">
                <dl>
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4">
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4">
                            <dt class="text-sm leading-5 font-medium text-gray-500">
                              
                            </dt>
                            <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                             {{ $loan->student->lastname }}
                            </dd>
                        </div>
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4">
                            <dt class="text-sm leading-5 font-medium text-gray-500">
                                Prénom
                            </dt>
                            <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $loan->student->firstname }}
                            </dd>
                             <div class="sm:grid sm:grid-cols-3 sm:gap-4">
                            <dt class="text-sm leading-5 font-medium text-gray-500">
                                Matériel
                            </dt>
                            <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $loan->equipment->name }}
                            </dd>
                        </div>
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4">
                            <dt class="text-sm leading-5 font-medium text-gray-500">
                                Matériel
                            </dt>
                            <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $loan->equipment->name }}
                            </dd>
                        </div>
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Prêt
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $loan->loan_date }}
                        </dd>
                    </div>
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Date de retour
                        </dt>
                        <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $loan->return_date }}
                        </dd>
                    </div>
                    
                </dl>
            </div>
            <div class="bg-gray-100 px-4 py-4 sm:px-6">
                <a href="{{ route('loans.index') }}" class="text-indigo-600 hover:text-indigo-900">Retour à la liste des prêts</a>
            </div>
        </div>
    </div>
@endsection
