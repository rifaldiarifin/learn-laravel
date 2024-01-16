<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence(mt_rand(2, 6));
        $slug = Str::replace(' ', '-', Str::lower($title));
        return [
            'title' => $title,
            'category_id' => mt_rand(1, 3),
            'user_id' => mt_rand(1, 4),
            'slug' => Uuid::uuid4() . '-' . $slug,
            // 'body' => fake()->paragraph(mt_rand(4, 10)),
            'body' => '<div><strong>Lorem ipsum dolor sit amet consectetur adipisicing elit.&nbsp;</strong></div><div><br></div><div>Beatae dolorem necessitatibus laborum corporis obcaecati minima fuga eveniet? Ratione minima harum tenetur aperiam,vel possimus quae reprehenderit quisquam, itaque culpa, nam in excepturi vitae voluptatibus ipsa provident! Magnammolestiae maiores dignissimos nam atque facilis suscipit aperiam eos, natus soluta cum nostrum repudiandaedistinctio exercitationem incidunt impedit saepe similique dolores rem.&nbsp;</div><div><br></div><div>Quibusdam provident magnam consectetur praesentium voluptatibus, aliquid corrupti ullam, maxime ab assumendaquaerat temporibus voluptas tenetur. Rerum porro aperiam nihil dolores laboriosam id itaque nesciunt explicaboadipisci. Ducimus quis ullam deleniti iure fugit enim eaque nostrum laborum quidem saepe, debitis dolores?</div>',
            'status' => 'draft'
        ];
    }
}
