<?php

namespace App\Services;

use App\Models\EscalaVoluntario;
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
        'presenca'
    ];

    /**
     * @param array $where
     * @param array $order
     * @return mixed
     */
    public function voluntarios(array $where = array(), array $order = array())
    {
        $qntdPresenca = $this->getCountSubQuery('P', $where);
        $qntdFalta = $this->getCountSubQuery('F', $where);
        $qntdFaltaJustificada = $this->getCountSubQuery('FJ', $where);

        $query = Voluntario::select(
            self::VOLUNTARIO_ID,
            self::VOLUNTARIO_NOME,
            self::VOLUNTARIO_SEXO,
            self::VOLUNTARIO_PROFESSOR_EBD,
            DB::raw("({$qntdPresenca->toSql()}) as presenca"),
            DB::raw("({$qntdFalta->toSql()}) as falta"),
            DB::raw("({$qntdFaltaJustificada->toSql()}) as falta_justificada")
        );

        foreach ($order as $key => $value) {
            if (in_array($key, $this->allowedFilters)) {
                $query->orderBy($key, $value);
            }
        }

        return $query->get();
    }

    /**
     * @param $comparecimento
     * @param $where
     * @return mixed
     */
    private function getCountSubQuery($comparecimento, $where)
    {
        $countSubQuery = EscalaVoluntario::selectRaw('count(escala_voluntario.id)')
            ->leftJoin('escalas', function ($joinLeft) {
                $joinLeft->on('escalas.id', 'escala_voluntario.escala_id')->whereNull('escalas.deleted_at');
            })
            ->whereColumn('escala_voluntario.voluntario_id', 'voluntarios.id')
            ->whereRaw("escala_voluntario.comparecimento = '$comparecimento'");

        if (isset($where['mes']) && !empty($where['mes'])) {
            $countSubQuery->whereRaw('month(data) = ' . $where['mes']);
        }

        if (isset($where['ano']) && !empty($where['ano'])) {
            $countSubQuery->whereRaw('year(data) = ' . $where['ano']);
        }

        return $countSubQuery;
    }
}
