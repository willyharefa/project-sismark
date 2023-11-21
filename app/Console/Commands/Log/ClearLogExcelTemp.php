<?php

namespace App\Console\Commands\Log;

use Illuminate\Console\Command;

class ClearLogExcelTemp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'log:clear-excel';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        exec('echo "" > ' . storage_path('framework/cache/laravel-excel'));
        $this->info('Logs have been cleared');
    }
}
