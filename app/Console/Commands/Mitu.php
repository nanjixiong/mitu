<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Mitu extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mitu:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'start';

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
        //
        $mitu = $this->laravel->make('Mitu');
        $model = $this->ask("start model");

        $mitu->Start($model);

        $this->ask();
    }
}
