<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Calificacion;

use Illuminate\Http\Request;

class CalificacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $calificacion = Calificacion::create([
            'user_id'	=>	5,
            'calificacion' =>  $request->calificacion,
            'comentario' => $request->comentario,
            'usuario_calificador' => 6,
            'transactionable_id' => $request->transactionable_id,
            'tipo_transaccion' => 'retiro'
        ]);
        return redirect(app()->getLocale().'/retiros');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function calificar(Request $request, $lang, $id_transaccion)
    {
        return view('calificacions.calificar')
            ->with('id_transaccion', $id_transaccion);
    }
}