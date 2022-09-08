<?php

namespace App\Services;

use App\Models\Voluntario;
use Illuminate\Support\Facades\DB;

/**
 * Class RelatorioService
 * @package App\Services
 */
class RelatorioService extends AbstractService
{
    const VOLUNTARIO_ID = 'voluntarios.id';
    const VOLUNTARIO_NOME = 'voluntarios.nome';
    const QUANTIDADE = 'quantidade';

    /**
     * @return mixed
     */
    public function voluntarios()
    {
        return Voluntario::select(
            self::VOLUNTARIO_ID,
            self::VOLUNTARIO_NOME,
            DB::raw('count(escala_voluntario.voluntario_id) AS quantidade')
        )
            ->leftJoin('escala_voluntario', function ($join) {
                $join->on('escala_voluntario.voluntario_id', self::VOLUNTARIO_ID)
                    ->whereNull('escala_voluntario.deleted_at');
            })
            ->leftJoin('escalas', 'escalas.id', 'escala_voluntario.escala_id')
            ->groupBy(self::VOLUNTARIO_ID, self::VOLUNTARIO_NOME)
            ->orderBy(self::QUANTIDADE, 'desc')
            ->orderBy(self::VOLUNTARIO_NOME)
            ->get();
    }
}
