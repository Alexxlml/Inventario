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
                            <input wire:model="nombre" type="text" name="nombre" id="nombre" class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="descripcion" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Descripción
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <input wire:model="descripcion" type="text" name="descripcion" id="descripcion" class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="categoria" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Categoria
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <select wire:model="categoria_seleccionada" id="categoria" name="categoria" class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                <option></option>
                                @foreach ($categorias as $categoria)
                                <option value="{{$categoria->id}}">{{$categoria->nombre_categoria}}</option>
                                @endforeach
                            </select>
                            </select>
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="sucursal" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Sucursal
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <select wire:model="sucursal_seleccionada" id="sucursal" name="sucursal" class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                <option></option>
                                @foreach ($sucursales as $sucursal)
                                <option value="{{$sucursal->id}}">{{$sucursal->nombre_sucursal}}</option>
                                @endforeach
                            </select>
                            </select>
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="precio" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Precio
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <input wire:model="precio" type="text" name="precio" id="precio" class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="street-address" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Fecha de compra
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <input wire:model="fecha_compra" name="fecha_compra" id="inputFechaNacimiento" type="date" value="{{ old('fecha_compra') }}" min="1961-08-29" max="" class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="pt-5">
            <div class="flex justify-end">
                <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Registrar
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