<div class="container mx-auto p-4">
    <div class="flex justify-between items-center">
        <button wire:click="showForm" class="ml-20 sm:px-6 lg:px-8 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Create Post
        </button>
    </div>

    @if($toggleForm)
        <div class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50">
            <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
                <button wire:click="showForm" class="absolute top-2 right-2 text-gray-600">✖</button>

                <h2 class="text-lg font-bold mb-4">Add a Post</h2>

                <form wire:submit="submit">
                    <div>
                        <x-input-text name="message" wire:model.defer="form.message"></x-input-text>
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Submit</button>
                        <button type="button" wire:click="showForm" class="ml-2 text-gray-600">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>

