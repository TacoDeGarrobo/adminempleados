<x-form-layout>
    <form method="POST" action="{{ route('create') }}">
        @csrf

        <!--Campos de formulario-->
        <div>
            <x-input-label for="nombre" :value="__('Nombre')"/>
            <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required autofocus autocomplete/>
            <x-input-error :messages="$errors->get('nombre')" class="mt-2"/>
        </div>

        <div>
            <x-input-label for="correo" :value="__('Correo')"/>
            <x-text-input id="correo" class="block mt-1 w-full" type="email" name="correo" :value="old('correo')"/>
            <x-input-error :messages="$errors->get('correo')" class="mt-2"/>
        </div>

        <div>
            <x-input-label for="edad" :value="__('Edad')"/>
            <x-text-input id="edad" class="block mt-1 w-full" type="text" name="edad" :value="old('edad')" required autocomplete/>
            <x-input-error :messages="$errors->get('edad')" class="mt-2"/>
        </div>
    
        <div>
            <x-input-label for="puesto" :value="__('Puesto')"/>
            <x-text-input id="puesto" class="block mt-1 w-full" type="text" name="puesto" :value="old('puesto')" required autocomplete/>
            <x-input-error :messages="$errors->get('puesto')" class="mt-2"/>
        </div>

        <div>
            <x-input-label for="departamento" :value="__('Departamento')"/>
            <x-text-input id="departamento" class="block mt-1 w-full" type="text" name="departamento" :value="old('departamento')" required autocomplete/>
            <x-input-error :messages="$errors->get('departamento')" class="mt-2"/>
        </div>

        <!--Boton de enviar-->
        <button class="inline-flex items-center mt-4 ms-24 px-6 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
        type="submit">Guardar</button>

    </form>
</x-form-layout>