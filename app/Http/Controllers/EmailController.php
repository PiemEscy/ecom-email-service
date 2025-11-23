<?php

namespace App\Http\Controllers;

use App\Mail\NotifyUserMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'status' => 'required|string',
            'order_date' => 'required|string',
            'items' => 'required|array',
        ]);

        $email = $request->email;
        $status = $request->status;
        $orderDate = $request->order_date;
        $items = $request->items;

        $subject = "Your Order Summary - " . now()->format('M d, Y');

        Mail::to($email)->send(
            new NotifyUserMail(
                status: $status,
                order_date: $orderDate,
                items: $items,
                subjectLine: $subject
            )
        );

        return response()->json([
            'status' => 'success',
            'message' => 'Order emai'
        ]);
    }
}