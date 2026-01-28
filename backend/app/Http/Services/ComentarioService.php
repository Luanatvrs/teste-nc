<?php

namespace App\Http\Services;

use App\Models\Comentario;
use Illuminate\Database\Eloquent\Model;

class ComentarioService extends BaseService
{
    protected Model $model;

    public function __construct(Comentario $model){
        $this->model = $model;
    }
}