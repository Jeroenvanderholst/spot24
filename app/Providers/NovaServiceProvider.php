<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Dashboards\Main;
use Laravel\Nova\Menu\MenuItem;
use Laravel\Nova\Menu\MenuSection;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        Nova::withBreadcrumbs();

        Nova::withoutThemeSwitcher();

        Nova::mainMenu(function (Request $request) {
            return [
                Menusection::dashboard(Main::class)->icon('view-grid'),
                Menusection::Make('ETIM Entities', [
                    MenuItem::resource(\App\Nova\Group::class),
                    MenuItem::resource(\App\Nova\ProductClass::class),
                    MenuItem::resource(\App\Nova\ModellingGroup::class),
                    MenuItem::resource(\App\Nova\ModellingClass::class),
                    MenuItem::resource(\App\Nova\Feature::class),
                    MenuItem::resource(\App\Nova\Value::class),
                    MenuItem::resource(\App\Nova\Unit::class),
                    MenuItem::resource(\App\Nova\Release::class),
                ])->collapsable(),

                Menusection::Make('ETIM Translations',[
                    MenuItem::resource(\App\Nova\EtimLanguage::class),
                    MenuItem::resource(\App\Nova\Translation::class),
                    MenuItem::resource(\App\Nova\Synonym::class),
                    MenuItem::resource(\App\Nova\UnitTranslation::class),                    
                ])->collapsable(),

                Menusection::Make('ETIM Relations tables', [
                    MenuItem::resource(\App\Nova\ProductClassFeature::class),
                    MenuItem::resource(\App\Nova\FeatureValue::class),
                    MenuItem::resource(\App\Nova\ModellingClassFeature::class),
                    MenuItem::resource(\App\Nova\ModellingClassPort::class),
                    MenuItem::resource(\App\Nova\ClassRelease::class),             
                ])->collapsable(),
                ];

        });
    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
                ->withAuthenticationRoutes()
                ->withPasswordResetRoutes()
                ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            return in_array($user->email, [
                //
            ]);
        });
    }

    /**
     * Get the dashboards that should be listed in the Nova sidebar.
     *
     * @return array
     */
    protected function dashboards()
    {
        return [
            new \App\Nova\Dashboards\Main,
        ];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
