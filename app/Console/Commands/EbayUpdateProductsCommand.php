<?php

namespace App\Console\Commands;

use App\Adapter\EbayAdapter;
use Illuminate\Console\Command;

class EbayUpdateProductsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ebay:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Ebay products';

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
     * @param EbayAdapter $ebayAdapter
     *
     * @return mixed
     */
    public function handle(EbayAdapter $ebayAdapter)
    {
        $ebayAdapter->getProductsPrice();
        $this->info('Ebay product price has been updated.');
    }
}
