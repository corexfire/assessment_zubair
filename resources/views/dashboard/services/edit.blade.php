<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __('Edit Service!') }}
                    @include('dashboard.services.partials.update-service')
                </div>
            </div>
        </div>
    </div>

    @section('scripts')
        <script src="{{ asset('js/main.js') }}"></script>
    @endsection
</x-app-layout>
