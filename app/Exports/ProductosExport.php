<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProductosExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    use Exportable;

    protected $productos;

    public function __construct($productos)
    {
        $this->productos = $productos;
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nombre',
            'Descripcion',
            'Categoria',
            'Sucursal',
            'Estado',
            'Precio',
            'Fecha de Compra',
            'Fecha de Creacion',
            'Fecha de Modificacion'
        ];
    }

    public function collection()
    {
        return $this->productos;
    }
}
