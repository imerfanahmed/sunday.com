<div>
    @livewire('create-column-modal')

    <div class="min-h-screen bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <!-- Board Header -->
            <div class="mb-8">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <flux:button href="{{ route('boards.index') }}" variant="ghost" icon="arrow-left">
                            Back to Boards
                        </flux:button>
                        @if($board->color)
                            <div class="w-6 h-6 rounded" style="background-color: {{ $board->color }}"></div>
                        @endif
                        <h1 class="text-3xl font-bold text-gray-900">{{ $board->name }}</h1>
                    </div>
                    <flux:button wire:click="$dispatch('open-create-column-modal', { boardId: {{ $board->id }} })"
                        variant="primary" icon="plus">
                        Add Column
                    </flux:button>
                </div>
                @if($board->description)
                    <p class="mt-2 text-gray-600">{{ $board->description }}</p>
                @endif
            </div>

            <!-- Columns -->
            @if($columns->isEmpty())
                <div class="text-center py-12">
                    <h3 class="text-lg font-medium text-gray-900 mb-2">No columns yet</h3>
                    <p class="text-gray-600 mb-4">Add columns to organize your tasks</p>
                    <flux:button wire:click="$dispatch('open-create-column-modal', { boardId: {{ $board->id }} })"
                        variant="primary">
                        Add Your First Column
                    </flux:button>
                </div>
            @else
                <div class="flex gap-4 overflow-x-auto pb-4">
                    @foreach($columns as $column)
                        <div wire:key="column-{{ $column->id }}" class="flex-shrink-0 w-80">
                            <flux:card>
                                <div class="flex items-center justify-between mb-4">
                                    <div class="flex items-center gap-2">
                                        @if($column->color)
                                            <div class="w-3 h-3 rounded-full" style="background-color: {{ $column->color }}"></div>
                                        @endif
                                        <h3 class="font-semibold text-gray-900">{{ $column->name }}</h3>
                                        <span class="text-sm text-gray-500">({{ $column->items->count() }})</span>
                                    </div>
                                </div>

                                <div class="space-y-3">
                                    @forelse($column->items as $item)
                                        <div wire:key="item-{{ $item->id }}"
                                            class="p-4 bg-white border rounded-lg hover:shadow-md transition">
                                            <h4 class="font-medium text-gray-900 mb-2">{{ $item->title }}</h4>

                                            @if($item->description)
                                                <p class="text-sm text-gray-600 mb-3">{{ Str::limit($item->description, 100) }}</p>
                                            @endif

                                            <div class="flex items-center justify-between text-xs">
                                                <div class="flex items-center gap-2">
                                                    @if($item->priority)
                                                        <span
                                                            class="px-2 py-1 rounded-full 
                                                                                                        {{ $item->priority === 'high' ? 'bg-red-100 text-red-700' : '' }}
                                                                                                        {{ $item->priority === 'medium' ? 'bg-yellow-100 text-yellow-700' : '' }}
                                                                                                        {{ $item->priority === 'low' ? 'bg-green-100 text-green-700' : '' }}">
                                                            {{ ucfirst($item->priority) }}
                                                        </span>
                                                    @endif
                                                    <span class="px-2 py-1 rounded-full bg-gray-100 text-gray-700">
                                                        {{ ucfirst(str_replace('_', ' ', $item->status)) }}
                                                    </span>
                                                </div>

                                                @if($item->due_date)
                                                    <span class="text-gray-500">{{ $item->due_date->format('M d') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    @empty
                                        <p class="text-sm text-gray-500 text-center py-8">No items yet</p>
                                    @endforelse
                                </div>
                            </flux:card>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>