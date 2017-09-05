<?php namespace Tukecx\Base\Pages\Providers;

use Illuminate\Support\ServiceProvider;
use Tukecx\Base\Pages\Models\Page;
use Tukecx\Base\Pages\Repositories\Contracts\PageContract;
use Tukecx\Base\Pages\Repositories\PageRepository;
use Tukecx\Base\Pages\Repositories\PageRepositoryCacheDecorator;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PageContract::class, function () {
            $repository = new PageRepository(new Page());

            if (config('tukecx-caching.repository.enabled')) {
                return new PageRepositoryCacheDecorator($repository);
            }

            return $repository;
        });
    }
}
