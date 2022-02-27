<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Escrow;
use App\User;
use Twilio;
use App\Models\Otp;
use App\Models\Wallet;
use App\Models\Receive;
use App\Models\Transaction;
use App\Models\Currrency;
use App\Models\Deposit;
use App\Models\Withdrawal;
use App\Models\Notificacion;
use Illuminate\Http\Request;
use TCG\Voyager\Models\Page;
use Jenssegers\Agent\Agent;
use App\Http\Controllers\NotificacionController;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['getPage']]);
    }

    public function getPage(Request $request, $lang, $id){
        
        $page = Page::where('id', $id)->first();

        if ($page != null) {
            return view('page.show')->with('page', $page);
        }

        return abort(404);
    }

    public function accountStatus(Request $request, $lang, $user){
        $user = User::findOrFail($user);
        $user->account_status = 0;
        $user->save();
        return back();
    }
    public function locale(Request $request, $lang, $locale){
        
        dd($locale);
        App::setLocale($locale);
        return view('welcome');
    }
    
    public function wallet(Request $request, $lang,  $id){
        $wallet = Wallet::findOrFail($id);
   
        if ($wallet) {
            
            Auth::user()->wallet_id = $wallet->id;
            Auth::user()->save();
        }
        return back();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {              
        $agent = new Agent();

        // Twilio::message('+258850586897', array(
        //     'body' => 'hihaa',
        //     'SERVICE SID'  =>  'Envato',
        // ));
        if (!Auth::user()->verified) {
            return view('otp.index');
        }
        $has_wallet = $username = Auth::user()->currentWallet()->accont_identifier_mechanism_value ?? null ; 
        if(is_null($has_wallet)){
            //return redirect(app()->getLocale().'/transfer/methods');
            return redirect(route('show.currencies', app()->getLocale()));
        }

        $myMoneyRequests = Receive::with('From')->where('transaction_state_id', 3)->where('user_id', Auth::user()->id)->get();

        $myEscrows = Escrow::with('toUser')->where('user_id', Auth::user()->id)->where('escrow_transaction_status', '!=' ,'completed')->orderby('id', 'desc')->get();
        $toEscrows = Escrow::with('user')->where('to', Auth::user()->id)->where('escrow_transaction_status', '!=' ,'completed')->orderby('id', 'desc')->get();

        $transactions = Auth::user()->RecentActivity()->with('Status')->orderby('id','desc')->where('transaction_state_id', '!=', 3)->paginate(10);
       

        $transactionsToConfirm =  Auth::user()->RecentActivity()->with('Status')->orderby('id','desc')->where('transaction_state_id', 3)->where('money_flow' , '!=', '+')->paginate(10);
        // if($agent->isMobile()){
        //     return view('_mobile.home.index')
        //     ->with('transactions', $transactions)
        //     ->with('transactions_to_confirm', $transactionsToConfirm);
        // }

        $notificacion = new NotificacionController();

        $vectorNotificaciones = $notificacion->index();

        return view('home.index')
        ->with('myRequests', $myMoneyRequests)
        ->with('transactions', $transactions)
        ->with('myEscrows', $myEscrows)
        ->with('toEscrows', $toEscrows)
        ->with('transactions_to_confirm', $transactionsToConfirm)
        ->with('vectorNotificaciones', $vectorNotificaciones);
    }
    public function solicitudes($lang, $tipoSolicitud)
    {
        if (!Auth::user()->verified) {
            return view('otp.index');
        }
        $has_wallet = $username = Auth::user()->currentWallet()->accont_identifier_mechanism_value ?? null ; 
        if(is_null($has_wallet)){
            return redirect(route('show.currencies', app()->getLocale()));
        }

        $fondeos = Transaction::with(['Status', 'User'])->orderby('id','desc')->where('transaction_state_id', 3)->where('activity_title', 'Fondeo')->where('user_id', '!=', Auth::user()->id)->paginate(10);
        
        $retiros = Transaction::with(['Status', 'User'])->orderby('id','desc')->where('transaction_state_id', 3)->where('activity_title', 'Retiro')->where('user_id', '!=', Auth::user()->id)->paginate(10);      

        $fondeos_aceptados = Transaction::with(['Status', 'User'])->orderby('id','desc')->where('usuario_aceptante_id', Auth::user()->id)->whereIn('transaction_state_id', [1, 4, 6, 7, 8, 9])->where('activity_title', 'Fondeo')->paginate(10);      

        $retiros_aceptados = Transaction::with(['Status', 'User'])->orderby('id','desc')->where('usuario_aceptante_id', Auth::user()->id)->whereIn('transaction_state_id', [1, 5, 6, 7, 8, 9])->where('activity_title', 'Retiro')->paginate(10);      

        $notificacion = new NotificacionController();

        $vectorNotificaciones = $notificacion->actualizarNotificaciones();

        return view('home.solicitudes')
        ->with('fondeos', $fondeos)
        ->with('retiros', $retiros)
        ->with('fondeos_aceptados', $fondeos_aceptados)
        ->with('retiros_aceptados', $retiros_aceptados)
        ->with('tipoSolicitud', $tipoSolicitud)
        ->with('vectorNotificaciones', $vectorNotificaciones);
    }
}