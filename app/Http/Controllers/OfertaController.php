<?php

namespace App\Http\Controllers;

use App\Helpers\Pix;
use Illuminate\Http\Request;

/**
 * Class OfertaController
 * @package App\Http\Controllers
 */
class OfertaController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('ofertas');
    }

    /**
     * @param Request $request
     * @return string
     */
    public function pix(Request $request)
    {
        date_default_timezone_set('America/Sao_Paulo');

        $pix = new Pix();
        $objPayload = $pix->setPixKey('23244224000144')
            ->setDescription($request->get('descricao'))
            ->setMerchantName('IGREJA EVANGELICA MINISTERIO SEMEANDO A VERDADE')
            ->setMerchantCity('BRASILIA')
            ->setAmount($request->get('valor'))
            ->setTxId($this->gerarTxId($request->get('descricao')));

        return view('pix')->with('pix', $objPayload->getPayload());
    }

    /**
     * @param string|null $descricao
     * @return string
     */
    private function gerarTxId(string $descricao = null)
    {
        $txIdPrefix = null;
        $descricao = strtolower($descricao);

        switch ($descricao) {
            case 'oferta':
                $txIdPrefix = 'OF';
                break;
            case 'dizimo':
                $txIdPrefix = 'DZ';
                break;
            case 'almoco':
                $txIdPrefix = 'AL';
                break;
            case 'projeto sharon':
                $txIdPrefix = 'SH';
                break;
            case 'seminario':
                $txIdPrefix = 'SM';
                break;
            default:
                $txIdPrefix = 'OU';
                break;
        }

        return $txIdPrefix . date('YmdHis');
    }
}
