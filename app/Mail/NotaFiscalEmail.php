<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotaFiscalEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var array
     */
    protected $content;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $content)
    {
        $this->content = $content;
    }

    /**
     * @return NotaFiscalEmail
     */
    public function build()
    {
        $as = 'NF-' . $this->content['id'] . '/' . str_replace('-', '', $this->content['data']) . '-' . str_pad($this->content['categoria'], 2, '0', STR_PAD_LEFT);
        $this->content['as'] = $as;

        return $this->subject('Nota Fiscal Cadastrada')
            ->view('emails.notas')
            ->attach($this->content['arquivo'], [
                'as' => $as . '.jpg',
                'mime' => 'image/jpeg',
            ])
            ->with(['content' => $this->content]);
    }
}
