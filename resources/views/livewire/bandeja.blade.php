<div>
    <div class="flex flex-col">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <div class="grid grid-cols-4">
                        <div class=" col-span-1 flex px-2 py-2 border-t border-gray-200 sm:px-3 bg-white">
                            <select wire:model='perPage' class=" border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm mr-2">
                                <option value="5">5 por página</option>
                                <option value="10">10 por página</option>
                                <option value="25">25 por página</option>
                                <option value="50">50 por página</option>
                                <option value="100">100 por página</option>
                            </select>
                        </div>
                        <div class=" col-span-3 flex px-2 py-2 border-t border-gray-200 sm:px-3 bg-white">
                            <input wire:model="search" type="text" placeholder="Buscar" class="w-full col-span-3 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                    </div>
                </tr>
                @if ($productos->count())
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        <div class="flex justify-center text-center">
                            ID
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        <div class="flex text-left">
                            Nombre Prod.
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        <div class="flex text-left">
                            Categoría
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        <div class="flex text-left">
                            Sucursal
                        </div>
                    </th>
                    @if (auth()->user()->profile_id == 1)
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Acciones
                    </th>
                    @else
                    @endif
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($productos as $producto)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">
                        {{ $producto->id }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $producto->nombre }}
                    </td>
                    <td class="px-8 py-4 whitespace-nowrap text-left text-sm text-gray-800">
                        {{ $producto->nombre_categoria }}
                    </td>
                    <td class="px-8 py-4 whitespace-nowrap text-left text-sm text-gray-800">
                        {{ $producto->nombre_sucursal }}
                    </td>
                    <td>
                        <div class="flex justify-center py-4 cursor-pointer">
                            <div class="transform text-yellow-500 hover:text-yellow-700 hover:scale-150">
                                <a href="{{ url('/edit/' . $producto->id) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                        <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </div>
                            <div class="transform text-red-500 hover:text-red-700 hover:scale-150">
                                <a wire:click="triggerConfirm({{ $producto->id }})">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </div>
                            @if ($producto->estado_id == 2)
                            <div class="transform text-green-500 hover:text-green-700 hover:scale-150">
                                <a wire:click="descargaReporte({{ $producto->id }})">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </td>
                    @else
                    @endif
                </tr>
                @endforeach
                <!-- More items... -->
            </tbody>
        </table>
        <div class="px-4 py-3 bg-white border-t border-gray-200 sm:px-6">
            {{ $productos->links() }}
        </div>
        @else
        <div class="px-4 py-3 bg-white border-t border-gray-200 sm:px-6">
            <h6 class="text-center text-gray-500">No se encontró a ningún campo que coincida con:
                "{{ $search }}"</h6>
        </div>
        @endif
    </div>
</div>
