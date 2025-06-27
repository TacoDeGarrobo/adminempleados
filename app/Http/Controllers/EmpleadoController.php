<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\RateLimiterStore;
use Illuminate\Support\Facades\RateBouncerGuard;
use App\View\Components\empleados;
use Brick\Math\BigInteger;

class EmpleadoController extends Controller
{
   
    
    
    public function index()
    {
        $empleados = Empleado::all();
        return view('empleados.index', compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), 
            [
            'nombre' =>'required|string|max:255',
            'correo' =>'required|email|max:255|unique:empleados',
            'puesto' =>'required|string',
            'edad' =>'required|numeric|min:17',
            'departamento' =>' required|string',
            ]);
            if ($validator->fails())
            {
                return redirect()->back()->
                withInput()->
                withErrors($validator);
            }
        $empleado = Empleado::create($request->all());
        $empleado->departamento->$request->input('departamento');
        return redirect()->
        route('empleados.index')
        ->
        with('success', 'Empleado creado con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $empleado = Empleado::findOrFail($id);
        return view('empleados.edit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $empleado= Empleado::findOrFail($id);
        $validator = Validator::make($request->all(),
        [
            'nombre' =>' required|string|max:255',
            'correo' =>' required|email|max:255|unique:empleados,correo,'.$id,
            'puesto' =>' required|string',
            'edad' =>' required|numeric|min:17',
            'departamento' =>' required|string',
        ]);
        if ($validator->fails())
        {
            return redirect()->
            route('empleados.edit',$id)->
            withInput()->
            withErrors($validator);
        }
            $empleado->update($request->all());

            return redirect()->
            route('empleados.index')->
            with('success', 'Empleado actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $empleado = Empleado::findOrFail($id);
        $empleado-> delete();
        return redirect()->
        route('empleados.index')
        ->
        with('success', 'Empleado eliminado con éxito');
    }
}
