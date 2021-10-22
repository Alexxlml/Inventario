<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Producto') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form wire:submit.prevent="registrar()" class="space-y-8 divide-y divide-gray-200" method="POST">
                    <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5 p-6">
                        <div>
                            <div class="space-y-6 sm:space-y-5">
                                <div>
                                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                                        Producto
                                    </h3>
                                </div>

                                <div class="space-y-6 sm:space-y-5">
                                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                        <label for="nombre" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                            Nombre
                                        </label>
                                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                                            <input wire:model="nombre" type="text" name="nombre" id="nombre" class="disabled:opacity-50 max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md" disabled>
                                            @error('nombre')
                                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                {{ $message }}
                                            </p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                        <label for="descripcion" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                            Descripción
                                        </label>
                                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                                            <textarea wire:model="descripcion" id="descripcion" name="descripcion" rows="3" class="disabled:opacity-50 max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md" disabled></textarea>
                                            @error('descripcion')
                                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                {{ $message }}
                                            </p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                        <label for="categoria" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                            Categoria
                                        </label>
                                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                                            <select wire:model="categoria_seleccionada" id="categoria" name="categoria" class="disabled:opacity-50 max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md" disabled>
                                                <option></option>
                                                @foreach ($categorias as $categoria)
                                                <option value="{{$categoria->id}}">{{$categoria->nombre_categoria}}</option>
                                                @endforeach
                                            </select>
                                            </select>
                                            @error('categoria_seleccionada')
                                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                {{ $message }}
                                            </p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                        <label for="sucursal" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                            Sucursal
                                        </label>
                                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                                            <select wire:model="sucursal_seleccionada" id="sucursal" name="sucursal" class="disabled:opacity-50 max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md" disabled>
                                                <option></option>
                                                @foreach ($sucursales as $sucursal)
                                                <option value="{{$sucursal->id}}">{{$sucursal->nombre_sucursal}}</option>
                                                @endforeach
                                            </select>
                                            </select>
                                            @error('sucursal_seleccionada')
                                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                {{ $message }}
                                            </p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                        <label for="precio" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                            Precio
                                        </label>
                                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                                            <input wire:model="precio" type="text" name="precio" id="precio" class="disabled:opacity-50 max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md" disabled>
                                            @error('precio')
                                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                {{ $message }}
                                            </p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                        <label for="fecha_compra" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                            Fecha de compra
                                        </label>
                                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                                            <input wire:model="fecha_compra" name="fecha_compra" id="fecha_compra" type="date" value="{{ old('fecha_compra') }}" min="1961-08-29" max="" class="disabled:opacity-50 max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md" disabled>
                                            @error('fecha_compra')
                                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                {{ $message }}
                                            </p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                        <label for="estado" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                            Estado
                                        </label>
                                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                                            <select wire:model="estado_seleccionado" id="estado" name="estado" class=" max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md" estado>
                                                @foreach ($estados as $estado)
                                                <option value="{{$estado->id}}">{{$estado->nombre_estado}}</option>
                                                @endforeach
                                            </select>
                                            </select>
                                            @error('estado_seleccionado')
                                            <p class="mt-1 mb-1 text-xs text-red-600 italic">
                                                {{ $message }}
                                            </p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                        <label for="comentarios" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                            Descripción
                                        </label>
                                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                                            <textarea wire:model="comentarios" id="comentarios" name="comentarios" rows="3" class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md"></textarea>
                                            @error('comentarios')
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
                                    Guardar
                                </button>
                            </div>
                        </div>
                </form>

                <script>
                    var today = new Date().toISOString().split('T')[0];
                    document.getElementsByName("fecha_compra")[0].setAttribute('max', today);

                    var after = new Date().toISOString().split('T')[0];
                    document.getElementsByName("fecha_compra")[0].setAttribute('min', '2021-01-01');

                </script>
            </div>
        </div>
    </div>
</div>
