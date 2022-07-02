<?php

namespace App\Console\Commands;

use App\Models\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class sendemail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sendemail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command for send email notification';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $clients = Client::all()->toArray();
        foreach ($clients as $client) {
            $client_entries = DB::table('client_entry')->where('client_id', $client['id'])->get();
            foreach ($client_entries as $client_entry) {
                $personal_entry = DB::table('personal_entries')->where('id', $client_entry->entry_id)->first();
            }
            dd($client_entries);
        }
        dd($clients);
        $this->info('The command was successful!');
        return 1;
    }
}
