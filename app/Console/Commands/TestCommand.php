<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Mail;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'testcommand:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Ngetest doang..';

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
        for($i = 1; $i<=1; $i++) {
            $data = array();

            $data['waktu'] = date('Y-m-d H:i:s');

            Mail::queue('vendor.material.mail.testmailscheduled', array('data'=>$data), function($message) {
                $message->to('soniibrol2011@gmail.com', 'Soni Ibrol')->subject('Scheduled Mail With Image Embeded ke-');
                //$message->bcc('soni@gramedia-majalah.com', 'Administrator');
                $message->attach('public/img/profile-menu.png');
            });
        }
    }
}
