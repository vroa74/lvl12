<x-layouts.app :title="__('Ver Usuario')">
    <div class="flex h-full w-full flex-1 flex-col gap-6">
        <div class="flex items-center justify-between">
            <div>
                <flux:heading size="xl">{{ __('Información del Usuario') }}</flux:heading>
                <flux:subheading>{{ __('Detalles completos del usuario') }}</flux:subheading>
            </div>
            <div class="flex gap-2">
                <flux:button :href="route('users.edit', $user)" variant="primary" icon="pencil">
                    {{ __('Editar') }}
                </flux:button>
                <flux:button :href="route('users.index')" variant="ghost" icon="arrow-left">
                    {{ __('Volver') }}
                </flux:button>
            </div>
        </div>

        <div class="max-w-3xl space-y-6">
            <!-- Información Personal -->
            <div class="rounded-lg border border-zinc-200 bg-white p-6 dark:border-zinc-700 dark:bg-zinc-900">
                <flux:heading size="lg" class="mb-4">{{ __('Información Personal') }}</flux:heading>
                
                <div class="grid gap-4 md:grid-cols-2">
                    <div>
                        <flux:text class="text-sm font-medium text-zinc-500 dark:text-zinc-400">ID</flux:text>
                        <flux:text class="mt-1">{{ $user->id }}</flux:text>
                    </div>

                    <div>
                        <flux:text class="text-sm font-medium text-zinc-500 dark:text-zinc-400">Nombre Completo</flux:text>
                        <flux:text class="mt-1">{{ $user->name }}</flux:text>
                    </div>

                    <div>
                        <flux:text class="text-sm font-medium text-zinc-500 dark:text-zinc-400">Correo Electrónico</flux:text>
                        <flux:text class="mt-1">{{ $user->email }}</flux:text>
                    </div>

                    <div>
                        <flux:text class="text-sm font-medium text-zinc-500 dark:text-zinc-400">RFC</flux:text>
                        <flux:text class="mt-1">{{ $user->rfc }}</flux:text>
                    </div>

                    <div>
                        <flux:text class="text-sm font-medium text-zinc-500 dark:text-zinc-400">CURP</flux:text>
                        <flux:text class="mt-1">{{ $user->curp }}</flux:text>
                    </div>

                    <div>
                        <flux:text class="text-sm font-medium text-zinc-500 dark:text-zinc-400">Sexo</flux:text>
                        <flux:text class="mt-1">{{ ucfirst($user->sex) }}</flux:text>
                    </div>
                </div>
            </div>

            <!-- Información Laboral -->
            <div class="rounded-lg border border-zinc-200 bg-white p-6 dark:border-zinc-700 dark:bg-zinc-900">
                <flux:heading size="lg" class="mb-4">{{ __('Información Laboral') }}</flux:heading>
                
                <div class="grid gap-4 md:grid-cols-2">
                    <div>
                        <flux:text class="text-sm font-medium text-zinc-500 dark:text-zinc-400">Cargo</flux:text>
                        <flux:text class="mt-1">{{ ucfirst($user->cargo) }}</flux:text>
                    </div>

                    <div>
                        <flux:text class="text-sm font-medium text-zinc-500 dark:text-zinc-400">Nivel</flux:text>
                        <flux:text class="mt-1">{{ $user->nivel }}</flux:text>
                    </div>

                    <div>
                        <flux:text class="text-sm font-medium text-zinc-500 dark:text-zinc-400">Estado</flux:text>
                        <div class="mt-1">
                            @if($user->status)
                                <span class="inline-flex rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-800 dark:bg-green-900/20 dark:text-green-400">Activo</span>
                            @else
                                <span class="inline-flex rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-800 dark:bg-red-900/20 dark:text-red-400">Inactivo</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Preferencias -->
            <div class="rounded-lg border border-zinc-200 bg-white p-6 dark:border-zinc-700 dark:bg-zinc-900">
                <flux:heading size="lg" class="mb-4">{{ __('Preferencias') }}</flux:heading>
                
                <div class="grid gap-4 md:grid-cols-2">
                    <div>
                        <flux:text class="text-sm font-medium text-zinc-500 dark:text-zinc-400">Tema</flux:text>
                        <flux:text class="mt-1">{{ $user->theme == 'dark' ? 'Oscuro' : 'Claro' }}</flux:text>
                    </div>

                    <div>
                        <flux:text class="text-sm font-medium text-zinc-500 dark:text-zinc-400">Fecha de Registro</flux:text>
                        <flux:text class="mt-1">{{ $user->created_at->format('d/m/Y H:i') }}</flux:text>
                    </div>

                    <div>
                        <flux:text class="text-sm font-medium text-zinc-500 dark:text-zinc-400">Última Actualización</flux:text>
                        <flux:text class="mt-1">{{ $user->updated_at->format('d/m/Y H:i') }}</flux:text>
                    </div>
                </div>
            </div>

            <!-- Acciones -->
            <div class="flex justify-end gap-3">
                <form action="{{ route('users.destroy', $user) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este usuario?');">
                    @csrf
                    @method('DELETE')
                    <flux:button type="submit" variant="danger" icon="trash">
                        Eliminar Usuario
                    </flux:button>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app>

