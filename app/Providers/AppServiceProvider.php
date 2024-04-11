<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use App\Services\Newsletter;
use App\Services\MailchimpNewsletter;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use MailchimpMarketing\ApiClient;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        app()->bind(Newsletter::class, function () {
            $client = (new ApiClient)->setConfig([
                'apiKey' => config('services.mailchimp.key'),
                'server' => 'us10'
            ]);

            return new MailchimpNewsletter($client);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
       Model::unguard();
       Gate::define('admin',function (User $user) {
        return $user->username === 'lotus';
       });
       Blade::if('admin', function () {
        return request()->user()?->can('admin');
    });
   
    }
}
