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




        <main class="flex-1 overflow-y-auto p-4 bg-red-50 dark:bg-gray-900">
            <div class="max-w-6xl mx-auto">

                <!-- Congés Table Section -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700 flex justify-between items-center">
                        <h3 class="text-lg font-medium text-gray-800 dark:text-gray-200">
                            <i class='bx bx-calendar mr-2'></i>Liste des congés importés
                        </h3>
                        <div class="flex items-center space-x-4">
                            <button class="btn btn-red flex items-center">
                                <i class='bx bx-printer mr-2'></i> Imprimer
                            </button>
                            <button class="btn btn-blue flex items-center">
                                <i class='bx bx-download mr-2'></i> Exporter
                            </button>
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Matricule
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Nom
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Prénom
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Type de congé
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Date début
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Date fin
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            <!-- Sample Data Rows -->
                            <tr class="hover:bg-red-50 dark:hover:bg-gray-700">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-200">
                                    EMP001
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                    DIALLO
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                    Mamadou
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                    Congé annuel
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                    01/03/2023
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                    15/03/2023
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <button class="text-red-600 dark:text-red-400 hover:text-red-900 mr-3">
                                        <i class='bx bx-edit'></i>
                                    </button>
                                    <button class="text-red-600 dark:text-red-400 hover:text-red-900">
                                        <i class='bx bx-trash'></i>
                                    </button>
                                </td>
                            </tr>
                            <tr class="hover:bg-red-50 dark:hover:bg-gray-700">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-200">
                                    EMP002
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                    SOW
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                    Aminata
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                    Congé maladie
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                    05/03/2023
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                    07/03/2023
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <button class="text-red-600 dark:text-red-400 hover:text-red-900 mr-3">
                                        <i class='bx bx-edit'></i>
                                    </button>
                                    <button class="text-red-600 dark:text-red-400 hover:text-red-900">
                                        <i class='bx bx-trash'></i>
                                    </button>
                                </td>
                            </tr>
                            <tr class="hover:bg-red-50 dark:hover:bg-gray-700">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-200">
                                    EMP003
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                    BAH
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                    Ibrahima
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                    Congé exceptionnel
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                    10/03/2023
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                    12/03/2023
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <button class="text-red-600 dark:text-red-400 hover:text-red-900 mr-3">
                                        <i class='bx bx-edit'></i>
                                    </button>
                                    <button class="text-red-600 dark:text-red-400 hover:text-red-900">
                                        <i class='bx bx-trash'></i>
                                    </button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700 flex items-center justify-between">
                        <div class="text-sm text-gray-500 dark:text-gray-400">
                            Affichage de <span class="font-medium">1</span> à <span class="font-medium">3</span> sur <span class="font-medium">3</span> résultats
                        </div>
                        <div class="flex space-x-2">
                            <button class="px-3 py-1 rounded-md bg-red-50 dark:bg-gray-700 text-red-600 dark:text-red-400 font-medium">
                                1
                            </button>
                            <button class="px-3 py-1 rounded-md hover:bg-red-50 dark:hover:bg-gray-700 text-gray-600 dark:text-gray-400 font-medium">
                                2
                            </button>
                            <button class="px-3 py-1 rounded-md hover:bg-red-50 dark:hover:bg-gray-700 text-gray-600 dark:text-gray-400 font-medium">
                                Suivant <i class='bx bx-chevron-right'></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </main>













@endsection

