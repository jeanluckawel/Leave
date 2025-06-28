<!-- resources/views/leaves/import.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Importation de Congés</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-8">
<div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-4">Importer le rapport de congés</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('leaves.import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" class="mb-4 w-full border border-gray-300 p-2">
        <button type="submit" class="bg-black text-white px-4 py-2 rounded hover:bg-orange-600">
            Importer
        </button>
    </form>
</div>
</body>
</html>
