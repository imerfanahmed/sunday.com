<?php

namespace App\Livewire;

use App\Models\Board;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class BoardView extends Component
{
    protected $listeners = ['column-created' => '$refresh'];

    public Board $board;

    public function mount(Board $board): void
    {
        $this->authorize('view', $board);
    }

    public function render()
    {
        return view('livewire.board-view', [
            'columns' => $this->board->columns()
                ->with(['items' => fn ($q) => $q->ordered()])
                ->ordered()
                ->get(),
        ]);
    }
}
