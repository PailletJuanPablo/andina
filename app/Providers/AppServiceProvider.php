<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;
use App\Models\Company;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {
        $currentDomain = $request->getHost();
        $company = Company::where('domain', $currentDomain)->first();
        if($company) {
            config(['app.company_id' => $company->id]);
            if($company->image) {
                config(['app.company_image' => $company->image]);

            }

        }
    //    return dd(config('app.company_id'));
       // return dd($request->getHost());

    }
}
