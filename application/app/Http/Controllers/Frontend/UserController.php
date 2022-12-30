<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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



    public function login()
    {
        return view('frontend.customer.login');
    }

    public function dashboard()
    {
        return view('frontend.customer.dashboard');
    }

    public function register()
    {
        return view('frontend.customer.login');
    }


    public function customerlogout(Request $request)
    {
        Auth::guard('CustomerAuth')->logout();
        return redirect()->route('frontend.index');
    }


    public function userlogin(Request $request)
    {
        if (Auth::guard('CustomerAuth')->attempt(['email'=>$request->email, 'password'=>$request->password])) {
            return redirect()->route('frontend.index');
        }else{
            return redirect()->route('frontend.user.register');
        }
    }



    public function userregister(Request $request)
    {
        Customer::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'created_at'=>Carbon::now(),
        ]);

        if (Auth::guard('CustomerAuth')->attempt(['email'=>$request->email, 'password'=>$request->password])) {
            return redirect()->route('frontend.index');
        }else{
            return redirect()->route('frontend.user.register');
        }
    }
}
