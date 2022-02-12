<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailTemplate extends Mailable
{

    use Queueable, SerializesModels;

    protected $data;
    protected $config;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $config)
    {
        $this->data = $data;
        $this->config = $config;

        config()->set('mail.mailers.smtp.username', $config['username']);
        config()->set('mail.mailers.smtp.password', $config['password']);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->from($this->config['username']);
        $this->to($this->data['email']);
        $this->subject($this->data['subject']);
        if ($this->data['cc'])
            $this->cc($this->data['cc']);


        if ($this->data['bcc'])
            $this->bcc($this->data['bcc']);

        $content = $this->data['text'] ?? "";
        return $this->html($content);
    }
}
