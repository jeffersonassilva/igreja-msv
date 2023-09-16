<?php

namespace App\Http\Controllers;

use App\Exceptions\CartaoInexistente;
use App\Exceptions\MembroSemAcessoAoCartao;
use App\Helpers\Constants;
use App\Mail\NotaFiscalEmail;
use App\Services\CartaoMembroService;
use App\Services\CartaoService;
use App\Services\NotaFiscalService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

/**
 * Class NotasFiscaisController
 * @package App\Http\Controllers
 */
class NotasFiscaisController extends Controller
{
    /**
     * @var CartaoService
     */
    private $cartaoService;

    /**
     * @var CartaoMembroService
     */
    private $cartaoMembroService;

    /**
     * @var CartaoMembroService
     */
    private $notaFiscalService;

    /**
     * @param CartaoService $cartaoService
     * @param CartaoMembroService $cartaoMembroService
     * @param NotaFiscalService $notaFiscalService
     */
    public function __construct(
        CartaoService $cartaoService,
        CartaoMembroService $cartaoMembroService,
        NotaFiscalService $notaFiscalService
    )
    {
        $this->cartaoService = $cartaoService;
        $this->cartaoMembroService = $cartaoMembroService;
        $this->notaFiscalService = $notaFiscalService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('nfs.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function create(Request $request)
    {
        try {
            $cartaoValido = $this->verificarCartao($request->get('identificador'));
            $membroAutorizado = $this->verificarMembro($cartaoValido->id, $request->get('user-permission'));
        } catch (\Exception $exception) {
            return $this->redirectWithMessage('notas-fiscais.index', $exception->getMessage());
        }

        $categorias = [
            ['id' => 1, 'descricao' => 'Despesa com Pessoal'],
            ['id' => 2, 'descricao' => 'Despesa com Impostos'],
            ['id' => 3, 'descricao' => 'Despesas Administrativas'],
            ['id' => 4, 'descricao' => 'Despesa com Aquisições'],
            ['id' => 5, 'descricao' => 'Despesa com Serviços'],
            ['id' => 6, 'descricao' => 'Despesas com Manutenções'],
            ['id' => 7, 'descricao' => 'Despesas Financeiras'],
            ['id' => 8, 'descricao' => 'Despesas com Construção'],
            ['id' => 9, 'descricao' => 'Despesas com Eventos'],
        ];

        return view('nfs.create')->with([
            'membro' => $membroAutorizado,
            'cartao' => $cartaoValido,
            'categorias' => $categorias
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $nota = $this->notaFiscalService->store($request);
        $content = array_merge($request->all(), $nota->toArray());

        Mail::to('jefferson.santos@igrejamsv.org')
            ->cc(['jeffersonassilva@gmail.com'])
            ->send(new NotaFiscalEmail($content));

        return $this->redirectWithMessage('notas-fiscais.index', __(Constants::SUCCESS_CREATE));
    }

    /**
     * @param $identificador
     * @return mixed
     * @throws CartaoInexistente
     */
    private function verificarCartao($identificador)
    {
        $dados = $this->cartaoService->findByIdentificador($identificador);

        if (!$dados) {
            throw new CartaoInexistente('Cartão não encontrado!');
        }

        return $dados;
    }

    /**
     * @param $cartaoId
     * @param $codigoMembro
     * @return mixed
     * @throws MembroSemAcessoAoCartao
     */
    private function verificarMembro($cartaoId, $codigoMembro)
    {
        $dados = $this->cartaoMembroService->findByCartaoIdECodigo($cartaoId, $codigoMembro);

        if (!$dados) {
            throw new MembroSemAcessoAoCartao('Você não tem permissão de acesso a este cartão!');
        }

        return $dados;
    }
}
