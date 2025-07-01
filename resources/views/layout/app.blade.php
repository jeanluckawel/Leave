<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Kamoa copper sa')</title>
    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/tailwind.output.css') }}" />
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="{{ asset('assets/js/init-alpine.js') }}"></script>

    <style>
        /* Custom red theme */
        .bg-red-50 {
            background-color: #fef2f2;
        }
        .hover\:bg-red-100:hover {
            background-color: #fee2e2;
        }
        .active\:bg-red-600:active {
            background-color: #dc2626;
        }
        .focus\:ring-red-300:focus {
            --tw-ring-color: #fca5a5;
        }

        /* Button styles */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            transition: all 0.2s ease;
            cursor: pointer;
        }

        .btn-red {
            background-color: #ef4444;
            color: white;
            border: none;
        }

        .btn-red:hover {
            background-color: #dc2626;
        }

        .btn-blue {
            background-color: #3b82f6;
            color: white;
            border: none;
        }

        .btn-blue:hover {
            background-color: #2563eb;
        }

        .btn-orange {
            background-color: #f97316;
            color: white;
            border: none;
        }

        .btn-orange:hover {
            background-color: #ea580c;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .mobile-stack {
                flex-direction: column;
            }

            .mobile-full-width {
                width: 100%;
            }

            .mobile-p-2 {
                padding: 0.5rem;
            }

            .mobile-text-sm {
                font-size: 0.875rem;
            }

            .mobile-hidden {
                display: none;
            }
        }

        /* Print styles */
        @media print {
            .no-print {
                display: none !important;
            }

            body {
                background: white !important;
                color: black !important;
            }

            .print-area {
                width: 100% !important;
                margin: 0 !important;
                padding: 0 !important;
                box-shadow: none !important;
            }
        }
    </style>
