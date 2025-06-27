<x-form-layout>
    <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Departamento') }}
    </h2>
    </x-slot>

    <form method="POST" action="{{ route('departamento.create') }}">
        @csrf
        
        <div>
            <x-input-label for="nombre" :value="__('Nombre')"/>
            <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required autocomplete autofocus/>
            <x-input-error :message="$errors->get('nombre')" class="mt-2"/>
        </div>
        <div>proximamente...</div>

        <button class="inline-flex items-center mt-4 ms-24 px-6 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
        type="submit">Guardar</button>
    </form>

</x-form-layout>