<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Patients;

class PatientController extends Controller
{
    public function index()
    {
        // Lógica para retornar a lista de pacientes
    }

    public function store(Request $request)
    {
        // Lógica para armazenar um novo paciente
    }

    public function show(Patients $paciente)
    {
        // Lógica para retornar as informações de um paciente específico
    }

    // Outros métodos para atualizar e excluir pacientes
}
