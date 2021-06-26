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
              <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                  Prestadores en el programa
                </h4>
                <p class="text-gray-600 dark:text-gray-400">
                    <ul>
                        @foreach ($programa->prestadores as $prestador)
                            <li>{{ $prestador->nombre }}</li>
                        @endforeach
                    </ul
                </p>
                </div>
</div>

              <div class="grid gap-6 mb-8 md:grid-cols-2">

              <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                  Agregar Prestadores
                </h4>
                <p class="text-gray-600 dark:text-gray-400">
                  <form action="{{ route('programa.agrega-prestador', $programa) }}" method="POST">
                  @csrf
                      <label class="block mt-4 text-sm">
                          <span class="text-gray-700 dark:text-gray-400">
                            Seleccione Prestador
                          </span>
                          <select class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-multiselect focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" multiple=""
                                name="prestador_id[]"
                                >
                                @foreach ($prestadores as $prestador)
                                    <option value="{{ $prestador->id }}" {{array_search($prestador->id, $programa->prestadores->pluck('id')->toArray()) !== false ? 'selected' : '' }}>{{ $prestador->nombre }}</option>
                                @endforeach
                          </select>
                  </label>

                  <button class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
               type="submit"
       >
                  
                  <span>Actualiza prestadores</span>
                </button>
                  </form>
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