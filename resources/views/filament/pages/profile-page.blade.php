<x-filament::page>
    <form wire:submit.prevent="submit">
        {{ $this->form }}
        
        <div class="mt-4">
            {{ $this->getFormActions() }}
        </div>
    </form>
</x-filament::page>
