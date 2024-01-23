<?php

// app/Exports/ProductsExport.php

namespace App\Exports;

use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ProductsExport implements FromCollection, WithHeadings, WithMapping
{
    protected $search;

    public function __construct($search)
    {
        $this->search = $search;
    }

    public function collection()
    {
        return Product::where('name', 'like', '%' . $this->search . '%')->get();
    }

    public function headings(): array
    {
        // Títulos de las columnas
        return [

            'Nombre',
            'SKU',
            'BODEGA ATOCONGO',
            'BODEGA JOCKEY PLAZA',
            'BODEGA MEGA PLAZA',
            'BODEGA HUAYLAS',
            'BODEGA PURUCHUCO',
            'Precio',
            'Categoria',
            'SubCategoria',

        ];
    }

    public function map($product): array
    {
        
        return [
            $product->name,
            $product->sku,
            $product->atocong,
            $product->jockeypz,
            $product->megaplz,
            $product->huaylas,
            $product->puruchu,
            $product->price,
            $product->subcategory->category->name,
            $product->subcategory->name,
        

        ];
    }
}
