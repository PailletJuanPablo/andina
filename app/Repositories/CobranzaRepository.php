<?php

namespace App\Repositories;

use App\Models\Cobranza;
use App\Repositories\BaseRepository;

/**
 * Class CobranzaRepository
 * @package App\Repositories
 * @version November 14, 2019, 3:40 am UTC
*/

class CobranzaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'operation_date',
        'destination_dni',
        'sign',
        'ammount',
        'user_id',
        'company_id',
        'employee_id',
        'name',
        'origin',
        'destination',
        'ceco_id'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Cobranza::class;
    }
}
