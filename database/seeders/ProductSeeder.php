<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = json_decode(file_get_contents(public_path('/data/data.json')), 1);
        $data = $data['yml_catalog']['shop']['offers']['offer'];
        $categories = Category::query()->with(['categories', 'parent'])->get()->keyBy('id')->toArray();
        $products = [];

        foreach ($data as $item){
            $subSubCategory = @$categories[$item['categoryId']['value']];
            $subCategory = @$subSubCategory['parent'];
            $category = $subCategory['parent'];

            if(!$category){
                $category = $subCategory;
                $subCategory = $subSubCategory;
                $subSubCategory = null;
            }

            $products[] = [
                'code' => $item['attributes']['id'],
                'category_id' => $category['id'],
                'category' => @$category['name'],
                'sub_category' => @$subCategory['name'],
                'sub_sub_category' => @$subSubCategory['name'],
                'name' => trim($item['name']['value']),
                'available' =>boolval($item['attributes']['available']),
                'url' => trim(@$item['url']['value']),
                'price' => @$item['price']['value'],
                'old_price' => @$item['oldprice']['value'],
                'currency' => @$item['currencyId']['value'],
                'picture' => trim(@$item['picture']['value']),
            ];
        }

        Product::query()->truncate();
        Product::query()->upsert($products, ['id']);
    }
}
