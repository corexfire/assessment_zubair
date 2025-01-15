<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="border-b border-gray-200 dark:border-neutral-700">
                        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500 dark:text-neutral-400">
                            <li class="mr-2">
                                <button class="inline-block p-4 rounded-t-lg border-b-2 font-bold text-xl" id="edit-content-tab" onclick="showTab('content')">Edit Content</button>
                            </li>
                            <li class="mr-2">
                                <button class="inline-block p-4 rounded-t-lg border-b-2 font-bold text-xl" id="edit-service-tab" onclick="showTab('service')">Edit Service</button>
                            </li>
                        </ul>
                    </div>

                    <div id="content" class="tab-content">
                        @if (session()->has('success'))
                            <div class="mt-2 bg-teal-100 border border-teal-200 text-sm text-teal-800 rounded-lg p-4 dark:bg-teal-800/10 dark:border-teal-900 dark:text-teal-500" role="alert">
                                <span class="font-bold">Success</span> {{ session('success') }}.
                            </div>
                        @endif
                        @include('dashboard.contents.partials.update-content')
                    </div>

                    <div id="service" class="tab-content hidden">
                        <hr>
                        <div class="flex flex-col">
                            <div class="-m-1.5 overflow-x-auto">
                                <div class="p-1.5 min-w-full inline-block align-middle">
                                    <div class="overflow-hidden">
                                        <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                                            <thead>
                                            <tr>
                                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Images</th>
                                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Title</th>
                                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Description</th>
                                                <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($services as $service)
                                                <tr class="odd:bg-white even:bg-gray-100 dark:odd:bg-neutral-900 dark:even:bg-neutral-800">
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                                        @if (Str::contains($service->image, ['png', 'jpg']))
                                                            <img src="{{ asset('storage/' . $service->image) }}" class="w-16">
                                                        @else
                                                            <p class="font-bold text-lg text-amber-500">{{ $service->image }}</p>
                                                        @endif
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">{{ $service->title }}</td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">{{ Str::of($service->description)->limit(20) }}</td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                                        <a href="{{ route('service.edit', $service->id) }}" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400">Edit</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @section('scripts')
        <script src="{{ asset('js/main.js') }}"></script>
        <script>
            function showTab(tabName) {
                const contentTab = document.getElementById('content');
                const serviceTab = document.getElementById('service');
                const contentButton = document.getElementById('edit-content-tab');
                const serviceButton = document.getElementById('edit-service-tab');

                if (tabName === 'content') {
                    contentTab.classList.remove('hidden');
                    serviceTab.classList.add('hidden');
                    contentButton.classList.add('border-blue-500', 'text-blue-600', 'bg-gray-100');
                    serviceButton.classList.remove('border-blue-500', 'text-blue-600', 'bg-gray-100');
                } else {
                    serviceTab.classList.remove('hidden');
                    contentTab.classList.add('hidden');
                    serviceButton.classList.add('border-blue-500', 'text-blue-600', 'bg-gray-100');
                    contentButton.classList.remove('border-blue-500', 'text-blue-600', 'bg-gray-100');
                }
            }

            document.addEventListener('DOMContentLoaded', () => {
                showTab('content');
            });
        </script>
    @endsection
</x-app-layout>
