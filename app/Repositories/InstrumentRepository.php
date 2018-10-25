<?php

namespace App\Repositories;

use App\Models\Instrument;
/**
 *
 * @package App\Repository
 */
class InstrumentRepository extends BaseRepository
{

    public function __construct(Instrument $model) {
        $this->model = $model;

    }

    public function getAll($columns = array('*')) {
        return $this->model->with('user')->get($columns);
    }
}