<form method="POST" class="mt-6 space-y-6" action="{{ route('content.update', $content) }}" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="flex -mx-2">
        <div class="w-full md:w-1/2 px-2 mb-4">
            <x-input-label for="small_content" :value="__('Small Content')" />
            <x-text-input id="small_content" name="small_content" type="text" class="mt-1 block w-full" required :value="old('small_content', $content->small_content)" autocomplete="small_content" />
            <x-input-error class="mt-2" :messages="$errors->get('small_content')" />
        </div>

        <div class="w-full md:w-1/2 px-2 mb-4">
            <x-input-label for="headline_content_1" :value="__('Headline Content 1')" />
            <x-text-input id="headline_content_1" name="headline_content_1" type="text" class="mt-1 block w-full" required autofocus :value="old('headline_content_1', $content->headline_content_1)" autocomplete="headline_content_1" />
            <x-input-error class="mt-2" :messages="$errors->get('headline_content_1')" />
        </div>
    </div>

    <div class="flex -mx-2">
        <div class="w-full md:w-1/2 px-2 mb-4">
            <x-input-label for="headline_content_2" :value="__('Headline Content 2')" />
            <x-text-input id="headline_content_2" name="headline_content_2" type="text" class="mt-1 block w-full" required :value="old('headline_content_2', $content->headline_content_2)" autocomplete="headline_content_2" />
            <x-input-error class="mt-2" :messages="$errors->get('headline_content_2')" />
        </div>

        <div class="w-full md:w-1/2 px-2 mb-4">
            <x-input-label for="headline_content_3" :value="__('Headline Content 3')" />
            <x-text-input id="headline_content_3" name="headline_content_3" type="text" class="mt-1 block w-full" required :value="old('headline_content_3', $content->headline_content_3)" autocomplete="headline_content_3" />
            <x-input-error class="mt-2" :messages="$errors->get('headline_content_3')" />
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div>
            <div>
                @if ($content->circle_assets_1)
                    <img class="circle_assets_1-preview inline-block w-16 h-16 object-cover rounded-full ring-2 ring-white bg-purple-50 p-2" src="{{ asset('storage/' . $content->circle_assets_1) }}">
                @else
                    <img class="circle_assets_1-preview inline-block w-16 h-16 object-cover rounded-full ring-2 ring-white bg-purple-50 p-2">
                @endif
            </div>
            <x-file-input id="circle_assets_1" name="circle_assets_1" label="Upload Circle Image 1" placeholder="Choose a file..." />
        </div>

        <div>
            <div>
                @if ($content->circle_assets_2)
                    <img class="circle_assets_2-preview inline-block w-16 h-16 object-cover rounded-full ring-2 ring-white bg-purple-50 p-2" src="{{ asset('storage/' . $content->circle_assets_2) }}">
                @else
                    <img class="circle_assets_2-preview inline-block w-16 h-16 object-cover rounded-full ring-2 ring-white bg-purple-50 p-2">
                @endif
            </div>
            <x-file-input id="circle_assets_2" name="circle_assets_2" label="Upload Circle Image 2" placeholder="Choose a file..." />
        </div>

        <div>
            <div>
                @if ($content->circle_assets_3)
                    <img class="circle_assets_3-preview inline-block w-16 h-16 object-cover rounded-full ring-2 ring-white bg-purple-50 p-2" src="{{ asset('storage/' . $content->circle_assets_3) }}">
                @else
                    <img class="circle_assets_3-preview inline-block w-16 h-16 object-cover rounded-full ring-2 ring-white bg-purple-50 p-2">
                @endif
            </div>
            <x-file-input id="circle_assets_3" name="circle_assets_3" label="Upload Circle Image 3" placeholder="Choose a file..." />
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-end">
        <div>
            @if ($content->image_1)
                <img class="image_1-preview w-60 h-96 object-cover rounded-full border-4 border-white max-w-full" src="{{ asset('storage/' . $content->image_1) }}" alt="hero satu">
            @else
                <img class="image_1-preview w-60 h-96 object-cover rounded-full border-4 border-white max-w-full">
            @endif
            <x-file-input id="image_1" name="image_1" label="Upload Image 1" placeholder="Choose a file..." />
        </div>

        <div>
            @if ($content->image_2)
                <img class="image_2-preview w-60 h-96 object-cover rounded-full max-w-full" src="{{ asset('storage/' . $content->image_2) }}">
            @else
                <img class="image_2-preview w-60 h-96 object-cover rounded-full max-w-full">
            @endif
            <x-file-input id="image_2" name="image_2" label="Upload Image 2" placeholder="Choose a file..." />
        </div>
    </div>
    <div class="flex justify-end space-x-2">
        <x-primary-button>{{ __('Save') }}</x-primary-button>
    </div>
</form>
