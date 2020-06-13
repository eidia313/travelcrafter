<?php

namespace App\Providers;

use App\Setting\Setting;
use App\Testimonial\Testimonial;
use App\Activities\Activity;
use Vinkla\Instagram\Instagram;
use View;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Cache;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);

        //Make Settings available all over
        $setting = Setting::first();
        //Make Testimonials available all over
        $testimonials = Testimonial::where('status', 'published')->get();
        $activities = Activity::whereNotIn('status', ['draft'])->get(['id', 'name', 'slug', 'image', 'thumbnail']);

        //Instagram Widget bind_textdomain_codeset
        $instagram = new Instagram('8496695057.1677ed0.1a3509ad83684dfc81a08e3507dac15b');
        $results = null;
        $result;
        // dd(json_encode($instagram->media()));
        if (Cache::has('cache_insta')) {
            $results = Cache::get('cache_insta');
        } else {
            $result = json_encode($instagram->media(['count' => 4]));
            Cache::put('cache_insta', $result, 60);
            $results = $result;
        }
        $media = json_decode($results);
        // dd($media);
        // $media = $instagram->media(['count'=>4]);
        View::share(['setting' => $setting, 'testimonials' => $testimonials, 'activities' => $activities, 'instagram' => $media]);
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