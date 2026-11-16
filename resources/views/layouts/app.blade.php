<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DELLSERVICE - Sistem Informasi Service Motor</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-slate-100 text-slate-800 flex min-h-screen">
    <aside class="w-72 bg-slate-900 text-white flex flex-col shadow-2xl fixed h-full z-10">
        <div class="p-6 border-b border-slate-800 flex items-center gap-3">
            <div class="bg-amber-500 text-slate-900 p-2.5 rounded-xl font-bold text-xl">
                <i class="fa-solid fa-motorcycle"></i>
            </div>
            <div>
                <h1 class="font-bold text-5xl tracking-wide text-white">Bengkel<span class="text-amber-400"> Amba</span></h1>
                <p class="text-xs text-slate-400">Official Ambatukam Garage Bukan sekadar bengkel biasa, ini adalah tempat di mana jiwa, raga, dan mesin bersatu dalam satu frekuensi yang luar biasa</p>
            </div>
        </div>
        <nav class="flex-1 p-4 space-y-2 overflow-y-auto">
            <p class="px-3 text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">Master Data</p>
            <a href="{{ route('pelanggan.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->routeIs('pelanggan.*') ? 'bg-amber-500 text-slate-900 font-semibold shadow-lg shadow-amber-500/20' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                <i class="fa-solid fa-users w-5"></i>
                <span>1. Data Pelanggan</span>
            </a>
            <a href="{{ route('kendaraan.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->routeIs('kendaraan.*') ? 'bg-amber-500 text-slate-900 font-semibold shadow-lg shadow-amber-500/20' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                <i class="fa-solid fa-gauge-high w-5"></i>
                <span>2. Data Kendaraan</span>
            </a>
            <p class="px-3 text-xs font-semibold text-slate-500 uppercase tracking-wider mt-6 mb-2">Transaksi Bengkel</p>
            <a href="{{ route('daftar-service.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->routeIs('daftar-service.*') ? 'bg-amber-500 text-slate-900 font-semibold shadow-lg shadow-amber-500/20' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                <i class="fa-solid fa-clipboard-list w-5"></i>
                <span>3. Daftar Service</span>
            </a>
            <a href="{{ route('data-service.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->routeIs('data-service.*') ? 'bg-amber-500 text-slate-900 font-semibold shadow-lg shadow-amber-500/20' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                <i class="fa-solid fa-wrench w-5"></i>
                <span>4. Data Service</span>
            </a>
            <a href="{{ route('pembayaran.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->routeIs('pembayaran.*') ? 'bg-amber-500 text-slate-900 font-semibold shadow-lg shadow-amber-500/20' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                <i class="fa-solid fa-wallet w-5"></i>
                <span>5. Pembayaran Service</span>
            </a>
        </nav>
        <div class="p-4 border-t border-slate-800 text-xs text-slate-400 text-center">
            Project Akhir Laravel & API
        </div>
    </aside>

    <main class="flex-1 ml-72 p-8">
        @if(session('success'))
            <div class="mb-6 bg-emerald-50 border-l-4 border-emerald-500 text-emerald-800 p-4 rounded-r-xl shadow-sm flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <i class="fa-solid fa-circle-check text-emerald-500 text-lg"></i>
                    <span class="font-medium">{{ session('success') }}</span>
                </div>
            </div>
        @endif
        @if($errors->any())
            <div class="mb-6 bg-rose-50 border-l-4 border-rose-500 text-rose-800 p-4 rounded-r-xl shadow-sm">
                <ul class="list-disc list-inside text-sm">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @yield('content')
    </main>
</body>
</html>
