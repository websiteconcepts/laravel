<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class DailyDobCheck extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'DailyBirthday:Check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Email to Contacts on their birthday';

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
        $todays_date = date('Y-m-d');
        $contacts = DB::table('contacts')->where('dob', $todays_date)->pluck('email');
       foreach ($contacts as $a)
       {
            \Mail::raw("Wishing you a blissful birthday", function($message) use ($a)
            {
                $message->from('demo@demo.com');
                if($a->email != NULL){
                    $message->to($a->email)->subject('Happy Birthday');
                }
                
            });
        }
        $this->info('Birthday Greetings have been sent successfully');
    }
}
