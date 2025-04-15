<?php

namespace App\Providers;

use App\Models\Comment;
use App\Policies\FeatureCommentPolicy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        Model::shouldBeStrict();
        Vite::prefetch(concurrency: 3);

        Gate::policy(Comment::class, FeatureCommentPolicy::class);
    }
}
