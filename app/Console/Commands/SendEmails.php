<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use App\Mail\ServiceNotice;
use Illuminate\Support\Facades\Mail;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:send {user : ユーザーIDを指定} {--f : 確認を挟まず送信する}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '指定ユーザーにメールを配信する';

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
        $user = User::find($this->argument('user'));
        if ($this->option('f') || $this->confirm($user->name . 'さん[' . $user->email . ']にメールを配信しますか？')) {
            Mail::to($user)->send(new ServiceNotice($user));
        }
    }
}
