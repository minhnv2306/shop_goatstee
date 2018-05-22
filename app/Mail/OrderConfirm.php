<?php

namespace App\Mail;

use App\Models\CartProduct;
use App\Models\ProductOrder;
use App\Repositories\ProductOrderRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderConfirm extends Mailable
{
    use Queueable, SerializesModels;
    public $orderId;
    public $price;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($orderId, $price)
    {
        $this->orderId = $orderId;
        $this->price = $price;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $repo = new ProductOrderRepository();
        $productOrders = $repo->getProductOfOrder($this->orderId);

        return $this->markdown('emails.order')
            ->with([
                'productOrders' => $productOrders,
                'price' => $this->price,
                'orderId' => $this->orderId,
            ]);
    }
}
