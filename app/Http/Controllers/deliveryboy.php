<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\userregistration;
use App\Models\order;

use Mail;

class deliveryboy extends Controller
{
   
    public function home()
    {
      $id=session()->get('deliveryboy.uid');
      if($id)
      {
        
        $data['order']=\DB::select('SELECT COUNT(o_id) as total_order FROM norder,userregistration WHERE norder.d_b_id = userregistration.uid and userregistration.uid= '.$id)[0];

        $data['chart']=\DB::select('SELECT COUNT(o_id) as order_count,SUBSTRING(STR_TO_DATE(o_date,"%Y-%m-%d"),1,7) as chart_month FROM norder,userregistration WHERE norder.d_b_id = userregistration.uid and userregistration.uid ='.$id .' GROUP BY chart_month ORDER BY chart_month ');
        return view('/deliveryboy/home',$data);
      }
      else
      {
        return redirect('/deliveryboy');
      }
     
      

      
    }
    public function login()
    {
        return view('/deliveryboy/dashboard');
    }
    public function logincheck(Request $request)
    {

        $request->validate([
            'email'=>'required|email:rfc',
             'password'=>'required',
        ]);

        $data=$request->input();
        print_r($data);
     
         $result=userregistration::where(['email'=>$data['email'],'password'=>$data['password'],'u_type'=>2])->first();
         print_r($result);
         if($result!='')
         {
            
            session()->put('deliveryboy',$result);

            return redirect('/deliveryboy/dashboard');
         }
         else
         {  
             session()->flash('message','Emailid or Password Invalid');
             return redirect('/deliveryboy');
         }
  
  
    }
    public function logout()
    {
     
        session()->pull('deliveryboy');
  
        return redirect('/deliveryboy/dashboard');
    }
    public function forgotpassword()
    {
        return view('deliveryboy/forgotpassword');
    }
    public function sendlink(Request $request)
    {
        $data=$request->input();
       
        $email=$data['email'];
        $userregistration=userregistration::where('email',$email)->first();
        echo "<pre>";
       
        if($userregistration!='')
        {
          $data['token']=rand(11111,999999);
          userregistration::where('uid',$userregistration->uid)->update(array('token'=>$data['token']));
              Mail::send('deliveryboy/forgotmail',$data,function($message) use($email){ 
              $message->to($email)
              ->subject('Forgot Password');
              });
              return redirect('deliveryboy/forgotpassword')->with('message','Plz Check Your Mail');
        }
        else  
        {
          return redirect('deliveryboy/forgotpassword')->with('message','Enter Valid Email Address');
        }
        $request->validate([
          'email'=>'required',
          
           
  
      ]);
       
    }
    public function resetlink($token)
    {
        $data['token']=$token;
        return view('deliveryboy/forpassword',$data);
    }
    
    public function forpassword(Request $request)
    {
        $data=$request->input();
       
        $request->validate([
          'password'=>'required',
           'confirm_password'=>'required',
           
  
      ]);
        if($data['password']==$data['confirm_password'])
        {
          print_r($data);
          userregistration::where('token',$data['token'])->update(array('password'=>$data['password'],'token'=>''));
          return redirect('deliveryboy/dashboard')->with('message','Password Successfully Changed');
        }
        else
        {
          return redirect('deliveryboy/resetlink/'.$data['token'])->with('message','Password And Confirm Password Does Not Match.');
        }
    }
    public function changepassword()
    {
      if(session()->has('deliveryboy'))
      { 
        return view('deliveryboy/changepassword');
      }
      else
      {
        return view('deliveryboy/dashboard');
      }

    }
    public function updatechangepassword(Request $request)
    {
      $data=$request->input();
      $userregistration=userregistration::where([['password',$data['oldpassword']],['uid',session()->get('deliveryboy.uid')]])->first();

      $request->validate([
        'newpassword'=>'required',
         'confirm_password'=>'required',
         'oldpassword'=>'required',

    ]);
      if($userregistration =='')
      {
        return redirect('deliveryboy/changepassword')->with('message','Old Password Is Wrong...');
      }
      else
      {
        if($data['newpassword'] == $data['confirm_password'])
        {
          userregistration::where('uid',session()->get('deliveryboy.uid'))->update(array('password'=>$data['newpassword']));
          return redirect('deliveryboy/dashboard')->with('message','Password Update Successfully...');
        }
        else
        {
          return redirect('deliveryboy/changepassword')->with('message','New Password And Confirm Password  Does not Match...');

        }
        
      }
     
      

  }
  public function profile()
  {
    $data['images']=userregistration::where('uid',session()->get('deliveryboy.uid'))->first();

    $data['userregistration']=userregistration::where('uid',session()->get('deliveryboy.uid'))->first();

    return view('deliveryboy/showprofile',$data);
  }
  public function orderlist()
  {

    $data['userregistration']=userregistration::join('norder','norder.d_b_id' ,'userregistration.uid')->where('userregistration.uid',session()->get('deliveryboy.uid'))->get();

   
    // echo "<pre>";
    // print_r($data);
      return view('/deliveryboy/orderlist',$data);
  }
  public function fetchdeliveryboy($id)
  {
  
        $data['userregistration']=userregistration::where('uid',$id)->first();
       
    
        return view('deliveryboy/updatedeliveryboy',$data);
  }

  public function updatedeliveryboy(Request $request,$id)

  {
      $data=$request->input();

      
   print_r($data);
   if($request->hasFile('image'))
   {
       
 
       $image = $request->file('image');
       echo "<pre>";
       print_r($image);
       $path = public_path('/Assets/profile');
       $filename = time().'.'.$image->extension();
       $image->move($path,$filename);
      
   }
   $update=array(
      'uname'=>$data['uname'],
      'phone'=>$data['phone'],
      'dob'=>$data['dob'],
      'email'=>$data['email'],
      'url'=>$filename,
      
  );
 
  // echo "<pre>";
  // print_r($update);
  
   userregistration::where('uid',$id)->update($update);
   return redirect('deliveryboy/profile')->with('message','DeliveryBoy Updated Successfully.');



  }

}
