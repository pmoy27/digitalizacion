@extends('adminlte::page')
@vite('resources/css/app.css')
@section('title', 'Dashboard')
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />

<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
<link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap');

    :root {
        --font-family: 'Inter', sans-serif;
        --font-size: 1rem;
        --bg: white;

    }

    html,
    body {
        font-family: var(--font-family);
    }

    body {
        background-color: var(--bg);
    }

    .modal.fade .modal-content {
        opacity: 0;
        visibility: hidden;
        transform: scale(1.1);
    }

    .modal.show .modal-content {
        opacity: 1;
        visibility: visible;
        transform: scale(1);
    }

    .modal-content {
        transform: scale(1.1);
        transition: visibility 0.25s ease-out, opacity 0.25s ease-out,
            transform 0.25s ease-out;
    }

    /** Modal static */

    .modal.modal-static .modal-content {
        transform: scale(1.02);
    }
</style>
@section('content_header')
<h1>Almacen de Carpetas</h1>
@stop

@section('content')


<!-- Modal toggle -->
<button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
    </svg>
    Nueva Carpeta
</button>

<!-- Main modal -->
<div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Crear Nueva Carpeta
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Cerrar modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5">
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Ingrese nombre de la carpeta" required="">
                    </div>

                    <div class="col-span-2 ">
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo</label>
                        <select id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected="">Selecciones una Opción</option>
                            <option value="Publica">Publica</option>
                            <option value="Privada">Privada</option>
                        </select>
                    </div>

                </div>
                <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">

                    Generar
                </button>
            </form>
        </div>
    </div>
</div>

<div class="container  mx-auto flex ">
    @foreach ($carpetas as $carpeta)
    <a href="#" class="transition w-96 h-32 bg-white shadow rounded-lg overflow-hidden m-4 hover:-translate-y-1 hover:scale-110 duration-300">
        <div class="px-4 py-2">
            <div class="flex justify-between content-center justify-items-center mb-2 mt-2">
                <img src="{{ asset('img/carpeta.png') }}" alt="">
                <div class="flex gap-1 content-center justify-items-center">
                    <!-- Puedes agregar más detalles según tu modelo de carpetas -->
                </div>
            </div>
            <div class="mt-2">
                <h2 class="text-base font-medium text-gray-800">{{ $carpeta->nombre }}</h2>
            </div>
            <div class="py-1">
                <p class="text-xs text-gray-400">Archivos: {{ $carpeta->archivos_count }}</p>
            </div>
        </div>
    </a>
    @endforeach





</div>






@stop



@section('js')
<script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>

@stop