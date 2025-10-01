<x-layouts.app :title="__('Configuración')">
    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">
        <div class="mb-6">
            <flux:heading size="xl">{{ __('Configuración') }}</flux:heading>
            <flux:subheading>{{ __('Administra la configuración del sistema') }}</flux:subheading>
        </div>

        <div class="grid auto-rows-min gap-4 md:grid-cols-2 lg:grid-cols-3">
            <div class="rounded-lg border border-zinc-200 bg-white p-6 dark:border-zinc-700 dark:bg-zinc-900">
                <flux:heading size="lg" class="mb-2">{{ __('General') }}</flux:heading>
                <flux:text>{{ __('Configuración general del sistema') }}</flux:text>
            </div>

            <div class="rounded-lg border border-zinc-200 bg-white p-6 dark:border-zinc-700 dark:bg-zinc-900">
                <flux:heading size="lg" class="mb-2">{{ __('Usuarios') }}</flux:heading>
                <flux:text>{{ __('Gestión de usuarios y permisos') }}</flux:text>
            </div>

            <div class="rounded-lg border border-zinc-200 bg-white p-6 dark:border-zinc-700 dark:bg-zinc-900">
                <flux:heading size="lg" class="mb-2">{{ __('Sistema') }}</flux:heading>
                <flux:text>{{ __('Configuración del sistema') }}</flux:text>
            </div>
        </div>
    </div>
</x-layouts.app>
