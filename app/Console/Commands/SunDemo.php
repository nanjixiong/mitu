<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SunDemo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sun-demo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'test happy coding';

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
     * @return mixed
     */
    public function handle()
    {
        $this->alert(" happy coding");
    }
}
