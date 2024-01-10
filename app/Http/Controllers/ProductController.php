<?php

namespace App\Http\Controllers;

use App\Exports\ProductsExport;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        // FILTER
        if (@$request['name']) {
            $query->where(DB::raw('lower(name)'),'like', '%' . mb_strtolower($request['name']) . '%');
        }

        if (@$request['category_name']) {
            // TODO get from category id
            $query->where(function (Builder $query) use ($request) {
                $query->where('category', $request['category_name']);
                $query->orWhere('sub_category', $request['category_name']);
                $query->orWhere('sub_sub_category', $request['category_name']);
            });
        }

        $products = $query->paginate()->withQueryString();

        return inertia('Products/Index', compact('products'));
    }
    public function export(): BinaryFileResponse
    {
        $datetime = str_replace([' ',':'],'_', strval(now()));

        return Excel::download(new ProductsExport, "products_$datetime.xlsx");
    }

}
