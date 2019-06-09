<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use DB;
use PhpParser\Node\Expr\Cast\Object_;
use ___PHPSTORM_HELPERS\object;
use Symfony\Component\Routing\Route;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function insert(Request $request){

        $garage_name=$request->input('garage_name');
        $address=$request->input('address');
        $open_time=$request->input('openTime');
        $close_time=$request->input('closeTime');
        $insert_data=array('garage_name'=>$garage_name,'address'=>$address,'open_time'=>$open_time,'close_time'=>$close_time);
       // DB::table('location_details')->insert($insert_data);
        DB::insert('replace into location_details(address,garage_name,open_time,close_time) values (?,?,?,?)', [$address,$garage_name,$open_time,$close_time]);

       //  $city1=$request->input('city1');
       //  $address1=$request->input('address1');
       //  echo $address1;
        //   $data=collect([
        //      (object) [
        //          'city' => $city,
        //          'address' =>  $address
        //      ]
        //  ]);

       $data= DB::table('location_details')->select('address','garage_name','open_time','close_time')->get();
      
       return view('pages.locations.location',compact('data'))->with('status',1);
       
   }


    
}
