<?php

namespace App\Http\Controllers;

use App\Exceptions\CartaoInexistente;
use App\Exceptions\MembroSemAcessoNotasFiscais;
use App\Helpers\Constants;
use App\Http\Requests\NotaFiscalRequest;
use App\Mail\NotaFiscalEmail;
use App\Services\CartaoService;
use App\Services\CategoriaService;
use App\Services\MembroService;
use App\Services\NotaFiscalService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

/**
 * Class NotasFiscaisController
 * @package App\Http\Controllers
 */
class NotasFiscaisController extends Controller
{
    const FORMA_PAGAMENTO_DINHEIRO = '99';

    /**
     * @var CartaoService
     */
    private $cartaoService;

    /**
     * @var MembroService
     */
    private $membroService;

    /**
     * @var NotaFiscalService
     */
    private $notaFiscalService;

    /**
     * @var CategoriaService
     */
    private $categoriaService;

    /**
     * @param CartaoService $cartaoService
     * @param MembroService $membroService
     * @param NotaFiscalService $notaFiscalService
     * @param CategoriaService $categoriaService
     */
    public function __construct(
        CartaoService     $cartaoService,
        MembroService     $membroService,
        NotaFiscalService $notaFiscalService,
        CategoriaService  $categoriaService
    )
    {
        $this->cartaoService = $cartaoService;
        $this->membroService = $membroService;
        $this->notaFiscalService = $notaFiscalService;
        $this->categoriaService = $categoriaService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $this->checkPermission('adm-listar-notas-fiscais');
        $notas = $this->notaFiscalService->where(['verificada' => 0])->get();

        return view('admin/notas-fiscais/index')->with([
            'notasFiscais' => $notas
        ]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function access()
    {
        return view('nfs.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function check(Request $request)
    {
        try {
            $this->verificarPermissao($request->get('access_code'));
        } catch (\Exception $exception) {
            return $this->redirectWithMessage('notas-fiscais.access', $exception->getMessage(), 'warning');
        }

        return redirect()->route('notas-fiscais.create', [
            base64_encode(date('Ymd')),
            base64_encode($request->get('access_code'))
        ]);
    }

    /**
     * @param $date
     * @param $accessCode
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function create($date, $accessCode)
    {
        try {
            $this->verificarDataAcessoCartao(base64_decode($date));
            $this->verificarPermissao(base64_decode($accessCode));

        } catch (\Exception $exception) {
            return $this->redirectWithMessage('notas-fiscais.access', $exception->getMessage(), 'warning');
        }

        $pagamentos = array_merge([
            ['id' => self::FORMA_PAGAMENTO_DINHEIRO, 'descricao' => 'Dinheiro']],
            $this->cartaoService->pluck('id', 'numero')
        );

        return view('nfs.create')->with([
            'pagamentos' => $pagamentos,
            'membros' => $this->membroService->pluck('id', 'nome'),
            'categorias' => $this->categoriaService->all()
        ]);
    }

    /**
     * @param NotaFiscalRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(NotaFiscalRequest $request)
    {
        if ($request->get('forma_pagamento') !== self::FORMA_PAGAMENTO_DINHEIRO) {
            $request->request->add(['cartao_id' => $request->get('forma_pagamento')]);
        }

        $file = $request->file('arquivo');
        $nota = $this->notaFiscalService->store($request);

        Mail::to(['samucamj@gmail.com', 'jezaias.damacena@igrejamsv.org', 'paulo.martins@igrejamsv.org'])
            ->cc(['jeffersonassilva@gmail.com'])
            ->send(new NotaFiscalEmail($nota, $file));

        return $this->redirectWithMessage(
            ['notas-fiscais.create', $this->getDadosDeSegurancaNotasFiscais()],
            'Nota fiscal enviada com sucesso!'
        );
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function archive($id)
    {
        $this->checkPermission('adm-arquivar-nota-fiscal');
        $this->notaFiscalService->archive($id);
        return $this->redirectWithMessage('notas-fiscais', __(Constants::SUCCESS_ARCHIVE));
    }

    /**
     * @param $date
     * @return false|string
     * @throws MembroSemAcessoNotasFiscais
     */
    private function verificarDataAcessoCartao($date)
    {
        if ($date !== date('Ymd')) {
            throw new MembroSemAcessoNotasFiscais('Você não tem permissão de acesso a esta área do sistema!');
        }

        return $date;
    }

    /**
     * @param $identificador
     * @return true
     * @throws CartaoInexistente
     */
    private function verificarCartao($identificador)
    {
        if ($identificador === '9999') {
            return true;
        }

        $dados = $this->cartaoService->findByIdentificador($identificador);

        if (!$dados) {
            throw new CartaoInexistente('Cartão não encontrado!');
        }

        return true;
    }

    /**
     * @param $codigo
     * @return void
     * @throws MembroSemAcessoNotasFiscais
     */
    private function verificarPermissao($codigo)
    {
        if ($codigo !== '1214') {
            throw new MembroSemAcessoNotasFiscais('Você não tem permissão de acesso a esta área do sistema!');
        }
    }

    /**
     * @return false|string[]
     */
    private function getDadosDeSegurancaNotasFiscais()
    {
        $urlOrigin = str_replace(url()->current() . '/adicionar/', '', $_SERVER['HTTP_REFERER']);
        return explode('/', $urlOrigin);
    }
}
