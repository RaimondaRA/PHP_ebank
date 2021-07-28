<?php

namespace App\Http\Controllers;
use App\Models\Account;
use App\Models\User;
use App\Models\Transfer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $accounts = Account::where('user_id', '=',  auth()->user()->id)->get();
        
        return view('pages.index', ['accounts'=>$accounts]);
        //return view('home');
    }

    public function account(){
        return view('pages.account');
    }

    public function report(){
        $users_id=Account::where('user_id', '=',auth()->user()->id)->get() ;
        return view('pages.report', compact('users_id'));

    }
    public function transfer(){
        return view('pages.transfer');

    }

    public function transferBetween(){
        return view('pages.transferBetween');
    }

    public function records(Request $request){

        $query_userID = auth()->user()->id;
        $validateData = $request->validate([
            'faccount'=>'required|string|min:20|max:20',
            'datefrom'=>'required|date|before_or_equal:dateto',
            'dateto'=>'required|date|after_or_equal:datefrom|before:now+1 second'
        ]);

        $transfers=Transfer:: select('status', 'transfers.account_id_from', 'transfers.account_id_to','purpose', 'amount', 'transfers.id', 'a1.account_no as account_no_from' , 'a2.account_no as account_no_to', 'u1.name as name1', 'u1.surname as surname1', 'u2.name as name2', 'u2.surname as surname2', 'transfers.date')
            ->join('accounts as a1', 'a1.id', '=', 'transfers.account_id_from')
            ->join('users as u1', 'u1.id', '=', 'a1.user_id')
            ->join('accounts as a2', 'a2.id', '=', 'transfers.account_id_to')
            ->join('users as u2', 'u2.id', '=', 'a2.user_id')
            ->whereBetween('transfers.date', [$request->input('datefrom'), $request->input('dateto')])
            ->where('a1.account_no', '=', $request->input('faccount'))
            ->orWhere('a2.account_no', '=', $request->input('faccount'))
            ->orderBy('transfers.date', 'desc')
            ->get( );

        $sask=  $request->input('faccount');
        $acc_id = Account::firstWhere('account_no', $request->input('faccount'));
        return view('pages.records', compact('transfers'), compact('acc_id'));
    }
}

