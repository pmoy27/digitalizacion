@extends('adminlte::page')
@vite('resources/css/app.css')

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />

<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
@section('title', 'Archivos')

@section('content_header')
<h1>Almacen de Archivos</h1>
@stop

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.tailwindcss.min.css">
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
<style>
    .hidden {
        display: none;
    }

    .loading-message {
        text-align: center;
        padding: 20px;
        font-weight: bold;
    }

    tr .esconder {
        opacity: 0;
        visibility: hidden;

    }

    .fila:hover .esconder {
        opacity: 1;
        visibility: visible;
    }
</style>


@endsection

@section('content')


<!-- Modal toggle -->
<div class="pb-4">
    <button data-modal-target="default-modal" data-modal-toggle="default-modal" class="text-white inline-flex items-center  bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
        </svg>
        Agregar Archivos
    </button>
</div>

<!-- Main modal -->
<div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-1 md:p-5 border-b rounded-t">
                <h3 class="text-s font-semibold text-gray-900">
                    Agregar Archivos Multiples
                </h3>
                <button type="button" class="text-gray-400 bg-transparent  hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 " data-modal-hide="default-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="p-3">
                <form action="/file-upload" class="dropzone flex flex-row items-center justify-center w-full h-20 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                    <div class="fallback">
                        <input name="file" type="file" multiple />
                    </div>
                </form>
            </div>


        </div>
    </div>
</div>



<div class="loading-message">Cargando...</div>
<div class="relative p-3 overflow-x-auto bg-white shadow-md sm:rounded-lg">
    <table id="example" class="hidden w-full text-sm text-left rtl:text-right text-gray-800 dark:text-gray-800" style="width:100%">
        <thead class="bg-blue-950 text-xs text-white uppercase   ">
            <tr>
                <th class="hidden">id</th>
                <th>Nombre del Archivo</th>
                <th>Tipo de Archivo</th>
                <th>Permisos</th>
                <th>Tamaño</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr class="fila hover:bg-gray-100 transition " ondblclick="myFunction(this)">
                <td class="hidden">12</td>
                <td class=" flex gap-4 items-center text-center">
                    <svg class="w-[14px] h-[14px] text-red-600 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M1 18a.969.969 0 0 0 .933 1h12.134A.97.97 0 0 0 15 18M1 7V5.828a2 2 0 0 1 .586-1.414l2.828-2.828A2 2 0 0 1 5.828 1h8.239A.97.97 0 0 1 15 2v5M6 1v4a1 1 0 0 1-1 1H1m0 9v-5h1.5a1.5 1.5 0 1 1 0 3H1m12 2v-5h2m-2 3h2m-8-3v5h1.375A1.626 1.626 0 0 0 10 13.375v-1.75A1.626 1.626 0 0 0 8.375 10H7Z" />
                    </svg>
                    <p>Presupuesto 2023</p>
                </td>
                <td>PDF</td>
                <td>Privado</td>
                <td>23,044 KB</td>
                <td class="flex gap-3 ">
                    <a href="" data-tooltip-target="Compartir" data-tooltip-trigger="hover" class="group relative esconder ">
                        <svg class="w-[15px] h-[15px] text-gray-800 group-hover:scale-110 transform transition-transform duration-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M13 8h6m-3 3V5m-6-.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0ZM5 11h3a4 4 0 0 1 4 4v2H1v-2a4 4 0 0 1 4-4Z" />
                        </svg>
                    </a>
                    <a href="" class="group relative esconder ">
                        <svg class="w-[15px] h-[15px] text-gray-800 group-hover:scale-110 transform transition-transform duration-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 1v11m0 0 4-4m-4 4L4 8m11 4v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-3" />
                        </svg>
                    </a>
                    <a href="" class="group relative esconder ">
                        <svg class="w-[14px] h-[14px] text-gray-800 group-hover:scale-110 transform transition-transform duration-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z" />
                        </svg>
                    </a>
                </td>

            </tr>
            <tr class="fila hover:bg-gray-100 transition " ondblclick="myFunction(this)">
                <td class="hidden">12</td>
                <td class=" flex gap-4 items-center text-center">
                    <svg class="w-[14px] h-[14px] text-red-600 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M1 18a.969.969 0 0 0 .933 1h12.134A.97.97 0 0 0 15 18M1 7V5.828a2 2 0 0 1 .586-1.414l2.828-2.828A2 2 0 0 1 5.828 1h8.239A.97.97 0 0 1 15 2v5M6 1v4a1 1 0 0 1-1 1H1m0 9v-5h1.5a1.5 1.5 0 1 1 0 3H1m12 2v-5h2m-2 3h2m-8-3v5h1.375A1.626 1.626 0 0 0 10 13.375v-1.75A1.626 1.626 0 0 0 8.375 10H7Z" />
                    </svg>
                    <p>Presupuesto 2023</p>
                </td>
                <td>PDF</td>
                <td>Privado</td>
                <td>23,044 KB</td>
                <td class="flex gap-3 ">
                    <a href="" data-tooltip-target="Compartir" data-tooltip-trigger="hover" class="group relative esconder ">
                        <svg class="w-[15px] h-[15px] text-gray-800 group-hover:scale-110 transform transition-transform duration-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M13 8h6m-3 3V5m-6-.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0ZM5 11h3a4 4 0 0 1 4 4v2H1v-2a4 4 0 0 1 4-4Z" />
                        </svg>
                    </a>
                    <a href="" class="group relative esconder ">
                        <svg class="w-[15px] h-[15px] text-gray-800 group-hover:scale-110 transform transition-transform duration-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 1v11m0 0 4-4m-4 4L4 8m11 4v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-3" />
                        </svg>
                    </a>
                    <a href="" class="group relative esconder ">
                        <svg class="w-[14px] h-[14px] text-gray-800 group-hover:scale-110 transform transition-transform duration-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z" />
                        </svg>
                    </a>
                </td>

            </tr>


        </tbody>
    </table>

</div>


<div id="Compartir" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
    Tooltip on bottom
    <div class="tooltip-arrow" data-popper-arrow></div>
</div>







@stop
@section('js')

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Mostrar mensaje de carga
        var loadingMessage = document.querySelector('.loading-message');
        loadingMessage.innerHTML = 'Cargando...';

        // Inicializar DataTable después de un breve retraso (simulando una carga asíncrona)
        setTimeout(function() {
            $('#example').DataTable();
            loadingMessage.style.display = 'none'; // Oculta el mensaje de carga
            document.getElementById('example').style.display = 'table'; // Muestra la tabla
        }, 1000); // Puedes ajustar el tiempo de espera según tus necesidades
    });
</script>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.tailwindcss.min.js"></script>
<script src="https://cdn.tailwindcss.com"></script>


<script>
    $(document).ready(function() {
        var table = new DataTable('#example', {

            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json',

            },
            autoWidth: false,
            lengthChange: false,
            pageLength: 10,
            processing: true,


            columnDefs: [{
                    orderable: false,
                    target: [2, 3, 5]
                },
                {
                    searchable: false,
                    target: [2, 3, 4]
                },
                {
                    width: 100,
                    targets: 2
                },
                {
                    width: 200,
                    targets: 5
                }
            ]

        });
    })
</script>
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<script>
    function myFunction(row) {
        // Accede a los datos de la fila usando `row`
        const archivo = row.firstElementChild.textContent;
        const tipo = row.children[1].textContent;
        // ... Realiza la acción deseada

        // Ejemplo: muestra una alerta con el nombre del archivo
        window.location.href = "file/id?" + archivo;
    }
</script>
@stop