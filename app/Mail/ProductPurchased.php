<?php

namespace App\Mail;

use App\Models\Role;
use App\Models\User;
use App\Models\Purchase;
use App\Services\UserService;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProductPurchased extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $adminUser;
    public $purchase;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Purchase $purchase)
    {
        $this->adminUser = UserService::findAdminUser();;

        $this->purchase = $purchase;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.products.purchased');
    }
}
