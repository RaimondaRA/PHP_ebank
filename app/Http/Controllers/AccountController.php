<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Helper;
use mysql_xdevapi\Exception;

class AccountsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function account_list(){
        if (auth::check()) {
            $accounts = Account::where('user_id', auth::id())->paginate(4);
            $balance = Account::where('user_id', auth::id())->sum('balance');
            $data = array('accounts' => $accounts, 'balance' => $balance);
            return view('/home')->with($data);
        } else {
            return redirect()->route('login');
        }
    }
    public function create_account_form(){

        return view('pages.account');
    }
    public function store(Request $request){

        $validated = $request->validate(['account_no' => 'required']);

        //create account
        $account_no = Helper::IDGenerator(new Account, 'account_no', 18, 'LT');

        Account::create([
            'user_id' => Auth::id(),
            'account_no' => $account_no,
            'name' => auth::user()->name,
            'surname' => auth::user()->surname,
            'balance' => 0,
            'isMain' => 0,
            'account_name' => $request->input('account_name'),
        ]);

        return redirect()->route('home')->with('success', 'Account Created');
    }
    public function account_belongs_to_user($account_no): bool
    {
        if (Account::where([['account_no', $account_no],
                            ['user_id', auth::id()]]
                            )->exists()) {
            return true;
        }
        return false;
    }
}

// class AccountController extends Controller
// {
//     public function show(Account $accounts){
//         $accounts =  Account::all();
//         return view('pages.home', compact('account'));
//         return view('pages.home', ['accounts'=>$accounts]);
//     }
// }
