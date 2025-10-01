<?php

namespace App\Services\Carrera;

use App\Models\carrera;

class CarreraService{
    public function getAll(){
        return carrera::all();
    }
}