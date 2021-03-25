<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 15 ; $i++) { 
            $newPost = new Post();
            $newPost->title = 'esempio-post';
            $newPost->content = $faker->paragraph(2);
            $newPost->user_id = 1;


            $slug = Str::of($newPost->title);// dichiaro la costruzione base dello slug
            $primoSlug = $slug; // mi salvo lo slug creato
            
            
            
            $postEsistente = post::where('slug', $slug)->first();// prendo il primo post con lo slug uguale ad altri (nel caso esista)
            $contatore = 1; // inizializzo la variabile a 0
            
            
            while ($postEsistente) { // se esiste un post con uno slug uguale
                $slug = $primoSlug . ' - ' .$contatore; // costruisco uno slug concatenando lo slug creato . - . numerocrescente
                $postEsistente = post::where('slug', $slug)->first(); // lo assegno al PRIMO post uguale 
                $contatore++; // aumento il numero
            }
            
            $newPost->slug = $slug; // assegno lo slug 


            $newPost->save();
        }
    }
}
