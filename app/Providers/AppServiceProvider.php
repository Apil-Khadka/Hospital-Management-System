<?php

namespace App\Providers;

use App\Models\Bill;
use App\Models\BillItem;
use App\Observers\BillItemObserver;
use App\Observers\BillObserver;
use Illuminate\Database\Eloquent\Relations\Relation;
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
        Relation::MorphMap([
            "medication" => "App\Models\Medication",
            "labtest" => "App\Models\LabTest",
        ]);
        BillItem::observe(BillItemObserver::class);
        Bill::observe(BillObserver::class);
    }
}
