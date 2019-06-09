<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use PhpParser\Node\Expr\AssignOp\Concat;
 use \stdClass;
use PHPUnit\Framework\Exception;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        return view('pages.dashboard');
    }

    public function payment(){
        $week_customers=$this->getWeekly_customers();
        $daily_customers=$this->getDaily_customers();
        return view('pages.customer_payment',['week_customers'=>$week_customers,'daily_customers'=>$daily_customers]);
    }

    public function loadSheet(Request $request){
        $cust_nic=$request->input('customerName');
        $customer_selection=DB::select('select selection,amount from customer_details where nic=?',[$cust_nic]);
        foreach($customer_selection as $customer_selection){
        $customer_selection1=$customer_selection->selection;
        $customer_amount=$customer_selection->amount;
        }
        $customer_payment=$this->get_customer_payment($cust_nic);
        foreach($customer_payment as $customer_payment){
        $customer_payment_array[]=(array)$customer_payment;

        }
        $interest=($customer_amount/5)*(0.2);
        // print_r($customer_payment_array[0]);
        if(!empty($customer_payment)){
            $count=count($customer_payment_array);
            return view('pages.loadSheet',['selection'=>$customer_selection1,'nic'=>$cust_nic,'success'=>"Paid",'customerPayment'=>$customer_payment_array,'count'=>$count,'interest'=>$interest]);
        }
       
        else{
            $count=0;
            $customer_payment_array[]=(array)$customer_payment;
            return view('pages.loadSheet',['selection'=>$customer_selection1,'nic'=>$cust_nic,'success'=>"Paid",'customerPayment'=>$customer_payment_array,'count'=>$count,'interest'=>$interest]);

        }
       
        // echo $count;
    }

    function get_customer_payment($nic){

        $customer_payment=DB::select('select date_pay,amount,row_id,col_id,isPaid from user_payment where cust_id=?',[$nic]);
        return $customer_payment;
    }

    public function add_details(){
        return view('pages.customer-details',['message'=>""]);

    }

    public function profile(){
        return view('pages.edit-profile');

    }

    public function block_user(){
        $block_users=$this->get_block_user_details();
        return view('pages.block-user',['block_users'=>$block_users]);
    }

    public function add_block_user(Request $request){
        $nic=$request->input('nic');
        $name=$request->input('name');
        $block_users=$this->get_block_user_details();
        DB::insert('replace into block_users values(?,?)',[$nic,$name]);
        return redirect()->route('block-user')->with('block_users',$block_users);
    }

    function get_block_user_details(){
        $block_users=DB::select('select * from block_users');
        return $block_users;
    }

    public function view_customer(){
        $customer_details=$this->get_customerdata();   
        return view('pages.view_details',['customers'=>$customer_details]);
    }
    
    public function insert(Request $request){
   
    $name=$request->input('inputName');
    $nic=$request->input('inputNic');
    $address=$request->input('inputAddress');
    $contact1=$request->input('inputContact1');
    $contact2=$request->input('inputContact2');
    $guarantor1_name=$request->input('guarantor1Name');
    $guarantor1_nic=$request->input('guarantor1Nic');
    $guarantor1_contact1=$request->input('guarantor1Contact1');
    $guarantor1_contact2=$request->input('guarantor1Contact2');
    $guarantor2_name=$request->input('guarantor2Name');
    $guarantor2_nic=$request->input('guarantor2Nic');
    $guarantor2_contact1=$request->input('guarantor2Contact1');
    $guarantor2_contact2=$request->input('guarantor2Contact2');
    $amount=$request->input('amount');
    $installment=$request->input('installment');
    $date_purchased=$request->input('date_purchased');
    $check_daily=$request->input('radio');

    if($check_daily=='option1')
      $check_daily='weekly';
    else
      $check_daily='daily';

    $date = Carbon::now()->toDateTimeString();
    $guarantor1_id=$date;
    $guarantor2_id=$date;

    $guarantor1_count=$this->get_guarantor1_count($guarantor1_nic);
    $guarantor2_count=$this->get_guarantor2_count($guarantor2_nic);
    $isBlocked_guarantor1=$this->get_block_users($guarantor1_nic);
    $isBlocked_guarantor2=$this->get_block_users($guarantor2_nic);
    $isBlocked_customer=$this->get_block_users($nic);
    echo $guarantor1_count;
    if($guarantor1_count>=3 || $guarantor2_count>=3 || $isBlocked_customer==1 || $isBlocked_guarantor1==1 || $isBlocked_guarantor2==1){
        return view('pages.customer-details',['message'=>"Error Inserting"]);
    }

    else{
        DB::insert('replace into customer_details(nic,name,address,contact1,contact2,amount,selection,installment,date_purchased) values(?,?,?,?,?,?,?,?,?)',[$nic,$name,$address,$contact1,$contact2,$amount,$check_daily,$installment,$date_purchased]);
        DB::insert('replace into guarantor1_details values(?,?,?,?,?,?)',[$guarantor1_id,$nic,$guarantor1_nic,$guarantor1_name,$guarantor1_contact1,$guarantor1_contact2]);
        DB::insert('replace into guarantor2_details values(?,?,?,?,?,?)',[$guarantor2_id,$nic,$guarantor2_nic,$guarantor2_name,$guarantor2_contact1,$guarantor2_contact2]);
        return view('pages.customer-details',['message'=>""]);
    }

   
    
    // $customer_token=$date.$nic;
    // echo $customer_token;
    // $data=array(
    //     'name'=>$name,
    //     'nic'=>$nic,
    //     'address'=>$address,
    //     'contact1'=>$contact1,
    //     'contact2'=>$contact2,
    //     'guarantor1-name'=>$guarantor1_name,
    //     'guarantor1-contact1'=>$guarantor1_contact1,
    //     'guarantor1-contact2'=>$guarantor1_contact2,
    //     'guarantor1-nic'=>$guarantor1_nic,
    //     'guarantor2-name'=>$guarantor2_name,
    //     'guarantor2-contact1'=>$guarantor2_contact1,
    //     'guarantor2-contact2'=>$guarantor2_contact2,
    //     'guarantor2-nic'=>$guarantor2_nic,
    // );
    
    }

    function get_customerdata(){
       // $customer_details= DB::table('customer_details')->get();
        $customer_details=DB::select('select * from customer_details inner join guarantor1_details on customer_details.nic=guarantor1_details.cust1_id inner join guarantor2_details on customer_details.nic=guarantor2_details.cust2_id order by date_purchased');
        return $customer_details;
      
    }

    function getDaily_customers(){
        $customer_details=DB::select('select name,nic from customer_details where selection="daily"');
        return $customer_details;
    }

    function getWeekly_customers(){
        $customer_details=DB::select('select name,nic from customer_details where selection="weekly"');
        return $customer_details;
    }

    function get_guarantor1_count($g1_nic){
        $count=DB::select('select count(guarantor1_nic) as count from guarantor1_details where guarantor1_nic=?',[$g1_nic]);
        if(!$count)
        return $count->count;
        else
        return 0;
    }

    function get_guarantor2_count($g2_nic){
        $count=DB::select('select count(guarantor1_nic) as count from guarantor1_details where guarantor1_nic=?',[$g2_nic]);
        if(!$count)
        return $count->count;
        else
        return 0;

    }

    function get_block_users($b_id){
        $block_users=DB::select('select id from block_users where nic=?',[$b_id]);
        if(!$block_users)
        return 0;
        else
        return 1;
    }

    public function update_data(Request $request){

        $cusomer_nic=$request->input('inputNic');
        $name=$request->input('inputName');
        $address=$request->input('inputAddress');
        $contact1=$request->input('inputContact1');
        $contact2=$request->input('inputContact2');
        $guarantor1_name=$request->input('form_guarantor1Name');
        $guarantor1_nic=$request->input('form_guarantor1Nic');
        $guarantor1_contact1=$request->input('form_guarantor1Contact1');
        $guarantor1_contact2=$request->input('form_guarantor1Contact2');
        $guarantor2_name=$request->input('form_guarantor2Name');
        $guarantor2_nic=$request->input('form_guarantor2Nic');
        $guarantor2_contact1=$request->input('form_guarantor2Contact1');
        $guarantor2_contact2=$request->input('form_guarantor2Contact2');
        $amount=$request->input('amount');
        $installment=$request->input('installment');
        $date_purchased=$request->input('date_purchased');
        $check_daily=$request->input('radio');
        $date = Carbon::now()->toDateTimeString();
        $guarantor1_id=$date;
        $guarantor2_id=$date;

        DB::table('customer_details')->where('nic',$cusomer_nic)->update(['name' => $name,'address'=>$address,'contact1'=>$contact1,'contact2'=>$contact2,
        'amount'=>$amount,'installment'=>$installment,'date_purchased'=>$date_purchased,'selection'=>$check_daily]);
        DB::table('guarantor1_details')->where('cust1_id',$cusomer_nic)->update(['g1_id'=>$guarantor1_id,'guarantor1_nic'=>$guarantor1_nic,'guarantor1_name'=>$guarantor1_name,
        'guarantor1_contact1'=>$guarantor1_contact1,'guarantor1_contact2'=>$guarantor1_contact2]);
        DB::table('guarantor2_details')->where('cust2_id',$cusomer_nic)->update(['g2_id'=>$guarantor2_id,'guarantor2_nic'=>$guarantor2_nic,'guarantor2_name'=>$guarantor2_name,
        'guarantor2_contact1'=>$guarantor2_contact1,'guarantor2_contact2'=>$guarantor2_contact2]);

        $customer_details=$this->get_customerdata();  
        return redirect()->route('view-customer')->with('customers',$customer_details);
    }

    public function delete(Request $request){
        $deleteId=$request->input('deleteId');
        DB::table('customer_details')->where('nic',$deleteId)->delete();
        $customer_details=$this->get_customerdata();   
         return redirect()->route('view-customer')->with('customers',$customer_details);
        // return view('pages.view_details',['customers'=>$customer_details]);

    }

    public function weekly_save(Request $request){

        try{
        $pay_date=$request->input('pay_date');
        $pay_amount=$request->input('pay_amount');
        $row_id=$request->input('row');
        $col_id=$request->input('col');
        $check=$request->has('check');
        $cust_id=$request->input('custId');
        $date = Carbon::now()->toDateTimeString();
        $pay_id=$cust_id.$pay_date;

        if($check)
        DB::insert('replace into user_payment values(?,?,?,?,?,?,?,?)',[$pay_id,$cust_id,$pay_date,$pay_amount,true,"weekly",$row_id,$col_id]);
        else
        DB::insert('replace into user_payment values(?,?,?,?,?,?,?,?)',[$pay_id,$cust_id,$pay_date,$pay_amount,false,"weekly",$row_id,$col_id]);

        $customer_selection=DB::select('select * from customer_details where nic=?',[$cust_id]);
        $customer_payment=$this->get_customer_payment($cust_id);
        foreach($customer_payment as $customer_payment){
        $customer_payment_array[]=(array)$customer_payment;
        }
        foreach($customer_selection as $customer_selection){
        $customer_selection1=$customer_selection->selection;
        $customer_amount=$customer_selection->amount;
        $customer_name=$customer_selection->name;
        $customer_id=$customer_selection->nic;
        $date_purchased=$customer_selection->date_purchased;
        $installment=$customer_selection->installment;
        }
        $count=count($customer_payment_array);
        $interest=($customer_amount/5)*(0.2);
        $count_id=$this->isCompleted($cust_id);
        foreach($count_id as $count_id)
        $count_customer=$count_id->count;
        echo $count_customer;
        if($count_customer==10){
            DB::insert('insert into completed_transactions(nic,name,amount,selection,installment,date_purchased) values(?,?,?,?,?,?)',[$customer_id,$customer_name,$customer_amount,$customer_selection1,$installment,$date_purchased]);
            DB::table('user_payment')->where('cust_id',$customer_id)->delete();
            DB::update('update customer_details set selection=? where nic=?',['none',$customer_id]);
            $week_customers=$this->getWeekly_customers();
            $daily_customers=$this->getDaily_customers();
            return redirect()->route('payers')->with('week_customers',$week_customers)->with('daily_customers',$daily_customers);
        }
        else
        return view('pages.loadSheet',['nic'=>$cust_id,'selection'=>$customer_selection1,'success'=>"Paid",'customerPayment'=>$customer_payment_array,'count'=>$count,'interest'=>$interest]);
        
         }catch(Exception $ex){
            return view('pages.loadSheet',['nic'=>$cust_id,'selection'=>$customer_selection1,'success'=>"Error Inserting",'customerPayment'=>$customer_payment_array,'count'=>$count,'interest'=>$interest]);
        }
    }

    public function daily_save(Request $request){

        try{
            $pay_date=$request->input('pay_date');
            $pay_amount=$request->input('pay_amount');
            $row_id=$request->input('row');
            $col_id=$request->input('col');
            $check=$request->has('check');
            $cust_id=$request->input('custId');
            $date = Carbon::now()->toDateTimeString();
            $pay_id=$cust_id.$pay_date;
    
            if($check)
            DB::insert('replace into user_payment values(?,?,?,?,?,?,?,?)',[$pay_id,$cust_id,$pay_date,$pay_amount,true,"daily",$row_id,$col_id]);
            else
            DB::insert('replace into user_payment values(?,?,?,?,?,?,?,?)',[$pay_id,$cust_id,$pay_date,$pay_amount,false,"daily",$row_id,$col_id]);
    
            $customer_selection=DB::select('select * from customer_details where nic=?',[$cust_id]);
            $customer_payment=$this->get_customer_payment($cust_id);
            foreach($customer_payment as $customer_payment){
            $customer_payment_array[]=(array)$customer_payment;
            }
            foreach($customer_selection as $customer_selection){
            $customer_selection1=$customer_selection->selection;
            $customer_amount=$customer_selection->amount;
            $customer_name=$customer_selection->name;
            $customer_id=$customer_selection->nic;
            $date_purchased=$customer_selection->date_purchased;
            $installment=$customer_selection->installment;
            }
            $count_id=$this->isCompleted($cust_id);
            foreach($count_id as $count_id)
            $count_customer=$count_id->count;
            $interest=($customer_amount/60)*(0.2);
            $count=count($customer_payment_array);
            if($count_customer==60){
                DB::insert('insert into completed_transactions(nic,name,amount,selection,installment,date_purchased) values(?,?,?,?,?,?)',[$customer_id,$customer_name,$customer_amount,$customer_selection1,$installment,$date_purchased]);
                DB::table('user_payment')->where('cust_id',$customer_id)->delete();
                DB::update('update customer_details set selection=? where nic=?',['none',$customer_id]);
                $week_customers=$this->getWeekly_customers();
                $daily_customers=$this->getDaily_customers();
                return redirect()->route('payers')->with('week_customers',$week_customers)->with('daily_customers',$daily_customers);
            }
            else
            return view('pages.loadSheet',['nic'=>$cust_id,'selection'=>$customer_selection1,'success'=>"Paid",'customerPayment'=>$customer_payment_array,'count'=>$count,'interst'=>$interest]);
            }catch(Exception $ex){
                return view('pages.loadSheet',['nic'=>$cust_id,'selection'=>$customer_selection1,'success'=>"Error Inserting",'custoemrPayment'=>$customer_payment_array,'count'=>$count,'interest'=>$interest]);
            }
    }

       function isCompleted($nic){

        $count=DB::select('select count(isPaid) as count from user_payment where (cust_id=? and isPaid=?)',[$nic,true]);
        return $count;

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
