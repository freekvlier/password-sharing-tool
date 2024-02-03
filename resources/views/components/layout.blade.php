<html>

<head>
    <title>freekvanlier | {{ $title ?? 'Secure Password Sharing' }}</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<header>
    <nav
        class="relative flex w-full flex-wrap items-center justify-between bg-neutral-100 py-2 text-neutral-500 shadow-lg hover:text-neutral-700 focus:text-neutral-700 dark:bg-neutral-600 lg:py-4">
        <div class="flex w-full flex-wrap items-center justify-center px-3">
            <div>
                <a class="mx-2 my-1 flex items-center text-neutral-900 hover:text-neutral-900 focus:text-neutral-900 lg:mb-0 lg:mt-0"
                    href="{{ route('create') }}">
                    <img src="{{ asset('freekvanlier-cropped.svg') }}" style="height: 40px" alt="Logo" loading="lazy" />
                </a>
            </div>
        </div>
    </nav>
</header>

<body>
    {{ $slot }}
</body>

</html>
