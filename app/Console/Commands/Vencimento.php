<?php

namespace App\Console\Commands;

use App\Models\Reserve;
use Illuminate\Console\Command;

class Vencimento extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'modify:defeated';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Definie como vencida a reservas que já passaram a data';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Reserve::where('date_reservation', '<', date('Y-m-d'))
            ->where('status', '<>', '3')
            ->update([
                'status' => 3
            ]);
        // return Command::SUCCESS;
    }
}
