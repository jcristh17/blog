<div class="flex flex-wrap -mx-3 mb-6 w-full">

    <div class="w-full md:w-full mb-2 mt-2">
        <textarea
            class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"
            name="body" id="body" placeholder='Type Your Comment' wire:model="Comment"></textarea>
        <x-input-error for="Comment"></x-input-error>
    </div>
    <div class="-mr-1">
        <x-buttons.primary-button wire:click="save()">
            Leave Comment
        </x-buttons.primary-button>
    </div>
</div>
