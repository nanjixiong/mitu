<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class mitu extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mitu:model';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'set type server or client';

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
    public function handle(\App\Providers\Mitu\Serve $mitu)
    {
        //
        $model = env('MITU_MODEL');

        $this->info($model);


        $port = env('MITU_PORT');
        $this->info($port);

//        $path =;
        $this->info( $mitu->hello());



    }
}
