<?php

namespace App\Http\Controllers;

use App\Models\alumno;
use Illuminate\Http\Request;
use App\Http\Requests\Alumno\CreateAlumnoRequest;
use App\Http\Requests\Alumno\UpdateAlumnoRequest;
use App\Services\Alumno\AlumnoService;
use App\Services\Carrera\CarreraService;

class AlumnoController extends Controller
{
    public function __construct(protected AlumnoService $service, protected CarreraService $carreraService){}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $alumnos = $this->service->getAll();

        return view('alumnos.index', compact('alumnos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $carreras = $this->carreraService->getAll();

        return view('alumnos.form', ['alumno' => new alumno()], compact('carreras'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateAlumnoRequest $request)
    {
        //dd($request->all());
        $this->service->create($request->validated());

        return redirect()->route('alumnos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(alumno $alumno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $alumno = $this->service->findById($id);
        $carreras = $this->carreraService->getAll();

        return view('alumnos.form', compact('alumno', 'carreras'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAlumnoRequest $request, int $id)
    {
        $this->service->update($id, $request->validated());

        return redirect()->route('alumnos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->service->delete($id);

        return redirect()->route('alumnos.index');
    }
}
