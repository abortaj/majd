<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;
use App\Setting;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Passport::routes();
        //
    }
    public function setConfig()
    {
        $settings = Setting::all()->keyBy('key');

        config()->set('seotools.meta.defaults.title',$settings['seo_title']->value);
        config()->set('seotools.meta.defaults.description',$settings['seo_description']->value);
        config()->set('seotools.meta.defaults.keywords',explode(' ',$settings['seo_keywords']->value));
        config()->set('seotools.opengraph.defaults.title',$settings['seo_title']->value);
        config()->set('seotools.opengraph.defaults.description',$settings['seo_description']->value);

        config()->set('settings.facebook_account', $settings['facebook_account']->value);
        config()->set('settings.twitter_account', $settings['twitter_account']->value);
    }
}
