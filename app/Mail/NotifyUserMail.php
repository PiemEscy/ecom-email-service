<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifyUserMail extends Mailable
{
    use Queueable, SerializesModels;

    public $status;
    public $order_date;
    public $items;
    public $subjectLine;

    public function __construct($status, $order_date, $items, $subjectLine)
    {
        $this->status = $status;
        $this->order_date = $order_date;
        $this->items = $items;
        $this->subjectLine = $subjectLine;
    }

    public function build()
    {
        return $this->subject($this->subjectLine)
            ->view('order_summary')
            ->with([
                'status' => $this->status,
                'order_date' => $this->order_date,
                'items' => $this->items,
            ]);
    }
}
