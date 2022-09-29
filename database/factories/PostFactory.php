<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

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
    public function definition()
    {
        Storage::fake('avatars');
        $file = UploadedFile::fake()->image('avatar.jpg');
        $categoryId = Category::all()->random()->id;
        $userId = User::all()->random()->id;

        return [
            'title' => $this->faker->word(),
            'content' => $this->faker->sentence(),
            'image' => $file,
            'user_id' => $userId,
            'category_id' => $categoryId,
        ];
    }
}
