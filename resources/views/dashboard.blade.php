<x-layouts::app :title="__('Dashboard')">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Dashboard</h1>
            <p class="mt-2 text-gray-600">Welcome to Sunday.com</p>
        </div>

        <div class="grid gap-6 md:grid-cols-3 mb-8">
            <flux:card>
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Total Boards</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">{{ auth()->user()->boards()->count() }}</p>
                    </div>
                    <flux:icon.squares-2x2 variant="outline" class="w-12 h-12 text-blue-500" />
                </div>
            </flux:card>

            <flux:card>
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Active Items</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">
                            {{ auth()->user()->createdItems()->whereIn('status', ['pending', 'in_progress'])->count() }}
                        </p>
                    </div>
                    <flux:icon.clipboard-document-list variant="outline" class="w-12 h-12 text-green-500" />
                </div>
            </flux:card>

            <flux:card>
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Completed Items</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">
                            {{ auth()->user()->createdItems()->where('status', 'completed')->count() }}</p>
                    </div>
                    <flux:icon.check-circle variant="outline" class="w-12 h-12 text-purple-500" />
                </div>
            </flux:card>
        </div>

        <flux:card>
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xl font-semibold text-gray-900">Quick Actions</h2>
            </div>
            <div class="flex gap-4">
                <flux:button href="{{ route('boards.index') }}" icon="squares-2x2">
                    View All Boards
                </flux:button>
            </div>
        </flux:card>
    </div>
</x-layouts::app>