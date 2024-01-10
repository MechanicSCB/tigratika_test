<?php

namespace App\Exports;

use App\Models\Product;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ProductsExport implements FromCollection, WithHeadings, ShouldAutoSize, WithColumnWidths, WithStyles
{
    protected array $fields;
    protected array $exclude = ['created_at', 'updated_at', 'category_id'];

    public function __construct()
    {
        $this->fields = array_filter(Schema::getColumnListing('products'), fn($v) => ! in_array($v,$this->exclude));
    }

    /**
     * @return Collection
     */
    public function collection(): Collection
    {
        return Product::query()->get($this->fields);
    }

    public function headings(): array
    {
        return $this->fields;
    }

    public function columnWidths(): array
    {
        return [
            'B' => 25,
            'C' => 25,
            'D' => 25,
            'E' => 10,
            'H' => 10,
        ];
    }
    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],

            // Styling a specific cell by coordinate.
            // 'B2' => ['font' => ['italic' => true]],

            // Styling an entire column.
            // 'C'  => ['font' => ['size' => 16]],
        ];
    }
}
