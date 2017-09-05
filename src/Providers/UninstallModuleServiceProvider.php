<?php namespace Tukecx\Base\Pages\Providers;

use Illuminate\Support\ServiceProvider;

class UnInstallModuleServiceProvider extends ServiceProvider
{
    protected $module = 'Tukecx\Base\Pages';

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

    }

    public function boot()
    {
        app()->booted(function () {
            /**
             * Unset related permissions
             */
            acl_permission()->unsetPermissionByModule($this->module);
        });
    }
}
