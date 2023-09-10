<?php

use App\Models\Post;

use function Pest\Laravel\get;

use Illuminate\Support\Facades\Http;

it('checks the boxes for technical SEO', function () {
    Http::fake();

    $post = Post::factory()->published()->create();

    /** @var \NunoMaduro\LaravelMojito\ViewAssertion */
    $view = get(route('posts.show', $post))->assertView('posts.show');

    $view
        ->first('title')
        ->contains($post->title);

    $view
        ->hasMeta([
            'name' => 'description',
            'content' => $post->description,
        ])
        ->contains($post->title);

    $view
        ->hasMeta([
            'name' => 'twitter:image',
            'content' => 'https://via.placeholder.com/640x480.png/003344?text=Image%20not%20set.',
        ]);

    $view
        ->hasMeta([
            'property' => 'og:image',
            'content' => 'https://via.placeholder.com/640x480.png/003344?text=Image%20not%20set.',
        ]);

    $view
        ->first('h1')
        ->contains($post->title);
});
