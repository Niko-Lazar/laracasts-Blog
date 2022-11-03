<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Post::truncate();
        Category::truncate();

        $user = User::factory(1)->create();

        $personal = Category::create([
            'name' => 'Personal',
            'slug' => 'personal',
        ]);

        $family = Category::create([
            'name' => 'Family',
            'slug' => 'family',
        ]);

        $work = Category::create([
            'name' => 'Work',
            'slug' => 'work',
        ]);

        Post::create([
            'user_id' => 1,
            'category_id' => 1,
            'title' => 'My First Family Post',
            'slug' => 'my-first-post',
            'excerpt' => "<p>Lorem ipsum dolor sit amet. Est nihil quae aut enim debitis et reprehenderit consequatur. A tenetur excepturi</p>",
            'body' => "<p>Lorem ipsum dolor sit amet. Est nihil quae aut enim debitis et reprehenderit consequatur. A tenetur excepturi aut consequuntur dolorem eum consequatur quam est aliquid explicabo quo commodi nostrum sed quia commodi nam nihil quos. Et fugiat cupiditate et unde deserunt ab maiores impedit sed quia mollitia non tenetur nesciunt et eveniet excepturi ut sint maiores.Ea ipsum vitae est soluta labore est voluptates blanditiis et fuga accusamus non commodi distinctio quo internos officiis. Nam nesciunt magni ad recusandae ullam At velit quas. Qui consequatur nihil qui aperiam optio in molestiae dolorum eos itaque quia qui repellendus aperiam eum quia doloribus sit accusamus quia?</p>",
        ]);

        Post::create([
            'user_id' => 1,
            'category_id' => 2,
            'title' => 'My Second Work Post',
            'slug' => 'my-second-post',
            'excerpt' => "<p>Lorem ipsum dolor sit amet. Est nihil quae aut enim debitis et reprehenderit consequatur. A tenetur excepturi</p>",
            'body' => "<p>Lorem ipsum dolor sit amet. Est nihil quae aut enim debitis et reprehenderit consequatur. A tenetur excepturi aut consequuntur dolorem eum consequatur quam est aliquid explicabo quo commodi nostrum sed quia commodi nam nihil quos. Et fugiat cupiditate et unde deserunt ab maiores impedit sed quia mollitia non tenetur nesciunt et eveniet excepturi ut sint maiores.Ea ipsum vitae est soluta labore est voluptates blanditiis et fuga accusamus non commodi distinctio quo internos officiis. Nam nesciunt magni ad recusandae ullam At velit quas. Qui consequatur nihil qui aperiam optio in molestiae dolorum eos itaque quia qui repellendus aperiam eum quia doloribus sit accusamus quia?</p>",
        ]);
    }
}
