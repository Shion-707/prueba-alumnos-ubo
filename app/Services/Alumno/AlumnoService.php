<?php

namespace App\Services\Alumno;

use App\Models\alumno;
use Illuminate\Pagination\LengthAwarePaginator;

class AlumnoService{
    public function getAll(): LengthAwarePaginator {
        return alumno::with('carrera')
            ->orderBy('id', 'DESC')
            ->paginate(alumno::PAGINATE);
    }

    public function findById(int $id): alumno{
        return alumno::findOrFail($id);
    }

    public function create(array $data): alumno{
        return alumno::create($data);
    }

    public function update(int $id, array $data): bool{
        return alumno::where('id', $id)->update($data);
    }

    public function delete(int $id): bool{
        return alumno::where('id', $id)->delete();
    }
}