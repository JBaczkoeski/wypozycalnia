<?php

namespace App\Console;

use App\Models\Car;
use App\Models\Rental;
use Carbon\Carbon;
use DB;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->call(function (){
            $expiriedReservation = Rental::whereDate('return_date', '<', Carbon::now());

            $carToUpdate = $expiriedReservation->pluck('car_id');

            DB::table('cars')
                ->whereIn('id', $carToUpdate)
                ->update(['availability' => 1]);
        })->dailyAt('10:45');
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
