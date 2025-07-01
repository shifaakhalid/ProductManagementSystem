<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Supplier;
class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */public function run()
{
   
    Supplier::create(['name' => 'Supplier One']);
    Supplier::create(['name' => 'Supplier Two']);
    Supplier::create(['name' => 'Supplier Three']);
}


}