</head>
<body>
<div class="flex h-screen bg-red-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
    <!-- Desktop sidebar -->
    <aside class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0 shadow-lg">
        <div class="py-4 text-gray-500 dark:text-gray-400">
            <div class="flex items-center justify-center mb-8">

            </div>

            <ul class="mt-2 space-y-1">
                <li class="relative px-6 py-3">
                    <span class="absolute inset-y-0 left-0 w-1 bg-red-600 rounded-tr-lg rounded-br-lg"></span>
                    <a href="" class="flex items-center w-full text-sm font-semibold text-gray-800 dark:text-gray-100 hover:text-red-600 dark:hover:text-red-400 px-3 py-2 rounded-lg">
                        <i class='bx bxs-dashboard text-lg mr-3'></i>
                        Dashboard
                    </a>
                </li>

                <div x-data="{ isEmployeesMenuOpen: false, isPayrollMenuOpen: false }">
                    <!-- Employees Menu -->
                    <li class="relative px-6 py-3">
                        <button @click="isEmployeesMenuOpen = !isEmployeesMenuOpen" class="flex items-center justify-between w-full text-sm font-semibold text-gray-800 dark:text-gray-100 hover:text-red-600 dark:hover:text-red-400 px-3 py-2 rounded-lg">
                            <span class="flex items-center">
                                <i class='bx bxs-user-detail text-lg mr-3'></i>
                                Leaves
                            </span>
                            <i class='bx bx-chevron-down transition-transform duration-200' :class="{ 'transform rotate-180': isEmployeesMenuOpen }"></i>
                        </button>
                        <ul x-show="isEmployeesMenuOpen" x-transition class="pl-2 mt-2 space-y-2">
                            <li>
                                <a href="" class="flex items-center text-sm text-gray-700 dark:text-gray-300 hover:text-red-600 dark:hover:text-red-400 px-3 py-2 rounded-lg">
                                    <i class='bx bx-user-plus mr-2'></i>
                                    One Employee
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('leaves.import') }}" class="flex items-center text-sm text-gray-700 dark:text-gray-300 hover:text-red-600 dark:hover:text-red-400 px-3 py-2 rounded-lg">
                                    <i class='bx bx-upload mr-2'></i>
                                    More Employees
                                </a>
                            </li>
                            <li>
                                <a href="" class="flex items-center text-sm text-gray-700 dark:text-gray-300 hover:text-red-600 dark:hover:text-red-400 px-3 py-2 rounded-lg">
                                    <i class='bx bx-search mr-2'></i>
                                    Search Leaves
                                </a>
                            </li>
                            <li>
                                <a href="" class="flex items-center text-sm text-gray-700 dark:text-gray-300 hover:text-red-600 dark:hover:text-red-400 px-3 py-2 rounded-lg">
                                    <i class='bxr  bx-archive mr-2'  ></i>
                                    Leaves history
                                </a>
                            </li>
                        </ul>
                    </li>

                </div>

                <!-- Other Menu Items -->
                <li class="relative px-6 py-3">
                    <a href="#" class="flex items-center w-full text-sm font-semibold text-gray-800 dark:text-gray-100 hover:text-red-600 dark:hover:text-red-400 px-3 py-2 rounded-lg">
                        <i class='bx bxs-report text-lg mr-3'></i>
                        Reports
                    </a>
                </li>

                <li class="relative px-6 py-3">
                    <a href="" class="flex items-center w-full text-sm font-semibold text-gray-800 dark:text-gray-100 hover:text-red-600 dark:hover:text-red-400 px-3 py-2 rounded-lg">
                        <i class='bx bx-file mr-3'></i>
                        Files
                    </a>
                </li>

                <li class="relative px-6 py-3">
                    <a href="#" class="flex items-center w-full text-sm font-semibold text-gray-800 dark:text-gray-100 hover:text-red-600 dark:hover:text-red-400 px-3 py-2 rounded-lg">
                        <i class='bx bxs-cog text-lg mr-3'></i>
                        Settings
                    </a>
                </li>
            </ul>

            <div class="px-6 my-6">
                <a href="#" class="btn btn-red w-full">
                    Log out {{ Auth::user()->name ?? '' }}
                </a>
            </div>
        </div>
    </aside>

    <!-- Mobile sidebar overlay -->
    <div x-show="isSideMenuOpen" @click="isSideMenuOpen = false" class="fixed inset-0 z-10 bg-black bg-opacity-50 md:hidden"></div>

    <!-- Mobile sidebar -->
    <aside x-show="isSideMenuOpen" x-transition class="fixed inset-y-0 z-20 w-64 mt-16 overflow-y-auto bg-white dark:bg-gray-800 md:hidden">
        <div class="py-4 text-gray-500 dark:text-gray-400">
            <div class="flex items-center justify-center mb-8">
                <a href="" class="text-xl font-bold text-red-600 dark:text-red-400 flex items-center">
                    <img src="{{ asset('logo/logo.png') }}" alt="Logo" class="h-8 mr-2">
                    Kamoa copper Sa
                </a>
            </div>

            <ul class="mt-2 space-y-1">
                <li class="relative px-6 py-3">
                    <span class="absolute inset-y-0 left-0 w-1 bg-red-600 rounded-tr-lg rounded-br-lg"></span>
                    <a href="" class="flex items-center w-full text-sm font-semibold text-gray-800 dark:text-gray-100 hover:text-red-600 dark:hover:text-red-400 px-3 py-2 rounded-lg">
                        <i class='bx bxs-dashboard text-lg mr-3'></i>
                        Dashboard
                    </a>
                </li>

                <!-- Mobile simplified menu -->
                <li class="relative px-6 py-3">
                    <a href="" class="flex items-center w-full text-sm font-semibold text-gray-800 dark:text-gray-100 hover:text-red-600 dark:hover:text-red-400 px-3 py-2 rounded-lg">
                        <i class='bx bxs-user-detail text-lg mr-3'></i>
                        Leave
                    </a>
                </li>

                <li class="relative px-6 py-3">
                    <a href="" class="flex items-center w-full text-sm font-semibold text-gray-800 dark:text-gray-100 hover:text-red-600 dark:hover:text-red-400 px-3 py-2 rounded-lg">
                        <i class='bx bxs-credit-card text-lg mr-3'></i>
                        Payroll
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    <div class="flex flex-col flex-1 w-full overflow-hidden">
        <header class="z-10 py-2 bg-white shadow-md dark:bg-gray-800">
            <div class="container flex items-center justify-between h-full px-4 mx-auto text-red-600 dark:text-red-400">
                <!-- Mobile menu button -->
                <button @click="isSideMenuOpen = !isSideMenuOpen" class="p-1 mr-2 -ml-1 rounded-md md:hidden focus:outline-none focus:ring-2 focus:ring-red-300">
                    <i class='bx bx-menu text-2xl'></i>
                </button>

                <!-- Search input - hidden on small screens -->
                <div  class="flex-1 max-w-xl mx-4 hidden md:block">
                    <div class="relative flex items-center">
                        <img src="{{ asset('logo/img.png') }}" alt="Logo kamoa copper sa" class="h-12 mr-2">
{{--                        <p class="text-2xl "><strong>--}}
{{--                                <a href="">--}}
{{--                                    KAMOA COPPER SA--}}
{{--                                </a>--}}
{{--                            </strong> </p>--}}
                    </div>
                </div>

                <div class="flex items-center space-x-4">
                    <!-- Theme toggle -->
                    <button @click="toggleTheme" class="p-1 rounded-full focus:outline-none focus:ring-2 focus:ring-red-300">
                        <i x-show="!dark" class='bx bx-moon text-xl'></i>
                        <i x-show="dark" class='bx bx-sun text-xl'></i>
                    </button>

                    <!-- Notifications -->
                    <div class="relative">
                        <button @click="isNotificationsMenuOpen = !isNotificationsMenuOpen" class="p-1 rounded-full focus:outline-none focus:ring-2 focus:ring-red-300">
                            <i class='bx bx-bell text-xl'></i>
                            <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full"></span>
                        </button>
                        <div x-show="isNotificationsMenuOpen" @click.away="isNotificationsMenuOpen = false" class="absolute right-0 w-64 mt-2 bg-white rounded-md shadow-lg dark:bg-gray-700">
                            <div class="px-4 py-2 border-b border-gray-200 dark:border-gray-600">
                                <h3 class="text-sm font-medium text-gray-700 dark:text-gray-300">Notifications</h3>
                            </div>
                            <div class="p-2">
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-red-50 dark:text-gray-300 dark:hover:bg-gray-600">New employee added</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-red-50 dark:text-gray-300 dark:hover:bg-gray-600">Payroll processed</a>
                            </div>
                        </div>
                    </div>

                    <!-- Profile dropdown -->
                    <div class="relative">
                        <button @click="isProfileMenuOpen = !isProfileMenuOpen" class="flex items-center space-x-2 focus:outline-none">
                            <img class="w-8 h-8 rounded-full" src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name ?? '') }}&background=ef4444&color=fff" alt="User avatar">
                            <span class="hidden md:inline-block text-sm font-medium">{{ Auth::user()->name ?? '' }}</span>
                        </button>
                        <div x-show="isProfileMenuOpen" @click.away="isProfileMenuOpen = false" class="absolute right-0 w-48 mt-2 bg-white rounded-md shadow-lg dark:bg-gray-700">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-red-50 dark:text-gray-300 dark:hover:bg-gray-600">Profile</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-red-50 dark:text-gray-300 dark:hover:bg-gray-600">Settings</a>
                            <a href="" class="block px-4 py-2 text-sm text-gray-700 hover:bg-red-50 dark:text-gray-300 dark:hover:bg-gray-600">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <main class="flex-1 overflow-y-auto p-4 bg-red-50 dark:bg-gray-900">
            <div class="max-w-7xl mx-auto">

                @yield('content')

            </div>
        </main>
    </div>
</div>

</body>

<script>
    function updateDateTime() {
        const now = new Date();
        const options = {
            weekday: 'long', year: 'numeric', month: 'long', day: 'numeric',
            hour: '2-digit', minute: '2-digit', second: '2-digit',
        };
        document.getElementById('datetime-now').textContent = now.toLocaleString('fr-FR', options);
    }

    updateDateTime();
    setInterval(updateDateTime, 1000);
</script>

</html>
