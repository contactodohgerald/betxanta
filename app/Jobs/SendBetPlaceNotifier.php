<?php

namespace App\Jobs;

use App\Notifications\GeneralNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Notification;

class SendBetPlaceNotifier implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public $bet, public $user, public $data, public $returnOption)
    {
        $this->bet = $bet;
        $this->user = $user;
        $this->data = $data;
        $this->returnOption = $returnOption;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $datas = [
            'name' => $this->user->name,
            'subject' => env('APP_NAME').' Bet Notifier',
            'message' => 'You just placed a bet of '.$this->data['amount'].' '.$this->user->toView(0, 'symbol').' on '.env('APP_NAME').', that '.$this->returnOption['name'].' will '.$this->returnOption['option'],
            'body' => 'This is an atomated notification. For enquiries on '.env('APP_NAME').' services. please send an email to '.env('APP_MAIL'),
            'thankyou' => 'Thank you for trusting in our services',
        ];
        Notification::send($this->user, new GeneralNotification($datas, ['mail', 'database']));
    }
}
