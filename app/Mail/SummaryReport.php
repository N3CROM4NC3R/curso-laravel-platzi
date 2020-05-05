<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SummaryReport extends Mailable
{
    use Queueable, SerializesModels;

    private $expenseReport;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(\App\ExpenseReport $expenseReport)
    {
        $this->expenseReport = $expenseReport;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $context = [
            'report' => $this->expenseReport
        ];


        return $this->view('mail.expenseReport', $context);
    }
}
