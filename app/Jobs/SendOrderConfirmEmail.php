<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderConfirm;

class SendOrderConfirmEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 5;
    protected $user;
    protected $orderId;
    protected $price;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user, $orderId, $price)
    {
        $this->user = $user;
        $this->orderId = $orderId;
        $this->price = $price;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->user)->send(new OrderConfirm($this->orderId, $this->price));
    }
}
