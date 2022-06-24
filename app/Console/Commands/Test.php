<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\LinkImageHashs;
use \App\Models\Type;
use \App\Models\Hashtag;
use \App\Models\Image;


class Test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'portfolio:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {   
        echo 'test';
    }
}
