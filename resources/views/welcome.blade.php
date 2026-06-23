<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gereja Stasi Santa Elisabeth Lambanapu - Kasih, Iman & Pelayanan</title>
    
    <!-- Google Fonts: Inter & Playfair Display for Serene and Elegant typography -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">
    
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Tailwind CSS Play CDN for robust CSS layout execution -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        serif: ['Playfair Display', 'serif'],
                    },
                    colors: {
                        church: {
                            50: '#f8fafc',
                            100: '#f1f5f9',
                            800: '#0f172a',
                            900: '#020617',
                            gold: '#d97706',
                            goldlight: '#f59e0b',
                            golddark: '#b45309',
                        }
                    }
                }
            }
        }
    </script>
    
    <style>
        /* Glassmorphism custom styling */
        .glass-nav {
            background: rgba(15, 23, 42, 0.85);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }
        /* Custom animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in {
            animation: fadeIn 0.8s ease-out forwards;
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 font-sans antialiased selection:bg-amber-600 selection:text-white dark:bg-church-900 dark:text-slate-200">

    <!-- Header / Navigation -->
    <header class="fixed top-0 left-0 w-full z-50 transition-all duration-300 glass-nav border-b border-slate-800/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Logo -->
                <a href="#" class="flex items-center space-x-3 group">
                    <div class="bg-gradient-to-tr from-amber-600 to-yellow-400 p-2.5 rounded-xl shadow-lg shadow-amber-500/20 group-hover:scale-105 transition-transform duration-300">
                        <i class="fa-solid fa-church text-white text-xl"></i>
                    </div>
                    <div>
                        <span class="font-serif font-bold text-lg tracking-wide text-white group-hover:text-amber-400 transition-colors duration-300 block">Stasi St. Elisabeth</span>
                        <span class="text-[10px] tracking-widest text-amber-500 uppercase font-semibold block -mt-1">Lambanapu</span>
                    </div>
                </a>

                <!-- Desktop Nav Links -->
                <nav class="hidden md:flex items-center space-x-8">
                    <a href="#tentang" class="text-sm font-medium text-slate-300 hover:text-amber-400 transition-colors duration-200">Tentang Kami</a>
                    <a href="#jadwal" class="text-sm font-medium text-slate-300 hover:text-amber-400 transition-colors duration-200">Jadwal Pelayanan</a>
                    <a href="#sakramen" class="text-sm font-medium text-slate-300 hover:text-amber-400 transition-colors duration-200">Layanan Sakramen</a>
                    <a href="#keuangan" class="text-sm font-medium text-slate-300 hover:text-amber-400 transition-colors duration-200">Transparansi Keuangan</a>
                </nav>

                <!-- Auth/Portal Button -->
                <div class="hidden sm:block">
                    @auth
                        <a href="{{ route('dashboard') }}" class="inline-flex items-center justify-center px-5 py-2.5 rounded-xl text-sm font-medium text-white bg-gradient-to-r from-amber-600 to-amber-500 hover:from-amber-500 hover:to-amber-400 shadow-md shadow-amber-900/30 transition-all duration-300 hover:shadow-lg hover:shadow-amber-500/20 hover:-translate-y-0.5">
                            <i class="fa-solid fa-columns mr-2"></i> Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="inline-flex items-center justify-center px-5 py-2.5 rounded-xl text-sm font-medium text-white bg-slate-800 hover:bg-slate-700 border border-slate-700/80 transition-all duration-300 hover:border-amber-500/50">
                            <i class="fa-solid fa-right-to-bracket mr-2 text-amber-500"></i> Portal Petugas
                        </a>
                    @endauth
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden flex items-center">
                    <button id="mobile-menu-btn" class="text-slate-300 hover:text-white focus:outline-none" onclick="toggleMobileMenu()">
                        <i class="fa-solid fa-bars text-2xl"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-slate-900 border-b border-slate-800 px-4 pt-2 pb-6 space-y-3">
            <a href="#tentang" class="block px-3 py-2 rounded-lg text-base font-medium text-slate-300 hover:bg-slate-800 hover:text-white" onclick="toggleMobileMenu()">Tentang Kami</a>
            <a href="#jadwal" class="block px-3 py-2 rounded-lg text-base font-medium text-slate-300 hover:bg-slate-800 hover:text-white" onclick="toggleMobileMenu()">Jadwal Pelayanan</a>
            <a href="#sakramen" class="block px-3 py-2 rounded-lg text-base font-medium text-slate-300 hover:bg-slate-800 hover:text-white" onclick="toggleMobileMenu()">Layanan Sakramen</a>
            <a href="#keuangan" class="block px-3 py-2 rounded-lg text-base font-medium text-slate-300 hover:bg-slate-800 hover:text-white" onclick="toggleMobileMenu()">Transparansi Keuangan</a>
            <div class="pt-4 border-t border-slate-800">
                @auth
                    <a href="{{ route('dashboard') }}" class="w-full inline-flex items-center justify-center px-4 py-2.5 rounded-xl text-base font-medium text-white bg-amber-600 hover:bg-amber-500">
                        <i class="fa-solid fa-columns mr-2"></i> Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="w-full inline-flex items-center justify-center px-4 py-2.5 rounded-xl text-base font-medium text-white bg-slate-800 hover:bg-slate-700 border border-slate-700">
                        <i class="fa-solid fa-right-to-bracket mr-2 text-amber-500"></i> Portal Petugas
                    </a>
                @endauth
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="relative bg-church-800 text-white pt-32 pb-24 md:pt-44 md:pb-40 overflow-hidden">
        <!-- Background stained glass glow effects -->
        <div class="absolute inset-0 z-0">
            <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-amber-500/10 rounded-full blur-[100px]"></div>
            <div class="absolute bottom-1/3 right-1/4 w-96 h-96 bg-blue-600/10 rounded-full blur-[100px]"></div>
            <!-- Overlay Pattern / Subtle Grid -->
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_80%_80%_at_50%_-20%,rgba(120,119,198,0.15),rgba(255,255,255,0))]"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center animate-fade-in">
            <!-- Cross Icon Glow -->
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-slate-800/80 border border-amber-500/30 mb-8 shadow-inner shadow-amber-500/10">
                <i class="fa-solid fa-cross text-amber-500 text-2xl"></i>
            </div>
            
            <h1 class="text-4xl sm:text-5xl md:text-6xl font-serif font-bold tracking-tight text-white mb-6">
                Selamat Datang di <span class="bg-gradient-to-r from-amber-400 via-amber-200 to-yellow-400 bg-clip-text text-transparent">Stasi Santa Elisabeth Lambanapu</span>
            </h1>
            
            <p class="max-w-2xl mx-auto text-lg sm:text-xl text-slate-300 leading-relaxed mb-10 font-light">
                “Sebab di mana dua atau tiga orang berkumpul dalam Nama-Ku, di situ Aku ada di tengah-tengah mereka.” <span class="text-amber-400 block font-serif italic mt-2 text-base">— Matius 18:20</span>
            </p>

            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="#jadwal" class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-4 rounded-xl text-base font-semibold text-white bg-gradient-to-r from-amber-600 to-amber-500 hover:from-amber-500 hover:to-amber-400 shadow-xl shadow-amber-950/40 hover:shadow-amber-500/20 transition-all duration-300 hover:-translate-y-0.5">
                    <i class="fa-solid fa-calendar-days mr-2"></i> Jadwal Ibadah
                </a>
                <a href="#tentang" class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-4 rounded-xl text-base font-semibold text-slate-300 bg-slate-800/60 hover:bg-slate-800 hover:text-white border border-slate-700/60 transition-all duration-300">
                    Pelajari Selengkapnya
                </a>
            </div>
        </div>
    </section>

    <!-- Statistics Quick Bar -->
    <section class="-mt-8 relative z-20 max-w-5xl mx-auto px-4 sm:px-6">
        <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-xl border border-slate-200/50 dark:border-slate-700/50 p-6 sm:p-8 grid grid-cols-1 md:grid-cols-3 gap-6 divide-y md:divide-y-0 md:divide-x divide-slate-100 dark:divide-slate-700">
            <!-- Stat 1 -->
            <div class="flex items-center space-x-4 pb-6 md:pb-0 md:pr-6">
                <div class="flex-shrink-0 w-12 h-12 bg-amber-100 dark:bg-amber-900/40 rounded-xl flex items-center justify-center text-amber-600 dark:text-amber-400">
                    <i class="fa-solid fa-users text-xl"></i>
                </div>
                <div>
                    <p class="text-2xl font-bold dark:text-white">{{ $totalJemaat ?? 0 }}</p>
                    <p class="text-xs text-slate-500 dark:text-slate-400 uppercase font-semibold tracking-wider">Jemaat Terdaftar</p>
                </div>
            </div>
            
            <!-- Stat 2 -->
            <div class="flex items-center space-x-4 py-6 md:py-0 md:px-6">
                <div class="flex-shrink-0 w-12 h-12 bg-amber-100 dark:bg-amber-900/40 rounded-xl flex items-center justify-center text-amber-600 dark:text-amber-400">
                    <i class="fa-solid fa-cross text-xl"></i>
                </div>
                <div>
                    <p class="text-2xl font-bold dark:text-white">{{ $totalSakramen ?? 0 }}</p>
                    <p class="text-xs text-slate-500 dark:text-slate-400 uppercase font-semibold tracking-wider">Sakramen Terlayani</p>
                </div>
            </div>

            <!-- Stat 3 -->
            <div class="flex items-center space-x-4 pt-6 md:pt-0 md:pl-6">
                <div class="flex-shrink-0 w-12 h-12 bg-amber-100 dark:bg-amber-900/40 rounded-xl flex items-center justify-center text-amber-600 dark:text-amber-400">
                    <i class="fa-solid fa-wallet text-xl"></i>
                </div>
                <div>
                    <p class="text-2xl font-bold dark:text-white">Rp {{ number_format($saldo ?? 0, 0, ',', '.') }}</p>
                    <p class="text-xs text-slate-500 dark:text-slate-400 uppercase font-semibold tracking-wider">Saldo Kas Gereja</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Tentang Kami Section -->
    <section id="tentang" class="py-20 md:py-28">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center">
                <!-- Visual/Image Column -->
                <div class="relative">
                    <div class="absolute -top-4 -left-4 w-72 h-72 bg-amber-500/10 rounded-full blur-[60px] dark:bg-amber-500/5"></div>
                    <!-- Aesthetic SVG Architecture graphic instead of a plain image -->
                    <div class="relative bg-gradient-to-br from-slate-900 to-church-800 rounded-3xl overflow-hidden shadow-2xl border border-slate-700/50 p-8 sm:p-12 text-center aspect-video sm:aspect-square flex flex-col justify-center items-center">
                        <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#e5e7eb_1px,transparent_1px)] [background-size:16px_16px]"></div>
                        <i class="fa-solid fa-church text-amber-500/20 text-9xl absolute -bottom-6 -right-6 transform rotate-12"></i>
                        
                        <div class="relative z-10 space-y-6">
                            <i class="fa-solid fa-bible text-amber-500 text-5xl mb-2"></i>
                            <h3 class="font-serif text-2xl font-semibold text-white">Visi & Misi Kami</h3>
                            <p class="text-slate-300 text-sm leading-relaxed max-w-sm mx-auto">
                                "Menjadi jemaat yang bertumbuh secara rohani, giat dalam bersekutu, tulus dalam melayani, serta memancarkan kasih Kristus bagi lingkungan sekitar."
                            </p>
                            <div class="inline-flex space-x-2 text-xs text-amber-400 font-semibold uppercase tracking-widest bg-amber-500/10 px-4 py-1.5 rounded-full border border-amber-500/20">
                                <span>Kasih</span> &bull; <span>Iman</span> &bull; <span>Pelayanan</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Text Content Column -->
                <div class="space-y-6">
                    <span class="text-xs uppercase tracking-widest text-amber-600 dark:text-amber-500 font-bold block">Profil Gereja</span>
                    <h2 class="text-3xl sm:text-4xl font-serif font-bold text-slate-900 dark:text-white leading-tight">
                        Melayani Tuhan dengan Sukacita dan Ketulusan Hati
                    </h2>
                    <p class="text-slate-600 dark:text-slate-400 leading-relaxed">
                        Gereja Stasi Santa Elisabeth Lambanapu adalah wadah persekutuan bagi setiap insan yang rindu mencari kebenaran firman Tuhan dan bertumbuh bersama dalam iman. Kami berkomitmen untuk membangun karakter jemaat yang berlandaskan kasih Kristus melalui berbagai program ibadah, pembinaan pemuda, pendalaman Alkitab, dan aksi sosial kemasyarakatan.
                    </p>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 pt-4">
                        <div class="flex items-start space-x-3">
                            <i class="fa-solid fa-check-circle text-amber-500 mt-1 text-lg"></i>
                            <div>
                                <h4 class="font-semibold text-slate-800 dark:text-white">Persekutuan yang Hangat</h4>
                                <p class="text-sm text-slate-500 dark:text-slate-400">Menyambut setiap jiwa dengan kasih persaudaraan.</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3">
                            <i class="fa-solid fa-check-circle text-amber-500 mt-1 text-lg"></i>
                            <div>
                                <h4 class="font-semibold text-slate-800 dark:text-white">Pelayanan Sakramen</h4>
                                <p class="text-sm text-slate-500 dark:text-slate-400">Penyelenggaraan sakramen gereja yang tertata.</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3">
                            <i class="fa-solid fa-check-circle text-amber-500 mt-1 text-lg"></i>
                            <div>
                                <h4 class="font-semibold text-slate-800 dark:text-white">Transparansi Finansial</h4>
                                <p class="text-sm text-slate-500 dark:text-slate-400">Pengelolaan dana kas gereja yang transparan dan akuntabel.</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3">
                            <i class="fa-solid fa-check-circle text-amber-500 mt-1 text-lg"></i>
                            <div>
                                <h4 class="font-semibold text-slate-800 dark:text-white">Pembinaan Anggota</h4>
                                <p class="text-sm text-slate-500 dark:text-slate-400">Program katekisasi, sekolah minggu, dan pemuda.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Jadwal Pelayanan Section -->
    <section id="jadwal" class="py-20 md:py-28 bg-slate-100 dark:bg-slate-900/50 border-y border-slate-200/50 dark:border-slate-800/40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-xs uppercase tracking-widest text-amber-600 dark:text-amber-500 font-bold block mb-2">Jadwal Minggu Ini</span>
                <h2 class="text-3xl sm:text-4xl font-serif font-bold text-slate-900 dark:text-white">Jadwal Pelayanan & Ibadah</h2>
                <div class="w-16 h-1 bg-amber-500 mx-auto mt-4 rounded-full"></div>
                <p class="text-slate-500 dark:text-slate-400 mt-4">
                    Mari bergabung dalam ibadah bersama kami. Berikut adalah jadwal kegiatan pelayanan dan ibadah terdekat.
                </p>
            </div>

            @if($upcomingSchedules && $upcomingSchedules->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach($upcomingSchedules as $schedule)
                        <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-md border border-slate-100 dark:border-slate-700/30 overflow-hidden hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col h-full">
                            <div class="bg-gradient-to-r from-amber-600 to-amber-500 px-6 py-4 text-white">
                                <span class="text-[10px] uppercase font-bold tracking-wider opacity-90"><i class="fa-regular fa-clock mr-1"></i> Ibadah Terdekat</span>
                                <h3 class="font-semibold text-lg line-clamp-1 mt-1">{{ $schedule->nama_kegiatan }}</h3>
                            </div>
                            
                            <div class="p-6 space-y-4 flex-grow">
                                <div class="flex items-start space-x-3 text-sm">
                                    <i class="fa-solid fa-calendar text-amber-500 mt-1 flex-shrink-0 w-4"></i>
                                    <div>
                                        <p class="font-medium text-slate-800 dark:text-slate-200">Hari & Tanggal</p>
                                        <p class="text-slate-500 dark:text-slate-400 text-xs">{{ $schedule->waktu_mulai->translatedFormat('l, d F Y') }}</p>
                                    </div>
                                </div>
                                
                                <div class="flex items-start space-x-3 text-sm">
                                    <i class="fa-regular fa-clock text-amber-500 mt-1 flex-shrink-0 w-4"></i>
                                    <div>
                                        <p class="font-medium text-slate-800 dark:text-slate-200">Waktu</p>
                                        <p class="text-slate-500 dark:text-slate-400 text-xs">
                                            {{ $schedule->waktu_mulai->format('H:i') }} - {{ $schedule->waktu_selesai ? $schedule->waktu_selesai->format('H:i') : 'Selesai' }} WIB
                                        </p>
                                    </div>
                                </div>

                                <div class="flex items-start space-x-3 text-sm">
                                    <i class="fa-solid fa-location-dot text-amber-500 mt-1 flex-shrink-0 w-4"></i>
                                    <div>
                                        <p class="font-medium text-slate-800 dark:text-slate-200">Lokasi</p>
                                        <p class="text-slate-500 dark:text-slate-400 text-xs">{{ $schedule->lokasi }}</p>
                                    </div>
                                </div>

                                @if($schedule->deskripsi)
                                    <p class="text-xs text-slate-500 dark:text-slate-400 pt-2 border-t border-slate-100 dark:border-slate-700/30">
                                        {{ Str::limit($schedule->deskripsi, 80) }}
                                    </p>
                                @endif

                                @if($schedule->petugas && $schedule->petugas->count() > 0)
                                    <div class="pt-3 border-t border-slate-100 dark:border-slate-700/30">
                                        <p class="text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1.5 uppercase tracking-wider">Petugas Pelayan:</p>
                                        <div class="flex flex-wrap gap-1">
                                            @foreach($schedule->petugas as $p)
                                                <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-medium bg-slate-100 dark:bg-slate-700 text-slate-800 dark:text-slate-200 border border-slate-200/50 dark:border-slate-600/30">
                                                    {{ $p->jemaat->nama ?? 'Petugas' }} ({{ $p->peran }})
                                                </span>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <!-- Fallback / Regular Schedule Card Layout (Always populated so landing page is majestic) -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Card 1 -->
                    <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-md border border-slate-100 dark:border-slate-700/30 overflow-hidden hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col h-full">
                        <div class="bg-gradient-to-r from-amber-600 to-amber-500 px-6 py-4 text-white">
                            <span class="text-[10px] uppercase font-bold tracking-wider opacity-90"><i class="fa-regular fa-clock mr-1"></i> Jadwal Mingguan</span>
                            <h3 class="font-semibold text-lg line-clamp-1 mt-1">Ibadah Raya Minggu</h3>
                        </div>
                        <div class="p-6 space-y-4 flex-grow">
                            <div class="flex items-start space-x-3 text-sm">
                                <i class="fa-solid fa-calendar text-amber-500 mt-1 flex-shrink-0 w-4"></i>
                                <div>
                                    <p class="font-medium text-slate-800 dark:text-slate-200">Hari & Tanggal</p>
                                    <p class="text-slate-500 dark:text-slate-400 text-xs">Setiap Hari Minggu</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start space-x-3 text-sm">
                                <i class="fa-regular fa-clock text-amber-500 mt-1 flex-shrink-0 w-4"></i>
                                <div>
                                    <p class="font-medium text-slate-800 dark:text-slate-200">Waktu</p>
                                    <p class="text-slate-500 dark:text-slate-400 text-xs">09:00 - 11:00 WIB</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-3 text-sm">
                                <i class="fa-solid fa-location-dot text-amber-500 mt-1 flex-shrink-0 w-4"></i>
                                <div>
                                    <p class="font-medium text-slate-800 dark:text-slate-200">Lokasi</p>
                                    <p class="text-slate-500 dark:text-slate-400 text-xs">Gereja Stasi Lambanapu</p>
                                </div>
                            </div>
                            
                            <p class="text-xs text-slate-500 dark:text-slate-400 pt-2 border-t border-slate-100 dark:border-slate-700/30">
                                Ibadah mingguan bersama seluruh keluarga jemaat, disertai sakramen perjamuan kudus berkala.
                            </p>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-md border border-slate-100 dark:border-slate-700/30 overflow-hidden hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col h-full">
                        <div class="bg-gradient-to-r from-amber-600 to-amber-500 px-6 py-4 text-white">
                            <span class="text-[10px] uppercase font-bold tracking-wider opacity-90"><i class="fa-regular fa-clock mr-1"></i> Jadwal Mingguan</span>
                            <h3 class="font-semibold text-lg line-clamp-1 mt-1">Ibadah Pemuda & Remaja</h3>
                        </div>
                        <div class="p-6 space-y-4 flex-grow">
                            <div class="flex items-start space-x-3 text-sm">
                                <i class="fa-solid fa-calendar text-amber-500 mt-1 flex-shrink-0 w-4"></i>
                                <div>
                                    <p class="font-medium text-slate-800 dark:text-slate-200">Hari & Tanggal</p>
                                    <p class="text-slate-500 dark:text-slate-400 text-xs">Setiap Hari Sabtu</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start space-x-3 text-sm">
                                <i class="fa-regular fa-clock text-amber-500 mt-1 flex-shrink-0 w-4"></i>
                                <div>
                                    <p class="font-medium text-slate-800 dark:text-slate-200">Waktu</p>
                                    <p class="text-slate-500 dark:text-slate-400 text-xs">17:00 - 18:30 WIB</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-3 text-sm">
                                <i class="fa-solid fa-location-dot text-amber-500 mt-1 flex-shrink-0 w-4"></i>
                                <div>
                                    <p class="font-medium text-slate-800 dark:text-slate-200">Lokasi</p>
                                    <p class="text-slate-500 dark:text-slate-400 text-xs">Gedung Pembinaan Stasi Lambanapu</p>
                                </div>
                            </div>
                            
                            <p class="text-xs text-slate-500 dark:text-slate-400 pt-2 border-t border-slate-100 dark:border-slate-700/30">
                                Persekutuan kreatif khusus bagi generasi muda dan remaja gereja untuk berkreasi dan berbagi kasih firman.
                            </p>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-md border border-slate-100 dark:border-slate-700/30 overflow-hidden hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col h-full">
                        <div class="bg-gradient-to-r from-amber-600 to-amber-500 px-6 py-4 text-white">
                            <span class="text-[10px] uppercase font-bold tracking-wider opacity-90"><i class="fa-regular fa-clock mr-1"></i> Jadwal Mingguan</span>
                            <h3 class="font-semibold text-lg line-clamp-1 mt-1">Sekolah Minggu Anak</h3>
                        </div>
                        <div class="p-6 space-y-4 flex-grow">
                            <div class="flex items-start space-x-3 text-sm">
                                <i class="fa-solid fa-calendar text-amber-500 mt-1 flex-shrink-0 w-4"></i>
                                <div>
                                    <p class="font-medium text-slate-800 dark:text-slate-200">Hari & Tanggal</p>
                                    <p class="text-slate-500 dark:text-slate-400 text-xs">Setiap Hari Minggu</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start space-x-3 text-sm">
                                <i class="fa-regular fa-clock text-amber-500 mt-1 flex-shrink-0 w-4"></i>
                                <div>
                                    <p class="font-medium text-slate-800 dark:text-slate-200">Waktu</p>
                                    <p class="text-slate-500 dark:text-slate-400 text-xs">09:00 - 10:30 WIB</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-3 text-sm">
                                <i class="fa-solid fa-location-dot text-amber-500 mt-1 flex-shrink-0 w-4"></i>
                                <div>
                                    <p class="font-medium text-slate-800 dark:text-slate-200">Lokasi</p>
                                    <p class="text-slate-500 dark:text-slate-400 text-xs">Aula Serbaguna Lantai 1</p>
                                </div>
                            </div>
                            
                            <p class="text-xs text-slate-500 dark:text-slate-400 pt-2 border-t border-slate-100 dark:border-slate-700/30">
                                Pembelajaran firman Tuhan yang menyenangkan, bernyanyi, dan bermain bersama guru sekolah minggu.
                            </p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <!-- Layanan Sakramen Section -->
    <section id="sakramen" class="py-20 md:py-28">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-xs uppercase tracking-widest text-amber-600 dark:text-amber-500 font-bold block mb-2">Layanan Administrasi</span>
                <h2 class="text-3xl sm:text-4xl font-serif font-bold text-slate-900 dark:text-white">Pelayanan Sakramen Gereja</h2>
                <div class="w-16 h-1 bg-amber-500 mx-auto mt-4 rounded-full"></div>
                <p class="text-slate-500 dark:text-slate-400 mt-4">
                    Gereja kami melayani pencatatan dan pelaksanaan sakramen penting bagi iman jemaat. Pelayanan ini dapat diajukan secara online oleh jemaat melalui portal admin.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Baptis Card -->
                <div class="bg-white dark:bg-slate-800 p-6 rounded-2xl shadow-sm border border-slate-200/50 dark:border-slate-700/50 hover:shadow-md transition-all duration-300">
                    <div class="w-12 h-12 bg-amber-100 dark:bg-amber-900/40 rounded-xl flex items-center justify-center text-amber-600 dark:text-amber-400 mb-6">
                        <i class="fa-solid fa-droplet text-xl"></i>
                    </div>
                    <h3 class="font-serif font-semibold text-lg text-slate-800 dark:text-white mb-2">Baptis Kudus</h3>
                    <p class="text-xs text-slate-500 dark:text-slate-400 leading-relaxed mb-4">
                        Penerimaan sakramen baptisan anak maupun baptisan dewasa sebagai tanda penyerahan diri dan persekutuan baru di dalam Kristus.
                    </p>
                    <span class="text-[10px] font-semibold text-amber-600 dark:text-amber-400 uppercase tracking-wider bg-amber-500/10 dark:bg-amber-900/30 px-3 py-1 rounded-full">Tersedia</span>
                </div>

                <!-- Komuni Card -->
                <div class="bg-white dark:bg-slate-800 p-6 rounded-2xl shadow-sm border border-slate-200/50 dark:border-slate-700/50 hover:shadow-md transition-all duration-300">
                    <div class="w-12 h-12 bg-amber-100 dark:bg-amber-900/40 rounded-xl flex items-center justify-center text-amber-600 dark:text-amber-400 mb-6">
                        <i class="fa-solid fa-cookie text-xl"></i>
                    </div>
                    <h3 class="font-serif font-semibold text-lg text-slate-800 dark:text-white mb-2">Perjamuan Kudus</h3>
                    <p class="text-xs text-slate-500 dark:text-slate-400 leading-relaxed mb-4">
                        Penyelenggaraan sakramen perjamuan kudus rutin sebagai wujud mengenang pengorbanan tubuh dan darah Yesus Kristus di kayu salib.
                    </p>
                    <span class="text-[10px] font-semibold text-amber-600 dark:text-amber-400 uppercase tracking-wider bg-amber-500/10 dark:bg-amber-900/30 px-3 py-1 rounded-full">Rutin</span>
                </div>

                <!-- Krisma (Sidi) Card -->
                <div class="bg-white dark:bg-slate-800 p-6 rounded-2xl shadow-sm border border-slate-200/50 dark:border-slate-700/50 hover:shadow-md transition-all duration-300">
                    <div class="w-12 h-12 bg-amber-100 dark:bg-amber-900/40 rounded-xl flex items-center justify-center text-amber-600 dark:text-amber-400 mb-6">
                        <i class="fa-solid fa-graduation-cap text-xl"></i>
                    </div>
                    <h3 class="font-serif font-semibold text-lg text-slate-800 dark:text-white mb-2">Krisma / Sidi</h3>
                    <p class="text-xs text-slate-500 dark:text-slate-400 leading-relaxed mb-4">
                        Kelas peneguhan iman (sidi) bagi jemaat remaja/dewasa yang telah mengikuti kelas pembinaan katekisasi untuk menyatakan iman secara mandiri.
                    </p>
                    <span class="text-[10px] font-semibold text-amber-600 dark:text-amber-400 uppercase tracking-wider bg-amber-500/10 dark:bg-amber-900/30 px-3 py-1 rounded-full">Musiman</span>
                </div>

                <!-- Pernikahan Card -->
                <div class="bg-white dark:bg-slate-800 p-6 rounded-2xl shadow-sm border border-slate-200/50 dark:border-slate-700/50 hover:shadow-md transition-all duration-300">
                    <div class="w-12 h-12 bg-amber-100 dark:bg-amber-900/40 rounded-xl flex items-center justify-center text-amber-600 dark:text-amber-400 mb-6">
                        <i class="fa-solid fa-ring text-xl"></i>
                    </div>
                    <h3 class="font-serif font-semibold text-lg text-slate-800 dark:text-white mb-2">Pernikahan Kudus</h3>
                    <p class="text-xs text-slate-500 dark:text-slate-400 leading-relaxed mb-4">
                        Pelayanan pemberkatan nikah kudus bagi pasangan jemaat yang dipersatukan di hadapan Allah, diawali dengan pembinaan pranikah.
                    </p>
                    <span class="text-[10px] font-semibold text-amber-600 dark:text-amber-400 uppercase tracking-wider bg-amber-500/10 dark:bg-amber-900/30 px-3 py-1 rounded-full">Tersedia</span>
                </div>
            </div>
            
            <div class="mt-12 text-center bg-amber-50 dark:bg-slate-800 rounded-2xl p-6 sm:p-8 border border-amber-200/50 dark:border-slate-700">
                <p class="text-sm text-slate-700 dark:text-slate-300 mb-4 max-w-2xl mx-auto">
                    Untuk mendaftarkan sakramen baptisan, krisma, atau pernikahan, silakan masuk ke portal petugas jemaat atau menghubungi sekretariat untuk dibantu oleh petugas admin gereja kami.
                </p>
                @auth
                    <a href="{{ route('dashboard') }}" class="inline-flex items-center px-6 py-3 bg-amber-600 hover:bg-amber-500 text-white rounded-xl text-sm font-semibold transition-all duration-300 shadow-md shadow-amber-900/10">
                        <i class="fa-solid fa-arrow-right mr-2"></i> Ajukan via Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="inline-flex items-center px-6 py-3 bg-amber-600 hover:bg-amber-500 text-white rounded-xl text-sm font-semibold transition-all duration-300 shadow-md shadow-amber-950/20">
                        <i class="fa-solid fa-arrow-right mr-2"></i> Ajukan Sekarang (Login)
                    </a>
                @endauth
            </div>
        </div>
    </section>

    <!-- Transparansi Keuangan Section -->
    <section id="keuangan" class="py-20 md:py-28 bg-slate-100 dark:bg-slate-900/50 border-t border-slate-200/50 dark:border-slate-800/40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-xs uppercase tracking-widest text-amber-600 dark:text-amber-500 font-bold block mb-2">Akuntabilitas & Keterbukaan</span>
                <h2 class="text-3xl sm:text-4xl font-serif font-bold text-slate-900 dark:text-white">Transparansi Laporan Keuangan</h2>
                <div class="w-16 h-1 bg-amber-500 mx-auto mt-4 rounded-full"></div>
                <p class="text-slate-500 dark:text-slate-400 mt-4">
                    Sebagai wujud pertanggungjawaban di hadapan jemaat dan Tuhan, kami menyediakan ringkasan laporan arus kas keuangan gereja secara berkala.
                </p>
            </div>

            <!-- Financial Summary Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
                <!-- Total Income Card -->
                <div class="bg-white dark:bg-slate-800 p-6 rounded-2xl shadow-sm border border-slate-200/50 dark:border-slate-700/50 flex items-center justify-between">
                    <div>
                        <p class="text-xs text-slate-500 dark:text-slate-400 uppercase font-semibold tracking-wider">Total Pemasukan</p>
                        <p class="text-2xl font-bold text-emerald-600 dark:text-emerald-400 mt-1">
                            Rp {{ number_format($pemasukan ?? 0, 0, ',', '.') }}
                        </p>
                    </div>
                    <div class="w-12 h-12 bg-emerald-100 dark:bg-emerald-950/40 text-emerald-600 dark:text-emerald-400 rounded-xl flex items-center justify-center">
                        <i class="fa-solid fa-arrow-down-long text-xl"></i>
                    </div>
                </div>

                <!-- Total Expense Card -->
                <div class="bg-white dark:bg-slate-800 p-6 rounded-2xl shadow-sm border border-slate-200/50 dark:border-slate-700/50 flex items-center justify-between">
                    <div>
                        <p class="text-xs text-slate-500 dark:text-slate-400 uppercase font-semibold tracking-wider">Total Pengeluaran</p>
                        <p class="text-2xl font-bold text-rose-600 dark:text-rose-400 mt-1">
                            Rp {{ number_format($pengeluaran ?? 0, 0, ',', '.') }}
                        </p>
                    </div>
                    <div class="w-12 h-12 bg-rose-100 dark:bg-rose-950/40 text-rose-600 dark:text-rose-400 rounded-xl flex items-center justify-center">
                        <i class="fa-solid fa-arrow-up-long text-xl"></i>
                    </div>
                </div>

                <!-- Net Balance Card -->
                <div class="bg-white dark:bg-slate-800 p-6 rounded-2xl shadow-sm border border-slate-200/50 dark:border-slate-700/50 flex items-center justify-between">
                    <div>
                        <p class="text-xs text-slate-500 dark:text-slate-400 uppercase font-semibold tracking-wider">Saldo Kas Aktif</p>
                        <p class="text-2xl font-bold text-amber-600 dark:text-amber-400 mt-1">
                            Rp {{ number_format($saldo ?? 0, 0, ',', '.') }}
                        </p>
                    </div>
                    <div class="w-12 h-12 bg-amber-100 dark:bg-amber-950/40 text-amber-600 dark:text-amber-400 rounded-xl flex items-center justify-center">
                        <i class="fa-solid fa-scale-balanced text-xl"></i>
                    </div>
                </div>
            </div>

            <!-- Recent Transactions Table -->
            <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-md border border-slate-200/50 dark:border-slate-700/50 overflow-hidden">
                <div class="px-6 py-5 border-b border-slate-100 dark:border-slate-700/50 flex items-center justify-between">
                    <h3 class="font-serif font-semibold text-lg text-slate-800 dark:text-white">Aliran Kas Terkini</h3>
                    <span class="text-xs text-slate-500 dark:text-slate-400 italic">Diperbarui realtime</span>
                </div>
                
                @if($latestTransactions && $latestTransactions->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse text-sm">
                            <thead>
                                <tr class="bg-slate-50 dark:bg-slate-900/60 border-b border-slate-100 dark:border-slate-700/50">
                                    <th class="px-6 py-4 font-semibold text-slate-600 dark:text-slate-300">Tanggal</th>
                                    <th class="px-6 py-4 font-semibold text-slate-600 dark:text-slate-300">No. Transaksi</th>
                                    <th class="px-6 py-4 font-semibold text-slate-600 dark:text-slate-300">Kategori</th>
                                    <th class="px-6 py-4 font-semibold text-slate-600 dark:text-slate-300">Keterangan</th>
                                    <th class="px-6 py-4 font-semibold text-slate-600 dark:text-slate-300 text-center">Tipe</th>
                                    <th class="px-6 py-4 font-semibold text-slate-600 dark:text-slate-300 text-right">Jumlah</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 dark:divide-slate-700/50">
                                @foreach($latestTransactions as $tx)
                                    <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-900/20 transition-colors duration-150">
                                        <td class="px-6 py-4 whitespace-nowrap text-xs text-slate-500 dark:text-slate-400">
                                            {{ $tx->tanggal_transaksi->translatedFormat('d M Y') }}
                                        </td>
                                        <td class="px-6 py-4 font-mono text-xs font-semibold text-slate-600 dark:text-slate-300">
                                            {{ $tx->nomor_transaksi }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-slate-800 dark:text-slate-200">
                                            {{ $tx->kategori }}
                                        </td>
                                        <td class="px-6 py-4 text-slate-500 dark:text-slate-400 max-w-xs truncate">
                                            {{ $tx->keterangan ?? '-' }}
                                        </td>
                                        <td class="px-6 py-4 text-center whitespace-nowrap">
                                            @if($tx->tipe === 'Pemasukan')
                                                <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-semibold bg-emerald-100 dark:bg-emerald-950/40 text-emerald-800 dark:text-emerald-400 border border-emerald-200/55 dark:border-emerald-700/30">
                                                    Pemasukan
                                                </span>
                                            @else
                                                <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-semibold bg-rose-100 dark:bg-rose-950/40 text-rose-800 dark:text-rose-400 border border-rose-200/55 dark:border-rose-700/30">
                                                    Pengeluaran
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right font-semibold {{ $tx->tipe === 'Pemasukan' ? 'text-emerald-600 dark:text-emerald-400' : 'text-rose-600 dark:text-rose-400' }}">
                                            {{ $tx->tipe === 'Pemasukan' ? '+' : '-' }} Rp {{ number_format($tx->jumlah, 0, ',', '.') }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <!-- Fallback if no transactions exist in the database -->
                    <div class="p-8 text-center text-slate-500 dark:text-slate-400 flex flex-col items-center justify-center space-y-3">
                        <i class="fa-solid fa-folder-open text-4xl text-slate-300 dark:text-slate-600"></i>
                        <p class="font-medium">Belum ada catatan keuangan yang dirilis.</p>
                        <p class="text-xs max-w-sm mx-auto text-slate-400">Arus kas akan terisi secara otomatis ketika bendahara merekam mutasi keuangan baru.</p>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-church-800 text-white border-t border-slate-800 pt-16 pb-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-10 mb-12">
                <!-- Info Column -->
                <div class="space-y-4 md:col-span-2">
                    <div class="flex items-center space-x-3">
                        <div class="bg-amber-600 p-2 rounded-lg">
                            <i class="fa-solid fa-church text-white"></i>
                        </div>
                        <span class="font-serif font-bold text-lg text-white">Stasi Santa Elisabeth Lambanapu</span>
                    </div>
                    <p class="text-xs text-slate-400 leading-relaxed max-w-sm">
                        Kami adalah persekutuan jemaat yang berpusat pada Kristus, melayani dengan kerendahan hati, terbuka bagi setiap orang, dan berupaya membawa damai sejahtera bagi dunia.
                    </p>
                    <p class="text-xs text-slate-400">
                        <i class="fa-solid fa-location-dot text-amber-500 mr-2"></i> Jalan Lambanapu No. 404, Sumba, Indonesia
                    </p>
                </div>

                <!-- Navigation Links Column -->
                <div>
                    <h4 class="text-sm font-semibold uppercase tracking-wider text-amber-500 mb-4">Navigasi</h4>
                    <ul class="space-y-2 text-xs text-slate-400">
                        <li><a href="#tentang" class="hover:text-amber-400 transition-colors duration-200">Tentang Kami</a></li>
                        <li><a href="#jadwal" class="hover:text-amber-400 transition-colors duration-200">Jadwal Pelayanan</a></li>
                        <li><a href="#sakramen" class="hover:text-amber-400 transition-colors duration-200">Layanan Sakramen</a></li>
                        <li><a href="#keuangan" class="hover:text-amber-400 transition-colors duration-200">Laporan Keuangan</a></li>
                    </ul>
                </div>

                <!-- Contact & Social Column -->
                <div>
                    <h4 class="text-sm font-semibold uppercase tracking-wider text-amber-500 mb-4">Hubungi Kami</h4>
                    <ul class="space-y-2 text-xs text-slate-400">
                        <li><i class="fa-solid fa-phone text-amber-500 mr-2"></i> (021) 1234-5678</li>
                        <li><i class="fa-solid fa-envelope text-amber-500 mr-2"></i> info@stasilambanapu.or.id</li>
                        <li><i class="fa-brands fa-whatsapp text-amber-500 mr-2"></i> +62 812-3456-7890</li>
                    </ul>
                    <div class="flex space-x-3 mt-4">
                        <a href="#" class="w-8 h-8 rounded-lg bg-slate-800 hover:bg-amber-600 flex items-center justify-center transition-colors duration-200 text-slate-300 hover:text-white">
                            <i class="fa-brands fa-facebook-f text-sm"></i>
                        </a>
                        <a href="#" class="w-8 h-8 rounded-lg bg-slate-800 hover:bg-amber-600 flex items-center justify-center transition-colors duration-200 text-slate-300 hover:text-white">
                            <i class="fa-brands fa-instagram text-sm"></i>
                        </a>
                        <a href="#" class="w-8 h-8 rounded-lg bg-slate-800 hover:bg-amber-600 flex items-center justify-center transition-colors duration-200 text-slate-300 hover:text-white">
                            <i class="fa-brands fa-youtube text-sm"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Bottom Bar -->
            <div class="pt-8 border-t border-slate-800 text-center flex flex-col sm:flex-row items-center justify-between text-xs text-slate-500">
                <p>&copy; {{ date('Y') }} Gereja Stasi Santa Elisabeth Lambanapu. Seluruh hak cipta dilindungi undang-undang.</p>
                <div class="mt-2 sm:mt-0 space-x-4">
                    <a href="#" class="hover:underline">Kebijakan Privasi</a>
                    <span>&bull;</span>
                    <a href="#" class="hover:underline">Syarat & Ketentuan</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Mobile menu visibility script -->
    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        }

        // Add scrolled background to header navbar
        window.addEventListener('scroll', function() {
            const header = document.querySelector('header');
            if (window.scrollY > 50) {
                header.classList.remove('bg-slate-800/85');
                header.classList.add('bg-slate-950/95', 'shadow-lg');
            } else {
                header.classList.remove('bg-slate-950/95', 'shadow-lg');
                header.classList.add('bg-slate-800/85');
            }
        });
    </script>
</body>
</html>
