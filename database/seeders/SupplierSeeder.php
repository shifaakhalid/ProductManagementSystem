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
  
            $supplier = ['awais', 'raza', 'usman', 'talha'];

        foreach ($supplier as $name) {
            Supplier::create(['name' => $name]); //
    }
    }
}

