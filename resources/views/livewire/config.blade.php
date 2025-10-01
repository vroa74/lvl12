<?php

use Livewire\Volt\Component;

new class extends Component {
    public $content = '';
    public $name = '';
    public $email = '';
    public $role = '';
    public $status = false;
    public $country = '';
    public $description = '';
    public $notifications = true;
    public $selectedOption = '';
    
    public function save()
    {
        session()->flash('success', 'Formulario guardado exitosamente!');
    }
}; ?>

<div>
    <x-layouts.app :title="__('Componentes Flux UI - Demo')">
        <div class="flex h-full w-full flex-1 flex-col gap-8">
            
            <div class="mb-6">
                <flux:heading size="xl">{{ __('Componentes Flux UI - Demostración') }}</flux:heading>
                <flux:subheading>{{ __('Ejemplos de todos los componentes disponibles') }}</flux:subheading>
            </div>

            @if(session('success'))
                <div class="rounded-lg bg-green-50 p-4 dark:bg-green-900/20">
                    <div class="flex items-center gap-2">
                        <flux:icon icon="check-circle" class="size-5 text-green-600 dark:text-green-400" />
                        <flux:text class="text-green-800 dark:text-green-200">{{ session('success') }}</flux:text>
                    </div>
                </div>
            @endif

            <!-- Sección: Botones -->
            <div class="rounded-lg border border-zinc-200 bg-white p-6 dark:border-zinc-700 dark:bg-zinc-900">
                <flux:heading class="mb-4">Botones</flux:heading>
                <div class="flex flex-wrap gap-3">
                    <flux:button variant="primary" icon="check">Primario</flux:button>
                    <flux:button variant="danger" icon="trash">Peligro</flux:button>
                    <flux:button variant="ghost" icon="pencil">Ghost</flux:button>
                    <flux:button variant="outline" icon="plus">Outline</flux:button>
                    <flux:button size="sm" icon="star">Pequeño</flux:button>
                    <flux:button icon="arrow-up">Grande</flux:button>
                    <flux:button disabled icon="x-mark">Deshabilitado</flux:button>
                </div>
            </div>

            <!-- Sección: Inputs -->
            <div class="rounded-lg border border-zinc-200 bg-white p-6 dark:border-zinc-700 dark:bg-zinc-900">
                <flux:heading class="mb-4">Inputs</flux:heading>
                <div class="grid gap-4 md:grid-cols-2">
                    <flux:input 
                        wire:model="name"
                        label="Nombre completo" 
                        placeholder="Ingresa tu nombre"
                        icon="user"
                    />
                    <flux:input 
                        wire:model="email"
                        label="Correo electrónico" 
                        type="email"
                        placeholder="email@ejemplo.com"
                        icon="envelope"
                    />
                    <flux:input 
                        label="Contraseña" 
                        type="password"
                        placeholder="Mínimo 8 caracteres"
                        viewable
                    />
                    <flux:input 
                        label="Teléfono" 
                        type="tel"
                        placeholder="+52 123 456 7890"
                        icon="phone"
                    />
                </div>
            </div>

            <!-- Sección: Select -->
            <div class="rounded-lg border border-zinc-200 bg-white p-6 dark:border-zinc-700 dark:bg-zinc-900">
                <flux:heading class="mb-4">Select & Dropdown</flux:heading>
                <div class="grid gap-4 md:grid-cols-2">
                    <flux:select wire:model="role" label="Rol" placeholder="Selecciona un rol">
                        <option value="admin">Administrador</option>
                        <option value="user">Usuario</option>
                        <option value="guest">Invitado</option>
                    </flux:select>

                    <flux:select wire:model="country" label="País">
                        <option value="">Selecciona un país</option>
                        <option value="mx">México</option>
                        <option value="us">Estados Unidos</option>
                        <option value="es">España</option>
                        <option value="ar">Argentina</option>
                    </flux:select>
                </div>
            </div>

            <!-- Sección: Textarea -->
            <div class="rounded-lg border border-zinc-200 bg-white p-6 dark:border-zinc-700 dark:bg-zinc-900">
                <flux:heading class="mb-4">Textarea</flux:heading>
                <flux:textarea 
                    wire:model="description"
                    label="Descripción" 
                    placeholder="Escribe una descripción detallada..."
                    rows="4"
                />
            </div>

            <!-- Sección: Editor Trix -->
            <div class="rounded-lg border border-zinc-200 bg-white p-6 dark:border-zinc-700 dark:bg-zinc-900">
                <flux:heading class="mb-4">Editor de Texto Enriquecido (Trix)</flux:heading>
                <x-trix-editor 
                    label="Contenido del artículo"
                    model="content"
                    placeholder="Escribe aquí tu contenido con formato..."
                />
            </div>

            <!-- Sección: Checkboxes & Radio -->
            <div class="rounded-lg border border-zinc-200 bg-white p-6 dark:border-zinc-700 dark:bg-zinc-900">
                <flux:heading class="mb-4">Checkboxes & Radio Buttons</flux:heading>
                
                <div class="mb-6">
                    <flux:text class="mb-3 font-medium">Checkboxes:</flux:text>
                    <div class="space-y-2">
                        <flux:checkbox wire:model="status" label="Acepto los términos y condiciones" />
                        <flux:checkbox wire:model="notifications" label="Recibir notificaciones por email" />
                        <flux:checkbox label="Suscribirse al boletín" />
                    </div>
                </div>

                <div>
                    <flux:text class="mb-3 font-medium">Radio Buttons:</flux:text>
                    <flux:radio.group wire:model="selectedOption">
                        <flux:radio value="option1" label="Opción 1" />
                        <flux:radio value="option2" label="Opción 2" />
                        <flux:radio value="option3" label="Opción 3" />
                    </flux:radio.group>
                </div>
            </div>

            <!-- Sección: Switch -->
            <div class="rounded-lg border border-zinc-200 bg-white p-6 dark:border-zinc-700 dark:bg-zinc-900">
                <flux:heading class="mb-4">Switch Toggle</flux:heading>
                <div class="space-y-3">
                    <flux:switch label="Habilitar notificaciones" />
                    <flux:switch label="Modo oscuro" />
                    <flux:switch label="Sincronización automática" />
                </div>
            </div>

            <!-- Sección: Badges -->
            <div class="rounded-lg border border-zinc-200 bg-white p-6 dark:border-zinc-700 dark:bg-zinc-900">
                <flux:heading class="mb-4">Badges</flux:heading>
                <div class="flex flex-wrap gap-3">
                    <flux:badge>Default</flux:badge>
                    <flux:badge color="green">Activo</flux:badge>
                    <flux:badge color="red">Inactivo</flux:badge>
                    <flux:badge color="blue">Nuevo</flux:badge>
                    <flux:badge color="yellow">Pendiente</flux:badge>
                    <flux:badge color="purple">Premium</flux:badge>
                </div>
            </div>

            <!-- Sección: Iconos -->
            <div class="rounded-lg border border-zinc-200 bg-white p-6 dark:border-zinc-700 dark:bg-zinc-900">
                <flux:heading class="mb-4">Iconos</flux:heading>
                <div class="flex flex-wrap gap-4 text-zinc-700 dark:text-zinc-300">
                    <flux:icon icon="home" class="size-6" />
                    <flux:icon icon="user" class="size-6" />
                    <flux:icon icon="envelope" class="size-6" />
                    <flux:icon icon="cog-6-tooth" class="size-6" />
                    <flux:icon icon="bell" class="size-6" />
                    <flux:icon icon="heart" class="size-6" />
                    <flux:icon icon="star" class="size-6" />
                    <flux:icon icon="trash" class="size-6" />
                    <flux:icon icon="pencil" class="size-6" />
                    <flux:icon icon="check" class="size-6" />
                </div>
            </div>

            <!-- Sección: Tooltips -->
            <div class="rounded-lg border border-zinc-200 bg-white p-6 dark:border-zinc-700 dark:bg-zinc-900">
                <flux:heading class="mb-4">Tooltips</flux:heading>
                <div class="flex gap-4">
                    <flux:tooltip content="Esto es un tooltip">
                        <flux:button>Hover aquí</flux:button>
                    </flux:tooltip>
                    <flux:tooltip content="Tooltip en la parte superior" position="top">
                        <flux:button>Top</flux:button>
                    </flux:tooltip>
                    <flux:tooltip content="Tooltip a la derecha" position="right">
                        <flux:button>Right</flux:button>
                    </flux:tooltip>
                </div>
            </div>

            <!-- Sección: Separadores -->
            <div class="rounded-lg border border-zinc-200 bg-white p-6 dark:border-zinc-700 dark:bg-zinc-900">
                <flux:heading class="mb-4">Separadores</flux:heading>
                <flux:text>Texto antes del separador</flux:text>
                <flux:separator class="my-4" />
                <flux:text>Texto después del separador</flux:text>
            </div>

            <!-- Botón de prueba -->
            <div class="flex justify-center">
                <flux:button wire:click="save" variant="primary" icon="check">
                    Guardar Todo
                </flux:button>
            </div>

        </div>
    </x-layouts.app>
</div>

