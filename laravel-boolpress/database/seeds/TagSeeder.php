<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 15 ; $i++) { 
            $newTag = new Tag();
            $newTag->name = 'esempio-tag';

            $slug = Str::slug($newTag->name);// dichiaro la costruzione base dello slug
            $primoSlug = $slug; // mi salvo lo slug creato
            
            
            
            $tagEsistente = tag::where('slug', $slug)->first();// prendo il primo post con lo slug uguale ad altri (nel caso esista)
            $contatore = 1; // inizializzo la variabile a 0
            
            
            while ($tagEsistente) { // se esiste un post con uno slug uguale
                $slug = $primoSlug.'-'.$contatore; // costruisco uno slug concatenando lo slug creato . - . numerocrescente
                $tagEsistente = tag::where('slug', $slug)->first(); // lo assegno al PRIMO post uguale 
                $contatore++; // aumento il numero
            }
            
            $newTag->slug = $slug; // assegno lo slug 


            $newTag->save();
        }
    }
}
