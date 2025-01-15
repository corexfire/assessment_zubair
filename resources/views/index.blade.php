<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Travel</title>
    @vite('resources/css/app.css')

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <link rel="icon" href="{{ asset('images/travel-logo.png') }}">
</head>

<body>
<div class="bg-white md:container md:mx-auto">
    <header class="absolute inset-x-0 top-0 z-50" x-data="{ open: false }">
        <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
            <div class="flex lg:flex-1">
                <a href="{{ route('landing') }}" class="-m-1.5 p-1.5">
                    <img class="h-10 w-auto inline" src="{{ asset('images/travel-logo.png') }}" alt="travel logo">
                </a>
            </div>
            <div class="flex lg:hidden">
                <button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700" @click="open = !open">
                    <span class="sr-only">Open main menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                    </svg>
                </button>
            </div>
            <div class="hidden lg:flex lg:gap-x-12 justify-end">
                <a href="#" class="{{ Request::is('/') ? 'text-amber-500 border-b-2 border-amber-500' : 'text-gray-900' }} inline-block text-sm font-semibold leading-6">Home</a>
                <a href="#" class="{{ Request::is('/our-tours') ? 'text-amber-500 border-b-2 border-amber-500' : 'text-gray-900' }} text-sm font-semibold leading-6">Our Tours</a>
                <a href="#" class="{{ Request::is('/reviews') ? 'text-amber-500 border-b-2 border-amber-500' : 'text-gray-900' }} text-sm font-semibold leading-6">Reviews</a>
                <a href="#" class="{{ Request::is('/contact-us') ? 'text-amber-500 border-b-2 border-amber-500' : 'text-gray-900' }} text-sm font-semibold leading-6 border-2 px-2 border-black rounded-full">Contact Us</a>
                @if (Auth::check())
                    <div class="hidden sm:flex sm:items-center sm:ms-6">
                        <x-dropdown align="right" width="50">
                            <x-slot name="trigger">
                                <div class="flex">
                                    <a href="#" class="text-sm font-semibold leading-6 text-gray-900">{{ Auth::user()->name }}</a>
                                    <div class="ms-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                            </x-slot>
                            <x-slot name="content">
                                <x-dropdown-link :href="route('content.edit', 1)">{{ __('Admin Area') }}</x-dropdown-link>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">{{ __('Log Out') }}</x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="text-sm font-semibold leading-6 text-gray-900">Login</a>
                @endif
            </div>
        </nav>
        <div class="lg:hidden" role="dialog" aria-modal="true" x-show="open">
            <div class="fixed inset-0 z-50"></div>
            <div class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
                <div class="flex items-center justify-between">
                    <img class="h-10 w-auto inline" src="{{ asset('images/travel-logo.png') }}" alt="Travel Logo">
                    <span class="font-semibold text-2xl">Travel</span>
                    <button type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700" @click="open = !open">
                        <span class="sr-only">Close menu</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
                <div class="mt-6 flow-root">
                    <div class="divide-y divide-gray-500/10">
                        <div class="space-y-2 py-6">
                            <a href="#" class="{{ Request::is('/') ? 'text-amber-500 border-b-2 border-amber-500' : 'text-gray-900' }} -mx-3 block rounded-lg px-3 py-2 font-semibold leading-7 hover:bg-gray-50">Home</a>
                            <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Our Tours</a>
                            <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Reviews</a>
                            <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50 border-2 border-black">Contact Us</a>
                            <a href="{{ route('login') }}" class="text-sm font-semibold leading-6 text-gray-900">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="relative isolate px-6 mt-20 lg:px-8 md:mt-20">
        <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
            <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
        </div>
        <div class="w-full px-4 py-8 sm:px-6 sm:py-12 lg:px-8 lg:py-16">
            <div class="grid grid-cols-1 gap-y-8 lg:grid-cols-2 lg:gap-x-16">
                <div class="mx-auto max-w-2xl lg:mx-0 ltr:lg:text-left rtl:lg:text-right">
                    <p class="text-gray-400">{{ $content[0]->small_content ?? 'The vacation you deserve is closer than you think 😍' }}</p>
                    <div class="flex">
                        <h2 class="text-4xl font-bold">{{ $content[0]->headline_content_1 ?? 'Life is short' }}</h2>
                        <span>
                            <img src="{{ asset('images/asset-camera.png') }}" alt="icon camera" class="w-20 h-8 object-cover">
                        </span>
                    </div>
                    <h2 class="text-4xl font-bold">
                        {{ $content[0]->headline_content_2 ?? 'and the world 🌍' }} <br>
                        {{ $content[0]->headline_content_3 ?? 'is Wide! 🏝️' }}
                    </h2>

                    <form class="lg:mt-12 md:mt-8 mt-10 lg:w-4/6 lg:absolute z-20">
                        <div class="bg-white md:py-4 md:px-8 py-10 px-14 flex flex-wrap justify-between shadow-xl md:rounded-full rounded-2xl space-x-2">
                            <div class="flex md:justify-between items-center w-full md:w-auto">
                                <div class="flex-none w-10 h-full">
                                    <svg class="w-8 text-amber-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="40" height="40">
                                        <path d="M12 2.0097656C8.144 2.0097656 5.0078125 5.1479063 5.0078125 9.0039062C5.0078125 13.486906 10.974516 20.769172 11.228516 21.076172L12 22.011719L12.771484 21.076172C13.025484 20.768172 18.992188 13.486906 18.992188 9.0039062C18.992187 5.1469062 15.856 2.0097656 12 2.0097656 z M 12 4.0097656C14.753 4.0097656 16.992188 6.2509062 16.992188 9.0039062C16.992187 11.708906 13.878 16.361172 12 18.826172C10.122 16.363172 7.0078125 11.712906 7.0078125 9.0039062C7.0078125 6.2509062 9.247 4.0097656 12 4.0097656 z M 12 6.5C10.619 6.5 9.5 7.619 9.5 9C9.5 10.381 10.619 11.5 12 11.5C13.381 11.5 14.5 10.381 14.5 9C14.5 7.619 13.381 6.5 12 6.5 z" fill="currentColor"/>
                                    </svg>
                                </div>
                                <div class="w-full md:w-auto">
                                    <div x-data="{ open: false, selectedCity: 'Manali, India' }" class="relative">
                                        <label class="flex items-center" for="location">
                                            Location
                                            <span class="w-8 flex justify-center items-center cursor-pointer ml-2" @click="open = !open">
                                                <svg class="text-amber-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                                    <path d="M7.4296875 9.5L5.9296875 11L12 17.070312L18.070312 11L16.570312 9.5L12 14.070312L7.4296875 9.5 z" fill="currentColor"/>
                                                </svg>
                                            </span>
                                        </label>
                                        <div x-show="open" @click.away="open = false" class="absolute mt-2 w-48 bg-white border border-gray-300 rounded-md shadow-lg z-10">
                                            <ul class="divide-y divide-gray-200">
                                                <li class="p-2 flex items-center cursor-pointer gap-2" @click="selectedCity = 'Manali, India'; open = false">
                                                    <img src="{{asset('images/manali.jpg')}}" alt="Manali, India" class="w-8 h-8 rounded-full mr-2">
                                                    <span>Manali, India</span>
                                                </li>
                                                <li class="p-2 flex items-center cursor-pointer gap-2" @click="selectedCity = 'Bali, Indonesia'; open = false">
                                                    <img src="{{asset('images/bali.jpg')}}" alt="Bali, Indonesia" class="w-8 h-8 rounded-full mr-2">
                                                    <span>Bali, Indonesia</span>
                                                </li>
                                                <li class="p-2 flex items-center cursor-pointer gap-2" @click="selectedCity = 'Tokyo, Japan'; open = false">
                                                    <img src="{{asset('images/tokyo.jpg')}}" alt="Tokyo, Japan" class="w-8 h-8 rounded-full mr-2">
                                                    <span>Tokyo, Japan</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <strong x-text="selectedCity"></strong>
                                    </div>
                                </div>
                            </div>
                            <div class="border"></div>
                            <div class="flex md:justify-between items-center w-full md:w-auto">
                                <div class="flex-none w-10">
                                    <svg class="w-8 text-amber-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="40" height="40">
                                        <path d="M6 1L6 3L5 3C3.9 3 3 3.9 3 5L3 19C3 20.1 3.9 21 5 21L19 21C20.1 21 21 20.1 21 19L21 5C21 3.9 20.1 3 19 3L18 3L18 1L16 1L16 3L8 3L8 1L6 1 z M 5 5L6 5L8 5L16 5L18 5L19 5L19 7L5 7L5 5 z M 5 9L19 9L19 19L5 19L5 9 z" fill="currentColor"/>
                                    </svg>
                                </div>
                                <div class="w-full md:w-auto">
                                    <div x-data="{ selectedDate: '' }" class="relative">
                                        <label class="flex items-center" for="date">
                                            Date
                                            <span class="w-8 flex justify-center items-center cursor-pointer ml-2" @click="$refs.datepicker.click()">
                                                <svg class="text-amber-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                                    <path d="M7.4296875 9.5L5.9296875 11L12 17.070312L18.070312 11L16.570312 9.5L12 14.070312L7.4296875 9.5 z" fill="currentColor"/>
                                                </svg>
                                            </span>
                                        </label>
                                        <input type="text" x-ref="datepicker" class="font-bold block w-[8rem]" style="border: none; padding: 0 !important;" />
                                    </div>
                                </div>
                            </div>
                            <div class="border"></div>
                            <div class="flex md:justify-between items-center w-full md:w-auto">
                                <div class="flex-none w-10">
                                    <svg class="w-8 text-amber-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="40" height="40">
                                        <path d="M6 1L6 3L5 3C3.9 3 3 3.9 3 5L3 19C3 20.1 3.9 21 5 21L19 21C20.1 21 21 20.1 21 19L21 5C21 3.9 20.1 3 19 3L18 3L18 1L16 1L16 3L8 3L8 1L6 1 z M 5 5L6 5L8 5L16 5L18 5L19 5L19 7L5 7L5 5 z M 5 9L19 9L19 19L5 19L5 9 z" fill="currentColor"/>
                                    </svg>
                                </div>
                                <div class="w-full md:w-auto">
                                    <div x-data="{ selectedReturnDate: '' }" class="relative">
                                        <label class="flex items-center" for="date">
                                            Return
                                            <span class="w-8 flex justify-center items-center cursor-pointer ml-2" @click="$refs.returnDatepicker.click()">
                                                <svg class="text-amber-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                                    <path d="M7.4296875 9.5L5.9296875 11L12 17.070312L18.070312 11L16.570312 9.5L12 14.070312L7.4296875 9.5 z" fill="currentColor"/>
                                                </svg>
                                            </span>
                                        </label>
                                        <input type="text" x-ref="returnDatepicker" class="font-bold block w-[8rem]" style="border: none; padding: 0 !important;" />
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-end items-center w-full md:w-auto">
                                <button class="p-4 md:rounded-full rounded-2xl bg-amber-500 flex items-center justify-center">
                                    <span class="md:hidden text-white">Search</span>
                                    <svg class="text-white" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path d="M9 2C5.1458495 2 2 5.1458524 2 9C2 12.854148 5.1458495 16 9 16C10.747999 16 12.345009 15.348024 13.574219 14.28125L14 14.707031L14 16L20 22L22 20L16 14L14.707031 14L14.28125 13.574219C15.348024 12.345009 16 10.747997 16 9C16 5.1458524 12.854151 2 9 2 z M 9 4C11.773271 4 14 6.2267307 14 9C14 11.773269 11.773271 14 9 14C6.226729 14 4 11.773269 4 9C4 6.2267307 6.226729 4 9 4 z" fill="currentColor" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="flex justify-center">
                    <div class="overflow-hidden z-10">
                        <img class="inline-block w-16 h-auto rounded-full ring-2 ring-white absolute z-20 ml-4 mt-20 bg-purple-50 p-2" src="{{ $content[0]->circle_assets_1 ? 'storage/' . $content[0]->circle_assets_1 : asset('images/helicopter.png') }}" alt="image helicopter">
                        <img class="inline-block w-16 h-auto rounded-full ring-2 ring-white absolute z-20 ml-60 mt-20 bg-purple-100 p-2" src="{{ $content[0]->circle_assets_2 ? 'storage/' . $content[0]->circle_assets_2 : asset('images/mountain.png') }}">
                        <img src="{{ asset('images/asset-location.png') }}" alt="icon location" class="h-20 z-40 ml-60 object-cover absolute">
                        <img class="inline-block w-16 h-auto rounded-full ring-2 ring-white absolute z-20 ml-60 mt-64 bg-white p-2" src="{{ $content[0]->circle_assets_3 ? 'storage/' . $content[0]->circle_assets_3 : asset('images/sailboat.png') }}">
                        <img class="ml-10 w-60 h-96 object-cover rounded-full border-4 border-white max-w-full" src="{{ $content[0]->image_1 ? 'storage/' . $content[0]->image_1 : asset('images/image_1.jpg') }}" alt="hero satu">
                    </div>
                    <div class="overflow-hidden absolute">
                        <img class="w-52 h-72 object-cover rounded-full max-w-full ml-64 mt-40" src="{{ $content[0]->image_2 ? 'storage/' . $content[0]->image_2 : asset('images/image_2.jpg') }}">
                    </div>
                </div>
            </div>
        </div>

        <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]" aria-hidden="true">
            <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]" style="clip-path: polygon(9.5% 9.5%, 21.92% 54.35%, 28.26% 28.65%, 37.67% 63.07%, 36.03% 42.49%, 40.13% 32.78%, 50.09% 35.35%, 39.45% 19.82%, 51.23% 3.03%, 53.52% 19.82%, 71.39% 7.34%, 75% 25%, 90.34% 10.08%, 95.9% 51.62%, 95.02% 90.35%, 80.15% 76.97%, 79.2% 61.68%, 64.64% 48.52%, 64.15% 28.2%, 57.23% 22.41%, 63.89% 57.35%, 46.09% 61.68%, 57.71% 65.21%, 71.39% 65.21%, 81.1% 92.25%, 67.27% 78.72%, 60.55% 96.74%, 58.76% 78.93%, 50.24% 79.13%, 48.24% 96.74%, 41.47% 76.97%, 31.24% 73.02%, 32.42% 92.25%, 20.77% 97.8%, 3.75% 92.25%, 21.92% 79.13%, 12.96% 65.97%, 13.68% 37.83%, 7.76% 44.82%);"></div>
        </div>
        <div class="mx-auto mt-10 grid max-w-2xl grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-16 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-4">
            @foreach ($services as $service)
                <div class="flex max-w-xl flex-col items-start">
                    @if (Str::contains($service->image, ['png', 'jpg']))
                        <img src="{{ 'storage/' . $service->image }}" alt="image" class="w-16 {{ $loop->index == 2 ? 'lg:mt-16' : '' }}">
                    @else
                        <p class="font-bold text-lg text-amber-500">{{ $service->image }}</p>
                    @endif
                    <p class="text-4xl font-bold my-4">{{ $service->title }}</p>
                    <p class="text-gray-500 text-sm">{{ $service->description }}</p>
                </div>
            @endforeach
        </div>
    </section>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const datepickerInput = document.querySelector('[x-ref="datepicker"]');
        const returnDatepickerInput = document.querySelector('[x-ref="returnDatepicker"]');
        flatpickr(datepickerInput, {
            defaultDate: new Date(),
            dateFormat: "d M Y",
            onChange: function(selectedDates, dateStr) {
                const datepickerComponent = Alpine.store('datepicker');
                datepickerComponent.selectedDate = dateStr;
            },
            position: "below"
        });

        flatpickr(returnDatepickerInput, {
            defaultDate: new Date(),
            dateFormat: "d M Y",
            onChange: function(selectedDates, dateStr) {
                const datepickerComponent = Alpine.store('returnDatepicker');
                datepickerComponent.selectedDate = dateStr;
            },
            position: "below"
        });
    });
</script>

</body>

</html>
