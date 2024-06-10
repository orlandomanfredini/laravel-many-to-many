<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tecnology;
use Illuminate\Support\Str;

class TecnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $tecnologyes = ['Git', 'GitHub', 'Trello', 'Asana', 'Jira'];

        foreach($tecnologyes as $tecnologye){
            $new_tecnolgy = new Tecnology;
            $new_tecnolgy->tecnology=$tecnologye;
            $new_tecnolgy->slug= Str::slug($tecnologye);

            $new_tecnolgy->save();
        }

    }
}
