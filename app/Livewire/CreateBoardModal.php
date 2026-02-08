<?php

namespace App\Livewire;

use Livewire\Component;

class CreateBoardModal extends Component
{
    protected $listeners = ['open-create-board-modal' => 'open'];

    public bool $show = false;

    public string $name = '';

    public string $description = '';

    public string $color = '#3B82F6';

    public function open(): void
    {
        $this->show = true;
        $this->reset(['name', 'description']);
    }

    public function close(): void
    {
        $this->show = false;
        $this->reset(['name', 'description', 'color']);
    }

    public function save(): void
    {
        $validated = $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'color' => ['nullable', 'string', 'regex:/^#[0-9A-Fa-f]{6}$/'],
        ]);

        auth()->user()->boards()->create($validated);

        $this->close();
        $this->dispatch('board-created');
    }

    public function render()
    {
        return view('livewire.create-board-modal');
    }
}
