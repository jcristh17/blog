<div x-show="showInputReply" class="mt-1">
    <form wire:submit="saveReply({{ $comment }})" x-on:submit="showInputReply = !showInputReply">
        <div class="flex">
            <x-input class="w-full rounded focus:border-blue-500" placeholder="your reply" wire:model="reply" name="reply"
                id="reply" required></x-input>
            <x-buttons.info-button class="ml-1 rounded" type="submit" {{-- wire:click="" --}} title="Send comment">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                    <path
                        d="M3.105 2.289a.75.75 0 00-.826.95l1.414 4.925A1.5 1.5 0 005.135 9.25h6.115a.75.75 0 010 1.5H5.135a1.5 1.5 0 00-1.442 1.086l-1.414 4.926a.75.75 0 00.826.95 28.896 28.896 0 0015.293-7.154.75.75 0 000-1.115A28.897 28.897 0 003.105 2.289z" />
                </svg>

            </x-buttons.info-button>
        </div>
    </form>
    <x-input-error for="reply"></x-input-error>
</div>
