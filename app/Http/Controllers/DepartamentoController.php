<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamento;

class DepartamentoController extends Controller
{
    public function index()
    {
        $departamentos = Departamento::all();
        return view('departamento.department', compact('departamentos'));
    }

    public function create()
    {
    return view('departamento.createDepartment');
    }

    public function store(Request $request)
    {
        $departamento = Departamento::create($request->all());
        return redirect()->
        route('departamento.department');
    }

    public function edit(String $id)
    {
        $departamento = Departamento::find($id);
        return view('departamento.editDepartment', compact('departamento'));
    }
    public function update(Request $request, String $id)
    {
        $departamento = Departamento::find($id);
        $departamento->
        update($request->
        all());
        return redirect()->
        route('departamento.department');
        }
}
