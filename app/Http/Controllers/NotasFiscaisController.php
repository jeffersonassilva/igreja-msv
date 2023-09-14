<?php

namespace App\Http\Controllers;

use App\Exceptions\CartaoInexistente;
use App\Exceptions\MembroSemAcessoAoCartao;
use App\Helpers\Constants;
use App\Mail\NotaFiscalEmail;
use App\Services\CartaoMembroService;
use App\Services\CartaoService;
use App\Services\NotaFiscalService;
use App\Traits\DropboxTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

/**
 * Class NotasFiscaisController
 * @package App\Http\Controllers
 */
class NotasFiscaisController extends Controller
{
    use DropboxTrait;

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

        Mail::to('jeffersonassilva@gmail.com')
            ->cc(['jeffersonassilva@icloud.com'])
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

//    public function notasFiscais()
//    {
//        return view('notas-fiscais');
//    }

//    /**
//     * @param Request $request
//     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
//     * @throws \Google\Exception
//     */
//    public function store(Request $request)
//    {
//        dd('teste');
//        // Crie uma instância do cliente da API do Google Drive e defina as credenciais
//        $client = new Google_Client();
//        $client->setAuthConfig(base_path('credentials.json'));
//        $client->setAccessType('offline');
//        $client->setApprovalPrompt('force');
//        $client->addScope(Drive::DRIVE);
//        $client->setPrompt('select_account consent');
//
//        // obtenha o token de acesso
//        $accessToken = session('access_token');
//        if ($accessToken) {
//            $client->setAccessToken($accessToken);
//        } else {
//            // Caso não exista, verifica se existe um código de autorização
//            $code = request('code');
//            if ($code) {
//                // Se existir, troca o código de autorização por um token de acesso
//                $accessToken = $client->fetchAccessTokenWithAuthCode($code);
//                $client->setAccessToken($accessToken);
//
//                // Salva o token de acesso na sessão
//                session(['access_token' => $accessToken]);
//
//                // Salva o refresh token em um arquivo
//                $refreshToken = $client->getRefreshToken();
//                file_put_contents(base_path('refresh_token.txt'), $refreshToken);
//            } else {
//                // Se não houver código de autorização, redireciona para a tela de login do Google
//                $authUrl = $client->createAuthUrl();
//                return redirect()->away($authUrl);
//            }
//        }
//
//        // Crie uma instância do serviço de API do Google Drive
//        $service = new Google_Service_Drive($client);
//
//        $file = $request->file('nota-fiscal');
//        $filePath = $file->getRealPath();
//        $fileMetadata = new Google_Service_Drive_DriveFile(array(
//            'name' => $file->getClientOriginalName()
//        ));
//
//        // Define o ID da pasta do Google Drive para onde o arquivo será enviado
//        $folderId = '1M_EqY2s6KG4-9WI9E-MHHTb5_SjSybOr';
//
//        // Define a pasta do Google Drive como pai do arquivo
//        $fileMetadata->setParents(array($folderId));
//
//        // Cria uma instância do objeto de arquivo do Google Drive e define os metadados do arquivo
//        $file = new Google_Service_Drive_DriveFile();
//        $file->setName($fileMetadata->name);
//        $file->setParents($fileMetadata->parents);
//
//        // Faz o upload do arquivo
//        $content = file_get_contents($filePath);
//        try {
//            // Tenta enviar o arquivo
//            $file = $service->files->create($fileMetadata, array(
//                'data' => $content,
//                'mimeType' => $file->getMimeType()
//            ));
//
//            // Retorna o link do arquivo recém-enviado
//            return redirect()->back()->with('success', 'Arquivo enviado com sucesso!');
////            return response()->json([
////                'url' => $file->getWebContentLink(),
////            ]);
//        } catch (\Exception $e) {
//            // Se ocorrer um erro de autenticação, atualize o token de acesso e tente novamente
//            if ($e instanceof \Google\Service\Exception && $e->getCode() == 401) {
//                $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
//                $file = $service->files->create($fileMetadata, array(
//                    'data' => $content,
//                    'mimeType' => $file->getMimeType()
//                ));
//                return response()->json([
//                    'url' => $file->getWebContentLink(),
//                ]);
//            }
//            // Se ocorrer um erro diferente, retorne uma mensagem de erro
//            return response()->json([
//                'message' => $e->getMessage(),
//            ]);
//        }
//
////        return redirect()->back()->with('success', 'Arquivo enviado com sucesso!');
//    }
//
//    public function token(Request $request)
//    {
//        // Cria um objeto Google_Client e configura a autenticação
//        $client = new Client();
//        $client->setAuthConfig(base_path('credentials.json'));
//        $client->setAccessType('offline');
//        $client->setApprovalPrompt('force');
//        $client->addScope(Drive::DRIVE);
////        $client->addScope(Drive::DRIVE);
////        $client->addScope(Drive::DRIVE_APPDATA);
////        $client->addScope(Drive::DRIVE_METADATA);
////        $client->addScope(Drive::DRIVE_PHOTOS_READONLY);
//
//        // Verifica se existe um token de acesso salvo
//        session(['access_token' => null]);
//        $accessToken = session('access_token');
////        dd($accessToken);
//
//        if ($accessToken) {
//            $client->setAccessToken($accessToken);
//        } else {
//            // Caso não exista, verifica se existe um código de autorização
//            $code = $request->get('code');
//            if ($code) {
//                // Se existir, troca o código de autorização por um token de acesso
//                $accessToken = $client->fetchAccessTokenWithAuthCode($code);
//                $client->setAccessToken($accessToken);
//
//                // Salva o token de acesso na sessão
//                session(['access_token' => $accessToken]);
//
//                $refreshToken = $client->getRefreshToken();
//                file_put_contents(base_path('refresh_token.txt'), $refreshToken);
//            } else {
//                // Se não existir um código de autorização, redireciona para a página de login
//                $authUrl = $client->createAuthUrl();
//                return redirect()->away($authUrl);
//            }
//        }
//
////        // Cria um objeto Google_Service_Drive para interagir com a API do Google Drive
////        $service = new Drive($client);
//
////        // Pega a lista de pastas do Google Drive
////        $folderList = $service->files->listFiles([
////            'q' => "mimeType='application/vnd.google-apps.folder' and trashed = false",
////        ]);
////        $folders = $folderList->getFiles();
//
////        return view('upload', compact('folders'));
//
////        $participantes = $this->service->where(array(), array('data' => 'desc', 'nome' => 'asc'))->get();
//        return $accessToken;
//    }
}
