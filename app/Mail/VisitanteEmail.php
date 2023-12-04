<?php

namespace App\Mail;

use App\Models\Visitante;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VisitanteEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var Visitante
     */
    protected $visitante;

    /**
     * @param Visitante $visitante
     */
    public function __construct(Visitante $visitante)
    {
        $this->visitante = $visitante;
    }

    /**
     * @return VisitanteEmail
     */
    public function build()
    {
        return $this->subject('Novo Visitante Cadastrado')
            ->view('emails.visitantes')
            ->with(['visitante' => $this->visitante]);
    }
}
