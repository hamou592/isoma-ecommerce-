<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="Boutique en ligne - Découvrez nos produits exclusifs !"/>
    <title>@yield('title', 'Ma Boutique')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 text-gray-800">

    <header class="bg-white shadow-md p-4">
        <div class="max-w-6xl mx-auto flex justify-between items-center">
            <img src="{{ asset('logo.png') }}" alt="Logo" class="h-12">
        </div>
    </header>

    <main class="py-8">
        @yield('content')
    </main>

    <footer class="bg-gray-800 text-white text-center py-4">
        &copy; {{ date('Y') }} Ma Boutique. Tous droits réservés.
    </footer>

</body>
</html>
