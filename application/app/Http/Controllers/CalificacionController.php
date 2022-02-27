<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Calificacion;
use App\Models\Transaction;
use App\Models\Deposit;
use App\Models\Withdrawal;

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
            'user_id'	=>	$request->user_id,
            'calificacion' =>  $request->calificacion,
            'comentarios' => $request->comentarios,
            'usuario_calificador' => $request->usuario_calificador,
            'transactionable_id' => $request->transactionable_id,
            'tipo_transaccion' => $request->tipo_transaccion
        ]);
       
        if ($request->tipo_transaccion == 'Fondeo')
        {
            if (Auth::user()->id == $request->transaccion_user_id)
            {
                $this->actualizar_estatus($request->transactionable_id, $request->tipo_transaccion, 8);
                return redirect(app()->getLocale().'/fondeos');
            }
            else
            {
                $this->actualizar_estatus($request->transactionable_id, $request->tipo_transaccion, 9);
                return redirect(app()->getLocale().'/solicitudes/fondeos-aceptados');
            }
        }
        else
        {
            if (Auth::user()->id == $request->transaccion_user_id)
            {
                $this->actualizar_estatus($request->transactionable_id, $request->tipo_transaccion, 8);
                return redirect(app()->getLocale().'/retiros');
            }
            else
            {
                $this->actualizar_estatus($request->transactionable_id, $request->tipo_transaccion, 9);
                return redirect(app()->getLocale().'/solicitudes/retiros-aceptados');
            }            
        }
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
    public function calificar(Request $request, $lang, $id_transaccion = null, $notificaciones = null)
    {
        $transaccion = Transaction::find($id_transaccion);

        $notificacion = new NotificacionController();

        if (isset($notificaciones))
        {
            if ($notificaciones == 'leida')
            {
                $notificacion->cambiarEstatusEnviadas();
            }
        }

        $vectorNotificaciones = $notificacion->index();

        return view('calificacions.calificar')
            ->with('transaccion', $transaccion)
            ->with('vectorNotificaciones', $vectorNotificaciones);
    }
    public function actualizar_estatus($transactionable_id, $tipo_transaccion = null, $estatus = null)
    {
        $transaccion = Transaction::find($transactionable_id);
        $transaccion->transaction_state_id = $estatus;
        $transaccion->save();

        if ($tipo_transaccion == 'Fondeo')
        {
            $fondeo = Deposit::find($transaccion->transactionable_id);
            $retiro = Withdrawal::find($fondeo->contrapartida_id);
        }
        else
        {
            $retiro = Withdrawal::find($transaccion->transactionable_id);
            $fondeo = Deposit::find($retiro->contrapartida_id);
        }

        $fondeo->transaction_state_id = $estatus;
        $fondeo->save();

        $retiro->transaction_state_id = $estatus;
        $retiro->save();        
    }
}