<?php

use App\Models\User;

use function Pest\Laravel\actingAs;

use Illuminate\Support\Facades\Http;

use function Pest\Laravel\assertGuest;

it('includes the feed', function () {
    /** @var \NunoMaduro\LaravelMojito\ViewAssertion */
    $view = $this->assertView('components.app');

    $view->first('link[type="application/atom+xml"]')
        ->hasAttribute('href', url(config('feed.feeds.main.url')))
        ->hasAttribute('title', config('feed.feeds.main.title'));
});

it('includes the canonical link tag using the original URL', function () {
    /** @var \NunoMaduro\LaravelMojito\ViewAssertion */
    $view = $this->assertView('components.app', ['canonical' => 'https://example.com']);

    $view
        ->first('link[rel="canonical"]')
        ->hasAttribute('href', 'https://example.com');
});

it("includes the tracking script in production and when it's not user #1", function () {
    Http::fake();

    app()['env'] = 'production';

    assertGuest();

    /** @var \NunoMaduro\LaravelMojito\ViewAssertion */
    $view = $this->assertView('components.app');

    $view
        ->first('script[src="https://api.pirsch.io/pirsch-extended.js"]')
        ->hasAttribute('data-disable-page-views', '');
});

it("does not include the tracking script in production and when it's user #1", function () {
    Http::fake();

    app()['env'] = 'production';

    actingAs(User::find(1) ?? User::factory()->create(['id' => 1]));

    /** @var \NunoMaduro\LaravelMojito\ViewAssertion */
    $view = $this->assertView('components.app');

    $view->doesNotContain('https://api.pirsch.io/pirsch-extended.js');
});
