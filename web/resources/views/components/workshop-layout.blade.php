<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mechanical Assistance</title>
    <link href="{{ asset('assets/fontawesome/css/all.css') }}" rel="stylesheet">
    @vite('resources/css/app.css')
</head>

<body>
    <header class="bg-white">
        <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
            <div class="flex lg:flex-1">
                <a href="#" class="-m-1.5 p-1.5">
                    <span class="sr-only">Your Company</span>
                    <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="">
                </a>
            </div>
            <div class="flex lg:hidden">
                <button type="button" class="mmt-toggle -m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                    <span class="sr-only">Open main menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
            </div>
            <div class="hidden lg:flex lg:gap-x-12">
                <a href="{{ route('home') }}" class="text-sm font-semibold leading-6 text-gray-900">Home</a>
                <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Jobs</a>
                <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Mechanics</a>
                <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Company</a>
            </div>
            <div class="hidden lg:flex lg:flex-1 lg:justify-end relative">
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button>
                        <i class="fa-solid fa-right-from-bracket"></i>
                    </button>
                </form>
            </div>
        </nav>
        <!-- Mobile menu, show/hide based on menu open state. -->
        <div class="lg:hidden" role="dialog" aria-modal="true">
            <!-- Background backdrop, show/hide based on slide-over state. -->
            <div class="hidden slide-over fixed inset-0 z-10"></div>
            <div class="hidden slide-over fixed inset-y-0 right-0 z-10 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
                <div class="flex items-center justify-between">
                    <a href="#" class="-m-1.5 p-1.5">
                        <span class="sr-only">Your Company</span>
                        <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="">
                    </a>
                    <button type="button" class="mmt-toggle -m-2.5 rounded-md p-2.5 text-gray-700">
                        <span class="sr-only">Close menu</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="mt-6 flow-root">
                    <div class="-my-6 divide-y divide-gray-500/10">
                        <div class="space-y-2 py-6">
                            <a href="{{ route('home') }}" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Home</a>
                            <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Jobs</a>
                            <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Mechanics</a>
                            <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Company</a>
                        </div>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button>
                                <i class="fa-solid fa-right-from-bracket"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main class="mx-auto max-w-7xl p-6 lg:px-8">
        {{ $slot }}
    </main>

    <script>
        const menuButtons = document.querySelectorAll('.menu-button');
        menuButtons.forEach(function(menuButton) {
            menuButton.addEventListener('click', () => {
                const flyout = menuButton.nextElementSibling
                if (flyout.classList.contains('opacity-0')) {
                    flyout.classList.remove('opacity-0', 'translate-y-1', '-z-10')
                    flyout.classList.add('opacity-100', 'translate-y-0', 'z-10')
                } else {
                    flyout.classList.add('opacity-0', 'translate-y-1', '-z-10')
                    flyout.classList.remove('opacity-100', 'translate-y-0', 'z-10')
                }
            })
        })

        const toggles = document.querySelectorAll('.mmt-toggle')
        toggles.forEach(function(button) {
            button.addEventListener('click', () => {
                toggleMobileMenu()
            })
        })

        const slide = document.querySelector('.slide-over')
        const mobileMenu = slide.nextElementSibling

        function toggleMobileMenu() {
            slide.classList.toggle('hidden')
            mobileMenu.classList.toggle('hidden')
        }

        const buttonItems = document.querySelectorAll('.mm-button-item')
        buttonItems.forEach(function(buttonItem) {
            const icon = buttonItem.firstElementChild
            buttonItem.addEventListener('click', () => {
                icon.classList.toggle('rotate-180')
                const submenu = buttonItem.nextElementSibling
                submenu.classList.toggle('hidden')
            })
        })
    </script>
    @stack('scripts')
</body>

</html>