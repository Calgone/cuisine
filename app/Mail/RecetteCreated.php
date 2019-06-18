<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Recipe;

class RecipeCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $recipe; // public pour qu'il soit visible depuis le template
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Recipe $recipe)
    {
        $this->recipe = $recipe;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.recipe-created');
    }
}
