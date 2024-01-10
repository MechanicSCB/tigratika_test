<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = json_decode(file_get_contents(public_path('/data/data.json')), 1);
        $data = $data['yml_catalog']['shop']['categories']['category'];
        $categories = [];

        foreach ($data as $item){
            $categories[] = [
                'id' => $item['attributes']['id'],
                'parent_id' => @$item['attributes']['parentId'],
                'name' => trim($item['value']),
            ];
        }

        Category::query()->upsert($categories, ['id']);
    }
}
