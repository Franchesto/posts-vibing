<div>
    @if($showEditIcon)
        <svg wire:click="showForm" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="black" class="size-5">
            <path d="m2.695 14.762-1.262 3.155a.5.5 0 0 0 .65.65l3.155-1.262a4 4 0 0 0 1.343-.886L17.5 5.501a2.121 2.121 0 0 0-3-3L3.58 13.419a4 4 0 0 0-.885 1.343Z" />
        </svg>


    @if ($toggleForm)
            <div class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50">
                <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">

                    <h2 class="text-lg font-bold mb-4">Edit Post</h2>

                    <form wire:submit="submit">
                        <div>
                            <x-input-text name="message" wire:model.defer="form.message" autofocus></x-input-text>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Submit</button>
                            <button type="button" wire:click="showForm" class="ml-2 text-gray-600">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        @endif
    @endif
</div>
