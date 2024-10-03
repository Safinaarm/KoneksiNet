<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ChatMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $message; // Untuk menyimpan pesan
    public $image;   // Untuk menyimpan path gambar (jika ada)
    public $document; // Untuk menyimpan path dokumen (jika ada)

    public function __construct(array $details)
    {
        $this->message = $details['message']; // Ambil pesan dari detail
        $this->image = $details['image'];     // Ambil gambar dari detail
        $this->document = $details['document']; // Ambil dokumen dari detail
    }

    public function build()
    {
        return $this->view('emails.chat') // Menggunakan view 'emails.chat'
                    ->with([
                        'message' => $this->message,
                        'image' => $this->image,
                        'document' => $this->document,
                    ]);
    }
}
