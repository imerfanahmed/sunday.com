<div>
    @livewire('create-board-modal')
    @livewire('edit-board-modal')

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">My Boards</h1>
                <p class="mt-2 text-gray-600">Manage your Sunday.com boards and projects</p>
            </div>
            <flux:button wire:click="$dispatch('open-create-board-modal')" variant="primary" icon="plus">
                Create Board
            </flux:button>
        </div>

        @if($boards->isEmpty())
            <div class="text-center py-12">
                <flux:icon.document-plus variant="outline" class="w-16 h-16 mx-auto text-gray-400 mb-4" />
                <h3 class="text-lg font-medium text-gray-900 mb-2">No boards yet</h3>
                <p class="text-gray-600 mb-4">Get started by creating your first board</p>
                <flux:button wire:click="$dispatch('open-create-board-modal')" variant="primary">
                    Create Your First Board
                </flux:button>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($boards as $board)
                    <flux:card wire:key="board-{{ $board->id }}">
                        <div class="flex items-start justify-between mb-3">
                            <div class="flex items-center gap-3">
                                @if($board->color)
                                    <div class="w-4 h-4 rounded" style="background-color: {{ $board->color }}"></div>
                                @endif
                                <h3 class="text-lg font-semibold text-gray-900">{{ $board->name }}</h3>
                            </div>
                            <flux:dropdown align="right">
                                <flux:button variant="ghost" size="sm" icon="ellipsis-vertical"></flux:button>
                                <flux:menu>
                                    <flux:menu.item icon="pencil" href="{{ route('boards.show', $board) }}">
                                        View Board
                                    </flux:menu.item>
                                    <flux:menu.item icon="pencil-square"
                                        wire:click="$dispatch('open-edit-board-modal', { boardId: {{ $board->id }} })">
                                        Edit Board
                                    </flux:menu.item>
                                    <flux:menu.item icon="trash" wire:click="deleteBoard({{ $board->id }})"
                                        wire:confirm="Are you sure you want to delete this board?">
                                        Delete
                                    </flux:menu.item>
                                </flux:menu>
                            </flux:dropdown>
                        </div>

                        @if($board->description)
                            <p class="text-sm text-gray-600 mb-4">{{ Str::limit($board->description, 100) }}</p>
                        @endif

                        <div class="flex items-center gap-4 text-xs text-gray-500 pt-3 border-t">
                            <span>{{ $board->columns->count() }} columns</span>
                            <span>•</span>
                            <span>{{ $board->items->count() }} items</span>
                        </div>
                    </flux:card>
                @endforeach
            </div>
        @endif
    </div>
</div>