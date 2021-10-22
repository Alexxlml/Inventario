<div>
    <div class="bg-white px-4 py-5 border-b border-gray-200 sm:px-6">
        <div class="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-nowrap">
            <div class="ml-4 mt-2">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    CSV
                </h3>
            </div>
            <div class="ml-4 mt-2 flex-shrink-0">
                <button wire:click="exportAll()" type="button" class="mr-2 relative inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    Descarga Masiva
                </button>

                <button wire:click="elegirForm(1)" type="button" class="relative inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    Descarga por fecha
                </button>
            </div>
        </div>
    </div>
    <div class="@if($bandera == 1) p-6 @else @endif">

        @if ($bandera == 1)
        <form class="space-y-8 divide-y divide-gray-200">
            <div class="space-y-8 divide-y divide-gray-200">
                <div>
                    <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                        <div class="sm:col-span-3">
                            <label for="first-name" class="block text-sm font-medium text-gray-700">
                                Fecha inicio
                            </label>
                            <div class="mt-1">
                                <input wire:model="fecha_compra" name="fecha_compra" id="fecha_compra" type="date" value="{{ old('fecha_compra') }}" min="" max="" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                @error('fecha_compra')
                                <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="last-name" class="block text-sm font-medium text-gray-700">
                                Fecha termino
                            </label>
                            <div class="mt-1">
                                <input wire:model="fecha_compra" name="fecha_compra" id="fecha_compra" type="date" value="{{ old('fecha_compra') }}" min="" max="" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                @error('fecha_compra')
                                <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pt-5">
                <div class="flex justify-end">
                    <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Generar
                    </button>
                </div>
            </div>
        </form>
        @else
        @endif
    </div>
</div>
