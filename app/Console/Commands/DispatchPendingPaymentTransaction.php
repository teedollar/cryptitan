<?php

namespace App\Console\Commands;

use App\Jobs\ProcessPendingPaymentTransaction;
use App\Models\PaymentTransaction;
use Illuminate\Console\Command;
use Illuminate\Support\LazyCollection;

class DispatchPendingPaymentTransaction extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dispatch:pending-payment-transaction';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Dispatch pending payment transaction for processing';

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
        $this->getRecords()->each(function (PaymentTransaction $transaction) {
            ProcessPendingPaymentTransaction::dispatch($transaction);
            $this->info("Dispatched: {$transaction->id}");
        });
    }

    /**
     * Get records
     *
     * @return LazyCollection
     */
    protected function getRecords()
    {
        return PaymentTransaction::pending()->lazyById();
    }
}
