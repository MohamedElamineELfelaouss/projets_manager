<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Unbounded:wght@200..900&display=swap" rel="stylesheet">

    <style>
        .unbounded-font {
            font-family: "Unbounded", sans-serif;
            font-optical-sizing: auto;
            font-weight: 300;
            font-style: normal;
        }

        body {
            font-family: "Unbounded", sans-serif;
            background: linear-gradient(to right, #1f2937, #111827, #1f2937);
        }

        #navbar {
            transition: background 0.3s, color 0.3s;
        }
    </style>
</head>

<body class="bg-gradient-to-r from-gray-800 via-gray-900 to-gray-800 text-white min-h-screen">

    <nav id="navbar"
        class="bg-white/10 backdrop-filter backdrop-blur-md p-4 shadow-lg sticky top-0 z-50 transition-all duration-300">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ url('/') }}" class="unbounded-font text-white text-2xl font-bold tracking-wide nav-link">
                Project Manager
            </a>
            <div class="flex space-x-6">
                <a href="{{ route('projets.index') }}"
                    class="unbounded-font text-white hover:text-gray-300 transition duration-200 nav-link">
                    Projects
                </a>
                <a href="{{ route('developpeur.index') }}"
                    class="unbounded-font text-white hover:text-gray-300 transition duration-200 nav-link">
                    Développeur
                </a>
                <a href="{{ route('taches.index') }}"
                    class="unbounded-font text-white hover:text-gray-300 transition duration-200 nav-link">
                    Tâches
                </a>
            </div>
        </div>
    </nav>

    <div class="container mx-auto mt-10 max-w-6xl bg-white p-8 rounded-lg shadow-md text-gray-900">
        @yield('content')
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const navbar = document.getElementById("navbar");
            const navLinks = document.querySelectorAll(".nav-link");

            window.addEventListener("scroll", function () {
                if (window.scrollY > 50) {
                    // navbar.classList.add("bg-white", "shadow-md");
                    // navbar.classList.remove("bg-white/10", "backdrop-blur-md");

                    navLinks.forEach(link => {
                        link.classList.remove("text-white");
                        link.classList.add("text-gray-900");
                    });
                } else {
                    navbar.classList.remove("bg-white", "shadow-md");
                    navbar.classList.add("bg-white/10", "backdrop-blur-md");

                    navLinks.forEach(link => {
                        link.classList.remove("text-gray-900");
                        link.classList.add("text-white");
                    });
                }
            });
        });
    </script>


</body>

</html>