<?php

namespace App\Console\Commands;

use App\Adapter\AmazonAdapter;
use Illuminate\Console\Command;

class AmazonUpdateProductsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'amazon:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Amazon products';

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
     * @param AmazonAdapter $amazonAdapter
     *
     * @return mixed
     */
    public function handle(AmazonAdapter $amazonAdapter)
    {
        $amazonAdapter->getProductsPrice();
        $this->info('Amazon product price has been updated.');
    }
}
