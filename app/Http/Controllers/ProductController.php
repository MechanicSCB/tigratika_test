<?php

namespace App\Http\Controllers;

use App\Exports\ProductsExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ProductController extends Controller
{
    public function export(): BinaryFileResponse
    {
        $datetime = str_replace([' ',':'],'_', strval(now()));

        return Excel::download(new ProductsExport, "products_$datetime.xlsx");
    }

}
