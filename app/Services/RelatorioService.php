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
    const VOLUNTARIO_SEXO = 'voluntarios.sexo';
    const VOLUNTARIO_PROFESSOR_EBD = 'voluntarios.professor_ebd';

    /**
     * @var string[]
     */
    private $allowedFilters = [
        'nome',
        'quantidade'
    ];

    /**
     * @param array $where
     * @param array $order
     * @return mixed
     */
    public function voluntarios(array $where = array(), array $order = array())
    {
        $query = Voluntario::select(
            self::VOLUNTARIO_ID,
            self::VOLUNTARIO_NOME,
            self::VOLUNTARIO_SEXO,
            self::VOLUNTARIO_PROFESSOR_EBD,
            DB::raw('count(escala_voluntario.voluntario_id) AS quantidade')
        )
            ->leftJoin('escala_voluntario', function ($join) {
                $join->on('escala_voluntario.voluntario_id', self::VOLUNTARIO_ID)
                    ->whereNull('escala_voluntario.deleted_at');
            })
            ->leftJoin('escalas', 'escalas.id', 'escala_voluntario.escala_id');

        if (isset($where['mes']) && !empty($where['mes'])) {
            $query->whereMonth('data', '=', substr($where['mes'], 5, 2));
            $query->whereYear('data', '=', substr($where['mes'], 0, 4));
        }

        $query->groupBy(self::VOLUNTARIO_ID, self::VOLUNTARIO_NOME, self::VOLUNTARIO_SEXO, self::VOLUNTARIO_PROFESSOR_EBD);

        foreach ($order as $key => $value) {
            if (in_array($key, $this->allowedFilters)) {
                $query->orderBy($key, $value);
            }
        }

        return $query->get();
    }
}
