<div x-data="{ show: @entangle('show') }" x-show="show" x-cloak class="fixed inset-0 z-50 overflow-y-auto"
    style="display: none;">
    <div class="flex items-center justify-center min-h-screen px-4">
        <!-- Backdrop -->
        <div x-show="show" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" @click="$wire.close()"></div>

        <!-- Modal -->
        <div x-show="show" x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            class="relative bg-white rounded-lg shadow-xl max-w-lg w-full z-50">

            @if($board)
                <form wire:submit="save">
                    <!-- Header -->
                    <div class="px-6 py-4 border-b">
                        <h2 class="text-xl font-semibold text-gray-900">Edit Board</h2>
                    </div>

                    <!-- Body -->
                    <div class="px-6 py-6 space-y-6">
                        <flux:input wire:model="name" label="Board Name" required />

                        <flux:textarea wire:model="description" label="Description" rows="3" />

                        <div>
                            <flux:label>Board Color</flux:label>
                            <div class="flex gap-3 mt-2">
                                @foreach(['#3B82F6', '#10B981', '#F59E0B', '#EF4444', '#8B5CF6', '#EC4899'] as $colorOption)
                                    <button type="button" wire:click="$set('color', '{{ $colorOption }}')"
                                        class="w-10 h-10 rounded-full border-2 transition {{ $color === $colorOption ? 'border-gray-900 scale-110' : 'border-gray-200' }}"
                                        style="background-color: {{ $colorOption }}"></button>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="px-6 py-4 border-t flex justify-end gap-3">
                        <flux:button type="button" variant="ghost" wire:click="close">Cancel</flux:button>
                        <flux:button type="submit" variant="primary">Update Board</flux:button>
                    </div>
                </form>
            @endif
        </div>
    </div>
</div>