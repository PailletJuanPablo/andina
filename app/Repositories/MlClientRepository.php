<?php

namespace App\Repositories;

use App\Models\MlClient;
use App\Repositories\BaseRepository;

/**
 * Class MlClientRepository
 * @package App\Repositories
 * @version April 14, 2020, 7:30 am UTC
*/

class MlClientRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'last_name',
        'country',
        'agrup_site',
        'site',
        'rep',
        'unidad',
        'legajo'
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
        return MlClient::class;
    }
}
