<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 3; $i++) {
            $new_post = new Post();

            $new_post->title = 'Post title' . ($i + 1);
            $new_post->slug = Str::slug($new_post->title, '-');
            $new_post->content = 'Lorem ipsum dolor sit amet, consectet lorem ipsum dolor lorem. Lorem ipsum dolor sit amet, consectet lorem ipsum dolor lorem. Lorem ipsum dolor sit amet, consectet lorem ipsum dolor lorem. Lorem ipsum dolor sit amet, consectet lorem ipsum dolor lorem. Lorem ipsum dolor sit amet, consectet lorem ipsum dolor lorem. Lorem ipsum dolor sit amet, consectet lorem ipsum dolor lorem.';

            $new_post->save();
        }
    }
}
