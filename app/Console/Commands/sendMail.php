<?php

namespace App\Console\Commands;

use App\Events;
use Illuminate\Console\Command;
use App\myMail;
class sendMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sendMail:csv';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send an Email to the Employee';

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

        $users = [
            0 => ['to' => 'aman@gmail.com', 'subject' => 'Test', 'body' => 'Test Mail'],
            1 => ['to' => 'numan@gmail.com', 'subject' => 'Test', 'body' => 'Test Mail'],
            2 => ['to' => 'faisal@gmail.com', 'subject' => 'Test', 'body' => 'Test Mail'],
            3 => ['to' => 'farhan@gmail.com', 'subject' => 'Test', 'body' => 'Test Mail'],
        ];

        foreach ($users as $user){
            $myMail = new myMail();
            $myMail->to = $user['to'];
            $myMail->subject = $user['subject'];
            $myMail->body = $user['body'];

            $myMail->save();
            $this->info('Saved User');
        }
    }
}
