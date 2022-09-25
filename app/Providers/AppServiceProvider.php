<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use MailchimpMarketing\ApiClient;
use App\Services\Newsletter;
use App\Services\MailchimpNewsletter;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        app()->bind(Newsletter::class, function () {
           
            $client = (new ApiClient())->setConfig([
                'apiKey' => config('services.mailchimp.key'),
                'server' => 'us9',
            ]);

            return new MailchimpNewsletter($client);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

    //check that app is local
    if ($this->app->isLocal()) {
    //if local register your services you require for development
        $this->app->register('Barryvdh\Debugbar\ServiceProvider');
    } else {
    //else register your services you require for production
        $this->app['request']->server->set('HTTPS', true);
    }

    Collection::macro('paginate', function($perPage, $total = null, $page = null, $pageName = 'page') {
        $page = $page ?: LengthAwarePaginator::resolveCurrentPage($pageName);

        return new LengthAwarePaginator(
            $this->forPage($page, $perPage),
            $total ?: $this->count(),
            $perPage,
            $page,
            [
                'path' => LengthAwarePaginator::resolveCurrentPath(),
                'pageName' => $pageName,
            ]
        );
    });
    }
}
