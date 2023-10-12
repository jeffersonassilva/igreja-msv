<?php

namespace App\Mail;

use App\Models\NotaFiscal;
use Illuminate\Bus\Queueable;
use Illuminate\Http\UploadedFile;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotaFiscalEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var NotaFiscal
     */
    protected $nota;

    /**
     * @var UploadedFile
     */
    protected $arquivo;

    /**
     * @param NotaFiscal $nota
     * @param UploadedFile $arquivo
     */
    public function __construct(NotaFiscal $nota, UploadedFile $arquivo)
    {
        $this->nota = $nota;
        $this->arquivo = $arquivo;
    }

    /**
     * @return NotaFiscalEmail
     */
    public function build()
    {
        $as = 'NF-' . $this->nota->id . '/' . str_replace('-', '', $this->nota->data) . '-' . str_pad($this->nota->categoria, 2, '0', STR_PAD_LEFT);
        $this->nota['as'] = $as;

        return $this->subject('Nota Fiscal Cadastrada')
            ->view('emails.notas')
            ->attach($this->arquivo, [
                'as' => $as . '.jpg',
                'mime' => 'image/jpeg',
            ])
            ->with(['nota' => $this->nota]);
    }
}
