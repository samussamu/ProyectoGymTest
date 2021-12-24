<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Events\SendStatsEvent;
use Illuminate\Support\Facades\Mail;
use App\Mail\MonthlyMailable;

class StatsTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'stats:task';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Give the each user an email with their best marks this month';

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
    public function handle(User $user_model)
    {
        $users=$user_model->All();
        $texto="[".date("Y-m-d H:i:s")."]: Ejecutando Task ";
        Storage::append("archivo.txt", $texto);
        $users->each(function($user){
            Mail::to($user->email)->queue(new MonthlyMailable($user));
            $texto="[".date("Y-m-d H:i:s")."]: Email enviado al usuario/email: ".$user->email;
            Storage::append("archivo.txt", $texto);
        });
       

        return Command::SUCCESS;
    }
}
