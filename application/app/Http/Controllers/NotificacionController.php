<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Notificacion;

use Illuminate\Http\Request;

class NotificacionController extends Controller
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
        $vectorNotificaciones = [];
        $limiteEnvio = 20;
        $notificaciones = '';

        $contadorCreadas = Notificacion::where('user_id', Auth::user()->id)->where('estatus_notificacion', 'Creada')->count();

        if ($contadorCreadas > 0):
            $notificacionesCreadas = Notificacion::where('user_id', Auth::user()->id)->where('estatus_notificacion', 'Creada')->get();
            foreach ($notificacionesCreadas as $notificacion):
                $notificacionFind = Notificacion::find($notificacion->id);
                $notificacionFind->estatus_notificacion = "Enviada";
                $notificacionFind->save();
            endforeach;
        endif;

        $contadorEnviadas = Notificacion::where('user_id', Auth::user()->id)->where('estatus_notificacion', 'Enviada')->count();

        if ($contadorEnviadas > 20):
            $limiteEnvio = $contadorEnviadas;
        endif;

        $contadorGeneral = Notificacion::orderByDesc('id')->where('user_id', Auth::user()->id)->limit($limiteEnvio)->count();

        if ($contadorGeneral > 0):
            $notificacionesGeneral = Notificacion::orderByDesc('id')->where('user_id', Auth::user()->id)->limit($limiteEnvio)->get();
            foreach ($notificacionesGeneral as $notificacion):
                $notificaciones .= 
                    '<p>'.$notificacion->notificacion.'</p><hr>';
            endforeach;
        endif;

        $vectorNotificaciones = 
            [
                'contador'          => $contadorEnviadas,
                'notificaciones'    => $notificaciones
            ];
      
        return $vectorNotificaciones;
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
        //
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

    public function actualizarNotificaciones()
    {
        $vectorNotificaciones = [];
        $limiteEnvio = 20;
        $notificaciones = '';

        $contadorEnviadas = Notificacion::where('user_id', Auth::user()->id)->where('estatus_notificacion', 'Enviada')->count();
        if ($contadorEnviadas > 0):
            $notificacionesEnviadas = Notificacion::where('user_id', Auth::user()->id)->where('estatus_notificacion', 'Enviada')->get();
            foreach ($notificacionesEnviadas as $notificacion):
                $notificacionFind = Notificacion::find($notificacion->id);
                $notificacionFind->estatus_notificacion = "Leída";
                $notificacionFind->save();
            endforeach;
        endif;

        $contadorCreadas = Notificacion::where('user_id', Auth::user()->id)->where('estatus_notificacion', 'Creada')->count();
        if ($contadorCreadas > 0):
            $notificacionesCreadas = Notificacion::where('user_id', Auth::user()->id)->where('estatus_notificacion', 'Creada')->get();
            foreach ($notificacionesCreadas as $notificacion):
                $notificacionFind = Notificacion::find($notificacion->id);
                $notificacionFind->estatus_notificacion = "Enviada";
                $notificacionFind->save();
            endforeach;
        endif;

        if ($contadorCreadas > 20):
            $limiteEnvio = $contadorCreadas;
        endif;

        $contadorGeneral = Notificacion::orderByDesc('id')->where('user_id', Auth::user()->id)->limit($limiteEnvio)->count();

        if ($contadorGeneral > 0):
            $notificacionesGeneral = Notificacion::orderByDesc('id')->where('user_id', Auth::user()->id)->limit($limiteEnvio)->get();

            foreach ($notificacionesGeneral as $notificacion):
                $notificaciones .= 
                    '<p>'.$notificacion->notificacion.'</p><hr>';
            endforeach;
        endif;

        $vectorNotificaciones = 
            [
                'contador'          => $contadorCreadas,
                'notificaciones'    => $notificaciones
            ];
      
        exit(json_encode($vectorNotificaciones, JSON_FORCE_OBJECT));
    }
}
