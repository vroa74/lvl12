<?php

use Livewire\Volt\Component;

new class extends Component {
    public $content = '';
    
    public function save()
    {
        $this->validate([
            'content' => 'required|min:10',
        ]);
        
        session()->flash('success', 'Contenido guardado exitosamente!');
    }
}; ?>

<div>
    <x-layouts.app :title="__('Configuración')">
        <div class="flex h-full w-full flex-1 flex-col gap-6">
        <div class="mb-6">
            <flux:heading size="xl">{{ __('Editor Trix - Demo') }}</flux:heading>
            <flux:subheading>{{ __('Ejemplo de uso de Trix Editor con Livewire/Volt') }}</flux:subheading>
        </div>

        @if(session('success'))
            <div class="rounded-lg bg-green-50 p-4 dark:bg-green-900/20">
                <flux:text class="text-green-800 dark:text-green-200">{{ session('success') }}</flux:text>
            </div>
        @endif

        <form wire:submit="save" class="max-w-4xl space-y-6">
            <x-trix-editor 
                label="Contenido del artículo"
                model="content"
                placeholder="Escribe aquí tu contenido..."
            />
            
            @error('content')
                <flux:text class="text-sm text-red-600 dark:text-red-400">{{ $message }}</flux:text>
            @enderror

            <div class="flex gap-3">
                <flux:button type="submit" variant="primary" icon="check">
                    Guardar Contenido
                </flux:button>
            </div>
        </form>

        @if($content)
            <div class="mt-8 max-w-4xl">
                <flux:heading size="lg" class="mb-4">{{ __('Vista Previa:') }}</flux:heading>
                <div class="prose max-w-full rounded-lg border border-zinc-200 bg-white p-6 dark:prose-invert dark:border-zinc-700 dark:bg-zinc-900">
                    {!! $content !!}
                </div>
            </div>
        @endif
        </div>
    </x-layouts.app>
</div>

