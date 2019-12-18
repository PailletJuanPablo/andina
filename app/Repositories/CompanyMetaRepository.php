<?php

namespace App\Repositories;

use App\Models\CompanyMeta;
use App\Repositories\BaseRepository;

/**
 * Class CompanyMetaRepository
 * @package App\Repositories
 * @version November 14, 2019, 3:40 am UTC
*/

class CompanyMetaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'description',
        'user_id',
        'company_id'
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
        return CompanyMeta::class;
    }
}
