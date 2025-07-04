<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Group;

class GroupSeeder extends Seeder
{
    public function run(): void
    {
        Group::insert([
            ['name' => 'Marketing', 'description' => 'Handles all marketing strategies'],
            ['name' => 'Sales', 'description' => 'Responsible for lead conversion'],
            ['name' => 'Support', 'description' => 'Takes care of customer support'],
        ]);
    }
}
