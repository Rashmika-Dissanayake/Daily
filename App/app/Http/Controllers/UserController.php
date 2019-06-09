<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use PHPUnit\Framework\Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Barryvdh\DomPDF\PDF;
use \Datetime;

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

    public function reset_password(Request $request){
        $new_password=$request->input('newPassword');
        echo $new_password;
        $enc_password=Hash::make($new_password);
        $email=$request->input('email');
        $token=Str::random(60);
        $date = Carbon::now()->toDateTimeString();
        try{
            DB::update('update users set password=? where email=?',[$enc_password,$email]);
            DB::insert('insert into password_reset values(?,?,?)',[$email,$token,$date]);
            return redirect()->route('profile');
        }
        catch(Exception $ex){
           
        }
    }

    public function pdf(){
        $pdf=\App::make('dompdf.wrapper');
        $pdf->loadHtml("<h5>Hello</h5>");
        $pdf->stream();
    }

    public function reports(){
        // $customer_details=DB::select('select nic,date_purchased from customer_details');
        // $today = new \DateTime('now');
        // $date = DateTime::createFromFormat('D-M-Y', '15-Feb-2009');
        // // $today->format('m-d-Y');
        // echo $date;
        return view('pages.reports');

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
}
