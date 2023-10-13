<?php

namespace App\Providers;

use App\Models\Opening;
use App\Models\Category;
use App\Actions\Subscribe;
use App\Repositories\PostRepository;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Vite;
use Illuminate\Foundation\Application;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use App\Repositories\CategoryRepository;
use Algolia\AlgoliaSearch\RecommendClient;
use App\Repositories\Contracts\PostRepositoryContract;
use App\Repositories\Contracts\CategoryRepositoryContract;

class AppServiceProvider extends ServiceProvider
{
    public function register() : void
    {
        $this->app->bind(CategoryRepositoryContract::class, CategoryRepository::class);

        $this->app->bind(PostRepositoryContract::class, PostRepository::class);

        $this->app->bind(RecommendClient::class, function (Application $app) {
            return RecommendClient::create(
                $app['config']->get('scout.algolia.id'),
                $app['config']->get('scout.algolia.secret')
            );
        });

        $this->app->bind(Subscribe::class, fn () => new Subscribe);
    }

    public function boot() : void
    {
        Model::preventAccessingMissingAttributes(! app()->isProduction());

        Model::unguard();

        // This categories variable I pass in this view composer is also used in the blog's navigation.
        View::composer('components.navigation', function ($view) {
            $categories ??= Category::whereHas('posts')
                ->orderBy('is_highlighted', 'desc')
                ->orderBy('name')
                ->get();

            $view->with(compact('categories'));
        });

        View::composer('*', function ($view) {
            static $opening;

            $opening ??= Opening::inRandomOrder()->first();

            $view->with(compact('opening'));
        });

        Vite::useScriptTagAttributes(['defer' => true]);
    }
}
