<?php

namespace App\Providers;

use App\Nova\Basket;
use App\Nova\Category;
use App\Nova\ConsignmentNote;
use App\Nova\Dashboards\Main;
use App\Nova\Item;
use App\Nova\Order;
use App\Nova\Point;
use App\Nova\StockBalance;
use App\Nova\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
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

        Nova::footer(function ($request) {
            return Blade::render('
            <div>
                Developed by <a href="https://coded.tj/">coded.tj</a>
            </div>
        ');
        });

        $this->generateMenu();
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

    private function generateMenu(): void
    {
        Nova::mainMenu(function (Request $request) {
            return [
                MenuSection::dashboard(Main::class)->icon('chart-bar'),

                MenuSection::make(__('Admin'), [
                    MenuItem::resource(Point::class),
                    MenuItem::resource(User::class),
                ])->icon('collection')->collapsable(),

                MenuSection::make(__('Warehouse'), [
                    MenuItem::resource(Category::class),
                    MenuItem::resource(Item::class),
                    MenuItem::resource(ConsignmentNote::class),
                    MenuItem::resource(StockBalance::class),
                ])->icon('home')->collapsable(),

                MenuSection::make(__('Sales'), [
                    MenuItem::resource(Basket::class),
                    MenuItem::resource(Order::class),
                ])->icon('credit-card')->collapsable(),
            ];
        });
    }
}
