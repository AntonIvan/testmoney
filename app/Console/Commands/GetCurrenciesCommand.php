<?php

namespace App\Console\Commands;

use App\Services\GetCurrencies;
use Illuminate\Console\Command;

class GetCurrenciesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'getCurrencies';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get current courses currencies';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        resolve(GetCurrencies::class)->start();
    }
}
