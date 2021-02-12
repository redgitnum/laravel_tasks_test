<?php

namespace App\Console\Commands;

use App\Models\Human;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class CreateHuman extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'human:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create random human';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }


    public function handle()
    {
        $human = Http::get('https://jsonplaceholder.typicode.com/users/'.rand(1,9))->json();
        Human::create([
            'name' => $human['name'],
            'message' => $human['company']['catchPhrase']
        ]);
    }
}
