<?php

namespace App\Providers;

use App\Models\Bill;
use App\Models\BillItem;
use App\Observers\BillItemObserver;
use App\Observers\BillObserver;
use DB;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Log;
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
        DB::listen(function ($query) {
            if (strpos($query->sql, 'select * from `jobs`') !== false) {
                return;
            }
            Log::debug('Query: ' );
            foreach (str_split($query->sql, 140) as $chunk) {
                Log::debug($chunk);
            }


            Log::debug('Bindings: ' . json_encode($query->bindings));


        });
        Relation::MorphMap([
            "medication" => "App\Models\Medication",
            "labtest" => "App\Models\LabTest",
        ]);
        BillItem::observe(BillItemObserver::class);
        Bill::observe(BillObserver::class);
    }
}
