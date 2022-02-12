<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;

class AlertCrone extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'push:alert';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
    public function handle()
    {
//        $token = User::select('token')->get()->toArray();
//
//        foreach ($token as $k =>$r){

            $optionBuilder = new OptionsBuilder();
            $optionBuilder->setTimeToLive(60*20);

            $notificationBuilder = new PayloadNotificationBuilder('Order');
            $notificationBuilder->setBody('Yor order is complete')
                ->setSound('default');

            $dataBuilder = new PayloadDataBuilder();
            $dataBuilder->addData(['a_data' => 'my_data']);

            $option = $optionBuilder->build();
            $notification = $notificationBuilder->build();
            $data = $dataBuilder->build();

            $token = "fVWusEHdSiCAP96XB-Wd9L:APA91bEq_d_nVec72nD4h8QQEx_cc6jIC1rG4XAuZE7nKBN-aixk6jVNiJdCPwRMFX7jXvwep4ky6gZaFfyqoHyt_3sJXT8eN9d5_Nl1y-jvXFN5ZGhnKHGcvjSzus1VZagoPpo__zUw";

            $downstreamResponse = FCM::sendTo($token, $option, $notification, $data);

            $downstreamResponse->numberSuccess();
            $downstreamResponse->numberFailure();
            $downstreamResponse->numberModification();
    }

//    }
}
