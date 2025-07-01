@extends('layout.app')

@section('title', 'Kamoa copper | Import Leaves')

@section('content')



<main class="flex-1 mt-10 overflow-y-auto p-4 bg-red-50 dark:bg-gray-900">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200">
                    <i class='bx bx-import mr-2'></i>Importer le rapport de congés
                </h2>
            </div>

            @if(session('success'))
                <div class="bg-green-100 dark:bg-green-900 text-green-500 dark:text-green-200 p-4 rounded mb-6 flex items-center">
                    <i class='bx bx-check-circle mr-2'></i>
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="bg-red-100 dark:bg-red-900 text-red-800 dark:text-red-200 p-4 rounded mb-6">
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('leaves.import') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Fichier Excel à importer
                    </label>
                    <div class="mt-1 flex items-center">
                        <input type="file" name="file" required
                               class="block w-full text-sm text-gray-500 dark:text-gray-400
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-red-50 file:text-red-700 dark:file:bg-gray-700 dark:file:text-red-400
                                    hover:file:bg-red-100 dark:hover:file:bg-gray-600">
                    </div>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                        Formats supportés: .xlsx, .xls, .csv
                    </p>
                </div>

                <div class="flex items-center justify-end space-x-4">
                    <button type="submit" class="btn btn-red">
                        <i class='bx bx-import mr-2'></i> Importer
                    </button>
                </div>
            </form>

            <div class="mt-8 border-t border-gray-200 dark:border-gray-700 pt-6">
                <h3 class="text-lg font-medium text-gray-800 dark:text-gray-200 mb-3">
                    <i class='bx bx-info-circle mr-2'></i>Instructions
                </h3>
                <ul class="list-disc list-inside text-gray-600 dark:text-gray-400 space-y-2">
                    <li>Assurez-vous que le fichier suit le format requis</li>
                    <li>Les colonnes obligatoires sont: Matricule, Nom, Prénom, Type de congé, Date début, Date fin</li>
                    <li>Le système validera les données avant importation</li>
                </ul>
            </div>
        </div>
    </div>
</main>
@endsection

