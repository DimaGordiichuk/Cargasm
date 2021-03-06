<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DefaultMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $template;
    public $attrs;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $subject, string $template, array $attrs = [])
    {
        $this->subject = $subject;
        $this->template = $template;
        $this->attrs = $attrs;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subject)
            ->view($this->template)->with($this->attrs);
    }
}
