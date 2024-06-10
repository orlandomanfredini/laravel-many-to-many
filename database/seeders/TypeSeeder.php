<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\type;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $types = ['html', 'css', 'javascript', 'php', 'blade', 'scss'];

        foreach($types as $type){
            $new_type= new Type;
            $new_type->type=$type;
            $new_type->slug= Str::slug($type);

            $new_type->save();
        }
    }
}
