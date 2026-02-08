<?php

namespace App\Livewire;

use App\Models\Board;
use Livewire\Component;

class CreateColumnModal extends Component
{
    protected $listeners = ['open-create-column-modal' => 'open'];

    public bool $show = false;

    public ?Board $board = null;

    public string $name = '';

    public string $color = '#3B82F6';

    public function open(int $boardId): void
    {
        $this->board = Board::findOrFail($boardId);
        $this->authorize('view', $this->board);

        $this->show = true;
        $this->reset(['name', 'color']);
    }

    public function close(): void
    {
        $this->show = false;
        $this->reset(['board', 'name', 'color']);
    }

    public function save(): void
    {
        $this->authorize('view', $this->board);

        $validated = $this->validate([
            'name' => 'required|string|max:255',
            'color' => ['nullable', 'string', 'regex:/^#[0-9A-Fa-f]{6}$/'],
        ]);

        // Get the next position
        $nextPosition = $this->board->columns()->max('position') + 1;

        $this->board->columns()->create([
            'name' => $validated['name'],
            'color' => $validated['color'],
            'position' => $nextPosition,
        ]);

        $this->close();
        $this->dispatch('column-created');
    }

    public function render()
    {
        return view('livewire.create-column-modal');
    }
}
