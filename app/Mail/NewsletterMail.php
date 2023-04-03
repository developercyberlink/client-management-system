<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewsletterMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

     protected $title;
     protected $content;
     protected $template;

    public function __construct($title, $content, $template)
    {
        $this->title = $title;
        $this->content = $content;
        $this->template = $template;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('newsletter.'.$this->template)->with([
            'title'=>$this->title,
            'content'=>$this->content,
        ]);
    }
}
