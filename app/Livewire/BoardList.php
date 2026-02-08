<?php

namespace App\Livewire;

use App\Models\Board;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class BoardList extends Component
{
    protected $listeners = ['board-created' => '$refresh', 'board-updated' => '$refresh'];

    public function deleteBoard(int $boardId): void
    {
        $board = Board::findOrFail($boardId);

        $this->authorize('delete', $board);

        $board->delete();
    }

    public function render()
    {
        return view('livewire.board-list', [
            'boards' => auth()->user()->boards()->with('columns.items')->get(),
        ]);
    }
}
