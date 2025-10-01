<x-layouts.app :title="__('Editar Usuario')">
    <div class="flex h-full w-full flex-1 flex-col gap-6">
        <div class="flex items-center justify-between">
            <div>
                <flux:heading size="xl">{{ __('Editar Usuario') }}</flux:heading>
                <flux:subheading>{{ __('Modifica la información del usuario') }}</flux:subheading>
            </div>
            <flux:button :href="route('users.index')" variant="ghost" icon="arrow-left">
                {{ __('Volver') }}
            </flux:button>
        </div>

        <div class="max-w-3xl">
            <form action="{{ route('users.update', $user) }}" method="POST" class="space-y-6 rounded-lg border border-zinc-200 bg-white p-6 dark:border-zinc-700 dark:bg-zinc-900">
                @csrf
                @method('PUT')

                <div class="grid gap-6 md:grid-cols-2">
                    <!-- Nombre -->
                    <div>
                        <flux:input
                            label="Nombre completo"
                            name="name"
                            type="text"
                            :value="old('name', $user->name)"
                            required
                            placeholder="Nombre completo"
                        />
                        @error('name')
                            <flux:text class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</flux:text>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <flux:input
                            label="Correo electrónico"
                            name="email"
                            type="email"
                            :value="old('email', $user->email)"
                            required
                            placeholder="email@ejemplo.com"
                        />
                        @error('email')
                            <flux:text class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</flux:text>
                        @enderror
                    </div>

                    <!-- RFC -->
                    <div>
                        <flux:input
                            label="RFC"
                            name="rfc"
                            type="text"
                            :value="old('rfc', $user->rfc)"
                            required
                            maxlength="14"
                            placeholder="XAXX010101000"
                        />
                        @error('rfc')
                            <flux:text class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</flux:text>
                        @enderror
                    </div>

                    <!-- CURP -->
                    <div>
                        <flux:input
                            label="CURP"
                            name="curp"
                            type="text"
                            :value="old('curp', $user->curp)"
                            required
                            maxlength="19"
                            placeholder="XAXX010101HNEXXXA4"
                        />
                        @error('curp')
                            <flux:text class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</flux:text>
                        @enderror
                    </div>

                    <!-- Sexo -->
                    <div>
                        <flux:select label="Sexo" name="sex" required>
                            <option value="">Selecciona una opción</option>
                            <option value="masculino" {{ old('sex', $user->sex) == 'masculino' ? 'selected' : '' }}>Masculino</option>
                            <option value="femenino" {{ old('sex', $user->sex) == 'femenino' ? 'selected' : '' }}>Femenino</option>
                        </flux:select>
                        @error('sex')
                            <flux:text class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</flux:text>
                        @enderror
                    </div>

                    <!-- Cargo -->
                    <div>
                        <flux:select label="Cargo" name="cargo" required>
                            <option value="">Selecciona un cargo</option>
                            <option value="director" {{ old('cargo', $user->cargo) == 'director' ? 'selected' : '' }}>Director</option>
                            <option value="subdirector" {{ old('cargo', $user->cargo) == 'subdirector' ? 'selected' : '' }}>Subdirector</option>
                            <option value="trabajo social" {{ old('cargo', $user->cargo) == 'trabajo social' ? 'selected' : '' }}>Trabajo Social</option>
                            <option value="prefecto" {{ old('cargo', $user->cargo) == 'prefecto' ? 'selected' : '' }}>Prefecto</option>
                            <option value="administrativo" {{ old('cargo', $user->cargo) == 'administrativo' ? 'selected' : '' }}>Administrativo</option>
                            <option value="padre de familia" {{ old('cargo', $user->cargo) == 'padre de familia' ? 'selected' : '' }}>Padre de Familia</option>
                        </flux:select>
                        @error('cargo')
                            <flux:text class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</flux:text>
                        @enderror
                    </div>

                    <!-- Nivel -->
                    <div>
                        <flux:input
                            label="Nivel"
                            name="nivel"
                            type="number"
                            :value="old('nivel', $user->nivel)"
                            required
                            min="1"
                            max="10"
                        />
                        @error('nivel')
                            <flux:text class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</flux:text>
                        @enderror
                    </div>

                    <!-- Tema -->
                    <div>
                        <flux:select label="Tema" name="theme" required>
                            <option value="dark" {{ old('theme', $user->theme) == 'dark' ? 'selected' : '' }}>Oscuro</option>
                            <option value="light" {{ old('theme', $user->theme) == 'light' ? 'selected' : '' }}>Claro</option>
                        </flux:select>
                        @error('theme')
                            <flux:text class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</flux:text>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div>
                        <flux:select label="Estado del Usuario" name="status" required>
                            <option value="1" {{ old('status', $user->status) == '1' ? 'selected' : '' }}>Activo</option>
                            <option value="0" {{ old('status', $user->status) == '0' ? 'selected' : '' }}>Inactivo</option>
                        </flux:select>
                        @error('status')
                            <flux:text class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</flux:text>
                        @enderror
                    </div>

                    <!-- Password (opcional) -->
                    <div class="md:col-span-2">
                        <flux:text class="mb-2 text-sm text-zinc-600 dark:text-zinc-400">
                            Deja en blanco si no deseas cambiar la contraseña
                        </flux:text>
                    </div>

                    <!-- Password -->
                    <div>
                        <flux:input
                            label="Nueva contraseña"
                            name="password"
                            type="password"
                            placeholder="Mínimo 8 caracteres"
                        />
                        @error('password')
                            <flux:text class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</flux:text>
                        @enderror
                    </div>

                    <!-- Password Confirmation -->
                    <div>
                        <flux:input
                            label="Confirmar contraseña"
                            name="password_confirmation"
                            type="password"
                            placeholder="Confirmar contraseña"
                        />
                    </div>
                </div>

                <div class="flex justify-end gap-3">
                    <flux:button type="button" variant="ghost" :href="route('users.index')">
                        Cancelar
                    </flux:button>
                    <flux:button type="submit" variant="primary" icon="check">
                        Actualizar Usuario
                    </flux:button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>

