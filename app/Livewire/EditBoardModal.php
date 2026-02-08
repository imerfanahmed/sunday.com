<?php

namespace App\Livewire;

use App\Models\Board;
use Livewire\Component;

class EditBoardModal extends Component
{
    protected $listeners = ['open-edit-board-modal' => 'open'];

    public bool $show = false;

    public ?Board $board = null;

    public string $name = '';

    public string $description = '';

    public string $color = '#3B82F6';

    public function open(int $boardId): void
    {
        $this->board = Board::findOrFail($boardId);
        $this->authorize('update', $this->board);

        $this->name = $this->board->name;
        $this->description = $this->board->description ?? '';
        $this->color = $this->board->color ?? '#3B82F6';
        $this->show = true;
    }

    public function close(): void
    {
        $this->show = false;
        $this->reset(['board', 'name', 'description', 'color']);
    }

    public function save(): void
    {
        $this->authorize('update', $this->board);

        $validated = $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'color' => ['nullable', 'string', 'regex:/^#[0-9A-Fa-f]{6}$/'],
        ]);

        $this->board->update($validated);

        $this->close();
        $this->dispatch('board-updated');
    }

    public function render()
    {
        return view('livewire.edit-board-modal');
    }
}
