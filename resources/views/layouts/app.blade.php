<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <title>Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('-translate-x-full');
        }
    </script>
</head>
<body class="bg-gray-100">
<div class="flex h-screen overflow-hidden">
    <!-- Sidebar -->
    <div id="sidebar" class="bg-gray-800 text-white w-64 space-y-6 py-7 px-2 absolute inset-y-0 left-0 transform -translate-x-full sm:relative sm:translate-x-0 transition duration-200 ease-in-out z-50">
        <h1 class="text-3xl font-bold text-center">LOGO</h1>
        <nav>
            <ul class="space-y-4 mt-6">
                <li><a href="/products" class="block px-4 py-2 hover:bg-gray-700 rounded">Products</a></li>
                <li><a href="/clients" class="block px-4 py-2 hover:bg-gray-700 rounded">Clients</a></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="block w-full text-left px-4 py-2 hover:bg-gray-700 rounded">Logout</button>
                    </form>
                </li>
            </ul>
        </nav>
    </div>

    <!-- Main content -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <!-- Mobile top bar -->
        <header class="sm:hidden bg-white shadow px-4 py-4 flex items-center justify-between">
            <button onclick="toggleSidebar()" class="text-gray-500 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
            <h1 class="text-xl font-bold">Dashboard</h1>
        </header>

        <main class="flex-1 overflow-y-auto p-6">
            @yield('content')
            <div id="imgModal" class="fixed inset-0 hidden bg-black bg-opacity-70 flex justify-center items-center z-50">
  <img id="modalImage" src="" class="max-w-[90%] max-h-[80%] rounded">
</div>
        </main>
    </div>
</div>
<script>
  function showModal(src) {
    document.getElementById('modalImage').src = src;
    document.getElementById('imgModal').classList.remove('hidden');
  }
  window.addEventListener('click', e => {
    if (e.target.id === 'imgModal') document.getElementById('imgModal').classList.add('hidden');
  });
</script>
</body>
</html>