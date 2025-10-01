@props(['id' => 'trix-' . uniqid(), 'model' => null, 'label' => null, 'placeholder' => ''])

<div {{ $attributes->merge(['class' => 'w-full']) }}>
    @if($label)
        <label for="{{ $id }}" class="mb-2 block text-sm font-medium text-zinc-700 dark:text-zinc-300">
            {{ $label }}
        </label>
    @endif
    
    <input id="{{ $id }}" type="hidden" name="{{ $model }}" @if($model) wire:model="{{ $model }}" @endif />
    
    <trix-editor 
        input="{{ $id }}"
        placeholder="{{ $placeholder }}"
        class="trix-content prose max-w-full rounded-md border border-zinc-300 bg-white dark:border-zinc-600 dark:bg-zinc-800 dark:text-zinc-100"
    ></trix-editor>
</div>

@push('styles')
<style>
    trix-toolbar .trix-button-group {
        border-radius: 0.375rem;
    }
    
    trix-toolbar {
        background: white;
        border: 1px solid rgb(212 212 216);
        border-bottom: 0;
        border-radius: 0.375rem 0.375rem 0 0;
    }
    
    .dark trix-toolbar {
        background: rgb(39 39 42);
        border-color: rgb(82 82 91);
    }
    
    trix-editor {
        min-height: 200px;
        border-top: 0;
        border-radius: 0 0 0.375rem 0.375rem;
    }
    
    .dark trix-editor {
        color: rgb(244 244 245);
    }
    
    trix-editor:focus {
        outline: none;
        border-color: rgb(59 130 246);
    }
    
    .dark trix-editor:focus {
        border-color: rgb(96 165 250);
    }
</style>
@endpush

