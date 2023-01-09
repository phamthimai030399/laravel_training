<?php

namespace App\Jobs;

use App\Mail\MailNotify;
use App\Mail\OrderNotify;
use App\Models\Order;
use App\Repositories\Order\OrderRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $orderId;
    const QUEUE_ORDER_NOTIFY = 'order-notify';

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($orderId)
    {
        $this->orderId = $orderId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $order = Order::find($this->orderId);
        Mail::to($order->email)->send(new OrderNotify([
            'order' => $order,
        ]));
    }
}
