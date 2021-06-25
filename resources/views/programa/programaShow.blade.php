@extends('layouts.windmill')
@section('contenido')

<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Detalle de Programa
</h2>
<div class="grid gap-6 mb-8 md:grid-cols-2">
              <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                  {{$programa->nombre}}
                </h4>
                <p class="text-gray-600 dark:text-gray-400">
                  <ul>
                    <li>Dependencia: {{ $programa->dependencia }}</li>
                    <li>Calendario: {{$programa->calendario }}</li>
                    <li>Titular: {{$programa->titular }}</li>
                    <li>Folio: {{$programa->folio }}</li>
                  </ul
                </p>
              </div>
              
            </div>

  
   <form action="{{route('programa.destroy', $programa) }}" method="POST">
       @csrf
       @method('DELETE')
        <div>
       <button class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
               type="submit"
       >
                  <svg class="w-4 h-4 mr-2 -ml-1" fill="currentColor" aria-hidden="true" viewBox="0 0 20 20">
                    <path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" fill-rule="evenodd"></path>
                  </svg>
                  <span>Eliminar Programa</span>
                </button>
        </div>
       
   </form>
@endsection