<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Recette;

class RecetteCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $recette; // public pour qu'il soit visible depuis le template
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Recette $recette)
    {
        $this->recette = $recette;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.recette-created');
    }
}
