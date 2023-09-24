<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = [
            [
                'title' => 'post one' , 
                'excerpt' => 'summary of post 1' , 
                'body' => 'body of post 1' , 
                'image_path' => 'empty' ,
                'is_published'  => false ,
                'min_to_read' => 2 
            ],       [
                'title' => 'post tow' , 
                'excerpt' => 'summary of post 1' , 
                'body' => 'body of post 2' , 
                'image_path' => 'empty' ,
                'is_published'  => true ,
                'min_to_read' => 2 
            ],       [
                'title' => 'post three' , 
                'excerpt' => 'summary of post 3' , 
                'body' => 'body of post 3' , 
                'image_path' => 'empty' ,
                'is_published'  => false ,
                'min_to_read' => 2 
            ],       [
                'title' => 'post 4' , 
                'excerpt' => 'summary of post 4' , 
                'body' => 'body of post 4' , 
                'image_path' => 'empty' ,
                'is_published'  => false ,
                'min_to_read' => 2 
            ],
        ] ;

        foreach($posts as $key => $value){
            Post::create($value);
        }

    }
}
