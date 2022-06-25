<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailSendFiles extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $send = $this->view('email_files', ['name_file' => $this->data['name_file'],
        'path' => $this->data['path'],
        'email_id' => $this->data['email_id'],
        'year_file' => $this->data['year_file']])
        ->from($this->data['from'])->subject($this->data['subject']);
        if ($this->data['cc'] !== '') {
            $send->cc($this->data['cc']);
        }
    }
}
