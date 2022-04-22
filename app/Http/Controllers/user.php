<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\userregistration;
use App\Models\product;
use App\Models\pimage;
use App\Models\category;
use App\Models\subcategory;

use App\Models\attribute;
use App\Models\size;
use App\Models\brand;
use App\Models\flavour;
use App\Models\packtype;
use App\Models\cart;
use App\Models\promocode;
use App\Models\order;
use App\Models\orderdetail;
use App\Models\contactus;
use App\Models\wishlist;

use App\Models\rating;


use Mail;



class user extends Controller
{
  public function home()
  {
     $data['category']=category::all();
    //  ==========
     $data['size'] = size::all();
    //  ==========
     $data['product']=product::join('subcategories','subcategories.s_c_id','=','product.s_c_id')->join('category','subcategories.cid','=','category.cid')->limit(8)->orderBy('pid','desc')->get();
// echo "<pre>";
//      print_r($data['product']);
    foreach($data['product'] as $val)
  {
    $data['images'][$val->pid]=pimage::where('pid',$val->pid)->first();
  }
  
//   echo "<pre>";
//  print_r($data['product']);






      return view('home',$data);
  }
  public function about()
  {
    $data['subcategories']=\DB::select('SELECT COUNT(s_c_id) as total_subcategories FROM subcategories ')[0];
    $data['category']=\DB::select('SELECT COUNT(cid) as total_category FROM category ')[0];
    $data['product']=\DB::select('SELECT COUNT(pid) as total_product FROM product ')[0];
    $data['userregistration']=\DB::select('SELECT COUNT(uid) as total_user FROM userregistration WHERE u_type=0')[0];
      return view('about',$data);
  }
  
  
  public function myaccount()
  {
    return view('myaccount');
  }
  
  public function shop()

  {

    $data['category']=category::all();
  
    $data['subcategory']=subcategory::all();
    $data['size']=size::all();
    $data['packtype']=packtype::all();
    $data['brand']=brand::all();
    $data['flavour']=flavour::all();


    $date=date('Y-m-d');
    $data['attribute']=attribute::where('expire_date','<',$date)->get();
    $pro=attribute::destroy($data['attribute']);

     $data['product']=product::paginate(15);

    foreach($data['product'] as $key=>$val)
    {
     
      $data['img'][$val->pid]=pimage::where('pid',$val->pid)->first();

    }
    // echo "<pre>";
    // print_r($data['attribute']);
   
    


  return view('shop',$data);

  }

 

 
 






 
  public function login()
  {

      return view('userlogin');
  }
  function logincheck(Request $request)
  {
    $request->validate([
      'email'=>'required|email:rfc',
       'password'=>'required',
     
    ]);

      $data=$request->input();
      print_r($data);
       $result=userregistration::where(['email'=>$data['email'],'password'=>$data['password'],'u_type'=>0])->first();
      //  $res=userregistration::where(['email'=>$data['email'],'password'=>$data['password'],'u_type'=>1])->first();
      //  $res1=userregistration::where(['email'=>$data['email'],'password'=>$data['password'],'u_type'=>2])->first();

       echo "<pre>";
       print_r($result);
       
if($result != '')
{
  session()->put('user',$result);
  return redirect('/');
}
// elseif($res != '')
// {
//   session()->put('admin',$res);
//   return redirect('/admin/dashboard');

// }
// elseif($res1 != '')
// {
//   session()->put('deliveryboy',$res1);
//   return redirect('/deliveryboy/dashboard');

// }
else
{
  session()->flash('message','Emailid or Password Invalid');
        return redirect('login');

}



















      //  if($result!='')
      //  {
      //     session()->put('user',$result);
      //     return redirect('/');
      //  }
      
      //  else
      //  {  
      //      session()->flash('message','Emailid or Password Invalid');
      //      return redirect('login');
          
      //  }




    




      
  }

  public function logout()
  { 
      session()->pull('user');
      return redirect('/');
  }

  public function registration()
  {
   
   
    $data['userregistration']=userregistration::where('uid',session()->get('user.uid'))->first();

      return view('userregistration',$data);
  }

  function regi(Request $request)
  {
      $data=$request->input();
      $request->validate([
        'uname'=>'required|alpha',
        'phone'=>'required|numeric|digits:10',
        'email'=>'required|email:rfc',
        'password'=>'required|same:confirm_password',
        'confirm_password'=>'required|same:password',
        'dob'=>'required',
        'terms'=>'accepted',
    ]);
      $ins=array(
          'uname'=>$data['uname'],
          'phone'=>$data['phone'],
          'email'=>$data['email'],
          'password'=>$data['password'],
          'dob'=>$data['dob'],


      );
    
      if (isset($data['terms']))
      
      {
        $ins['terms']=$data['terms'];
      }
     
      
         $id= userregistration::create($ins)->uid;

// echo "<pre>";
// print_r($ins);

         return redirect('/');
    

  }

  public function productdetail($id)
  {
    $data['product']=product::where('pid',$id)->first();
     $data['images']=pimage::where('pid',$id)->get();
     $data['size']=attribute::join('size','size.size_id','attribute.size_id')->where('attribute.pid',$id)->get();
     $data['brand']=product::join('brand','brand.brand_id','product.brand_id')->where('product.pid',$id)->get();
     $data['flavour']=product::join('flavour','flavour.flav_id','product.flav_id')->where('product.pid',$id)->get();
     $data['packtype']=product::join('packtype','packtype.pack_id','product.pack_id')->where('product.pid',$id)->get();
  //  $data['price']=attribute::where('pid',$id)->get();

   
// ==============
     $data['attribute'] = attribute::where('pid',$id)->first();
// ===============
$data['r']=rating::where('pid' ,$id)->get();
// echo "<pre>";
// print_r($data['r']);
$data['rating']=rating::join('userregistration','userregistration.uid' ,'rating.uid')->where('pid',$id)->get();
// echo "<pre>";
// print_r($data['product']);

  
  

     return view('productdetail',$data);
  

  } 
     public function addtocart(Request $request)
    {

  


        $data=$request->input();
        echo "<pre>";
        // print_r($data);
        $pid=$data['pid'];
        $sid=$data['size'];
        //  print_r($pid);
        
        
        $key= $pid."_".$sid;
        $product=product::where('pid',$data['pid'])->first();
        $img=pimage::where('pid',$data['pid'])->first();
          $size=size::where('size_id',$sid)->first();
          $attribute = attribute::where([['pid',$data['pid']],['size_id',$sid]])->first();

        $cart=session()->get('cart');
        // print_r($cart);  
        if(!$cart)
        {
            $cart[$key]=array(
              'pid'=>$pid,
                'pname'=>$product->pname,
                'img'=>($img!='' ? $img->url:''),
                'price'=>$attribute->price,
                'qty'=>$data['qty'],
                'size'=>$size->size_name,
                );
                session()->put('cart',$cart);
                // print_r($cart[$key]);
                   return redirect()->back()->with('message','Product Successfully Added In Cart');
        }
        else
        {
          if(isset($cart[$key]))
          {
            $cart[$key]['qty']=$cart[$key]['qty'] + $data['qty'];
            session()->put('cart',$cart);
              return redirect()->back()->with('message','Product Successfully Added In Cart');

          }
          else{
            $cart[$key]=array(
              'pid'=>$pid,
              'pname'=>$product->pname,
              'img'=>($img!='' ? $img->url:''),
              'price'=>$attribute->price,
              'qty'=>$data['qty'],
               'size'=>$size->size_name,
              

              );
              session()->put('cart',$cart);
              // print_r($cart[$key]);
               return redirect()->back()->with('message','Product Successfully Added In Cart');
            
          }
        }
       

    }
  
    public function cart()
    {
      
      $data['cart']=session()->get('cart');
      return view('cart',$data);
      
    }
    // ====================================
    public function deletecart($id)
    {
      $cart=session()->get('cart');
    
      if(isset($cart[$id]))
      {
       
        unset($cart[$id]);
        
      }
     
      
      session()->put('cart',$cart);
      
      return redirect()->back();
      
    }
   
    // ============================================
 
   
    public function updatecart($key,$qty)
    {
      $cart=session()->get('cart');
      $cart[$key]['qty']=$qty;
      session()->put('cart',$cart);
     
    }
  

    public function sendmail()
    {
      $data=array();
      Mail::send('mail',$data,function($message){
        $message->to('priyankashingala1@gmail.com')
        ->subject('Testing');
      });
    }
    public function forgotpassword()
    {
      return view('forgotpassword');
    }
    public function sendlink(Request $request)
    {
      $data=$request->input();
      $request->validate([
                
        'email'=>'required',
        

   ]);
      $email=$data['email'];
      $userregistration=userregistration::where('email',$email)->first();
      echo "<pre>";
     
      if($userregistration!='')
      {
        $data['token']=rand(11111,999999);
        userregistration::where('uid',$userregistration->uid)->update(array('token'=>$data['token']));
            Mail::send('forgotmail',$data,function($message) use($email){ 
            $message->to($email)
            ->subject('Forgot Password');
            });
            return redirect('forgotpassword')->with('message','Plz Check Your Mail');
      }
      else  
      {
        return redirect('forgotpassword')->with('message','Enter Valid Email Address');
      }
      
    }

    public function resetlink($token)
    {
        $data['token']=$token;
        return view('forpassword',$data);
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
          return redirect('login')->with('message','Password Successfully Changed');
        }
        else
        {
          return redirect('resetlink/'.$data['token'])->with('message','Password And Confirm Password Does Not Match.');
        }
    }
    public function validcode($code)
    {
      $cart=session()->get('cart');
      $total=0;
      $res=array(
        'msg'=>'',
        'msg1'=>'',

        'discount'=>0,
        'total'=>0,
      );
      session()->pull('coupon');
      if($cart!='')
      {

        foreach($cart as $val)
        {
          $total=$total+($val['price']*$val['qty']);
          $res['total']=$total;
        }
        if(session()->has('user'))
        {
          $uid=session()->get('user.uid');
          $order=order::where([ ['code',$code],['uid',$uid] ])->get();
        }

        $coupon=promocode::where([['code',$code],['promo_status',0]])->first();
     
        if($coupon!='')
        {
            if($coupon->uid==0 || (session()->has('user') && $coupon->uid==$uid) )
            {
              if($total >= $coupon->min_order)
              {
               
                if(count($order) < $coupon->no_use)
                {
                  if($coupon->promo_type == 0)
                {
                    $dis=$coupon->amount ;
                    $total=$total - $coupon->amount ;
                  
                    $res['msg1']='Coupon Applied Successfully.';
                    $res['discount']=$dis;
                    $res['total']=$total;
                    $cdata=array(
                      'code'=>$code,
                      'discount'=>$dis,
                      
                    );
                    session()->put('coupon',$cdata);
                }
                else
                {
                  $dis=($total * $coupon->amount )/ 100 ;
                  $total=$total - $dis;

                  $res['msg1']='Coupon Applied Successfully.';
                  $res['discount']=$dis;
                  $res['total']=$total;

                  $cdata=array(
                    'code'=>$code,
                    'discount'=>$dis,
                    
                  );
                  session()->put('coupon',$cdata);

                }
                }
                else
                {
                  $res['msg']="This Coupon Is Already Used";
                }
              }
              else
              {
                $res['msg']="Your Cart Is Less Than". $coupon->min_order;
              }
            }
            else
            {
              $res['msg']= "Invalid Coupon Code"; 
            }
         
            
        }
        else
        {
          $res['msg']="Invalid Coupon ";
        }
      }
       else
      {
        $res['msg']="your cart is empty";
      }
      echo json_encode($res);
     
     
    }
    public function checkout()
    {
     

      if(session()->has('user') )
      {        
        $data['cart']=session()->get('cart');
        return view('checkout',$data);
      
      }
      else
      {
        return view('/userlogin');
      }
     
    }
   
    public function payment(Request $request)
    {

      $data=$request->input();
      $request->validate([
        'name'=>'required|alpha',
        'email'=>'required|email:rfc,dns',
        'pincode'=>'required|digits:6|numeric',
        'phone'=>'required|numeric|digits:10',
        'address'=>'required',
        'city'=>'required',
        
    ]);
      print_r($data);
      $ins=array(
        'uid'=>session()->get('user.uid'),
        'amount'=>$data['amount'],
        'payment_id'=>$data['payment_id'],
        'o_email'=>$data['email'],
        'o_phone'=>$data['phone'],
        'address'=>$data['address'],
        'city'=>$data['city'],
        'o_status'=>0,
        'pincode'=>$data['pincode'],
        'o_date'=>date('Y-m-d'),
        'o_name'=>$data['name'],
        


      );
     
      print_r($ins);
      $coupon=promocode::where('code',session()->get('coupon.code'))->first();
      
     $cart=session()->get('cart');
      print_r($cart);
      if(session()->has('coupon'))
      {
        $ins['code']=$coupon->code;
        $ins['discount']= session()->get('coupon.discount');
      }
      $oid=order::create($ins)->o_id;
      foreach($cart as $c)
      {
        $orderdetail=array(
            'o_id'=>$oid,
            'pid'=>$c['pid'],
            'o_qty'=>$c['qty'],
            'o_price'=>$c['price'],
            'o_size_id'=>$c['size'],
           


        );
        orderdetail::create($orderdetail);
     
      }
      session()->pull('cart');
      session()->pull('coupon');

      \Session::flash('message','Order Placed Successfully.');
    }
    public function editprofile()
    {

        $data['userregistration']=userregistration::where('uid',session()->get('user.uid'))->first();
      return view('/updateprofile',$data);
    }
  
    
    public function updateprofile(Request $request,$id)
    {
        
        $data=$request->input();
     //print_r($data);

        $update=array(
            'uname'=>$data['uname'],
            'phone'=>$data['phone'],
            'dob'=>$data['dob'],
            'email'=>$data['email'],
           
            
        );
        print_r($update);
        userregistration::where('uid',$id)->update($update);
        $request->validate([
            'uname'=>'required|alpha',
            'phone'=>'required|numeric|digits:10',
            'email'=>'required|email:rfc',
            'password'=>'required|same:confirm_password',
            'confirm_password'=>'required|same:password',
            'dob'=>'required',

            
            
            
        ]);
  
    }
    public function changepassword()
    {
      return view('changepassword');
    }
    public function updatechangepassword(Request $request)
    {
     $data=$request->input();
     $request->validate([
      'newpassword'=>'required',
       'confirm_password'=>'required',
       'oldpassword'=>'required',

  ]);
     $userregistration=userregistration::where([['password',$data['oldpassword']],['uid',session()->get('user.uid')]])->first();
    
     if($userregistration =='')
     {
       return redirect('changepassword')->with('message','Old Password Is Wrong...');
     }
     else
     {
       if($data['newpassword'] == $data['confirm_password'])
       {
        userregistration::where('uid',session()->get('user.uid'))->update(array('password'=>$data['newpassword']));
        return redirect('/')->with('message1','Password Update Successfully...');
      }
       else
       {
        return redirect('changepassword')->with('message','New Password And Confirm Password  Does not Match...');

       }
      
     }
     
    }
    public function searchproduct(Request $request)
    {
       $data=$request->input();
       $data['category'] = category::all();
       $data['subcategory'] = subcategory::all();
       $data['size'] = size::all();
       $data['packtype'] = packtype::all();
       $data['brand'] = brand::all();
       $data['flavour'] = flavour::all();
      if(isset($data['pname'])!= '')
      {
            $data['product']= product::where('pname','LIKE','%'.$data['pname'].'%')->paginate(15);
            foreach($data['product'] as $key=>$val)
        {
        
          $data['img'][$val->pid]=pimage::where('pid',$val->pid)->first();
        
          
        }
        if(count($data['product']) > 0)
          {
            return view('shop',$data);
          }
          else
          {
            return redirect('shop')->with('message','Product Not Found.');
          }
            
      }
      else
      {
        $data['product']=product::paginate(15);
        foreach($data['product'] as $key=>$val)
        {
         
          $data['img'][$val->pid]=pimage::where('pid',$val->pid)->first();
        }
        
    
       return view('shop',$data);
       
      }
        // $data['product']= product::where('pname','LIKE','%'.$data['pname'].'%')->paginate(3);
       
        // foreach($data['product'] as $key=>$val)
        // {
        
        //   $data['img'][$val->pid]=pimage::where('pid',$val->pid)->first();
        
          
        // }
        // if(count($data['product']) > 0)
        //   {
        //     return view('shop',$data);
        //   }
        //   else
        //   {
        //     return redirect('shop')->with('message','Product Not Found.');
        //   }
      
  
      
    
    }
    public function contactus()
    {
        return view('contactus');
    }
    public function contact(Request $request)
    {
        $request->validate([
            'name'=>'required|alpha',
            'email'=>'required|email:rfc,dns',
            'message'=>'required',
        ]);
        $data=$request->input();
        $insert=array(
            'contact_name'=>$data['name'],
            'contact_email'=>$data['email'],
            'message'=>$data['message'],
        );
        contactus::create($insert);
        return redirect('contactus')->with('message','Your Message Have Forwarded Successfully.');
        
    }
       
    public function getprice($id,$pid)
    {
    
      $price = attribute::where([ ['size_id',$id] , ['pid',$pid] ])->first();
          echo "<h3>".'₹  '. $price->price."</h3>";
    }
    public function getmfgdate($id,$pid)
  {
    
    $mfg_date = attribute::where([ ['size_id',$id] , ['pid',$pid] ])->first();
    
      echo "<h6><b>".'Mfg. Date :</b> '.$mfg_date->mfg_date."</h6>";
        
  }
  public function getexpiredate($id,$pid)
  {
    
    $expire_date = attribute::where([ ['size_id',$id] , ['pid',$pid] ])->first();
    
      echo "<h6><b>".'Exp. Date :</b> '.$expire_date->expire_date."</h6>";
        
  }
  public function myorder()
  {
   
    $data['order']=order::where('uid',session()->get('user.uid'))->orderBy('o_id','asc')->get();
   
     return view('myorder',$data);
  }
  public function orderdetail($id)
  {
    $data['order']=order::where('o_id' ,$id)->first();
    $data['orderdetail']=orderdetail::join('product','product.pid' ,'orderdetail.pid')->where('orderdetail.o_id',$id)->get();
    foreach($data['orderdetail'] as $val){ 
      $data['images'][$val->pid] = pimage::where('pid',$val->pid)->first();
  }
  
    // echo "<pre>";
    // print_r($data['order']);
      return view('orderdetail',$data);
  }
  public function userinvoice($id)
  {
    
    $data['order']=order::where('o_id' ,$id)->first();
    $data['orderdetail']=orderdetail::join('product','product.pid' ,'orderdetail.pid')->where('orderdetail.o_id',$id)->get();
    foreach($data['orderdetail'] as $val){ 
      $data['images'][$val->pid] = pimage::where('pid',$val->pid)->first();
  }
  
    // echo "<pre>";
    // print_r($data['order']);
      return view('userinvoice',$data);
  }
  
  public function showcoupon(){
   
  
    if(session()->has('user'))
    {
        $data['coupon'] = promocode::where('uid',session()->get('user.uid'))->orWhere('uid',0)->get();
      //  echo "<pre>";
      //   print_r($data);
        return view('showcoupon',$data);
    }
   
  
}
  public function rating(Request $request)
  {

    $data=$request->input();
    // print_r($data);
    $request->validate([
      'review'=>'required',
       
       

  ]);
  if(session()->has('user')!='')
  {


    $rating=rating::where([['pid',$data['pid']],['uid',session()->get('user.uid')]])->first();

    if(isset($rating) && $rating!='')
    {
      return redirect()->back()->with('message','You can not Apply Rating Multiple Time');
    }
    else
    {
      $ins=array(
        'pid'=>$data['pid'],
        'rating'=>$data['rating'],
        'review'=>$data['review'],
        'uid'=>session()->get('user.uid'),
        'r_date'=>date('Y-m-d'),
      );
      rating::create($ins);
      return redirect()->back();
    

    }
  }
  else
  {
    return redirect('/login')->with('message','Please Login First');
  }


  
  }
  public function applyfilter(Request $request)
  {
    $data=$request->input();
    // echo "<pre>";
    // print_r($data);

    $data['category'] = category::all();
    $data['subcategory'] = subcategory::all();
    $data['packtype'] = packtype::all();
    $data['size'] = size::all();
    $data['brand'] = brand::all();
    $data['flavour'] = flavour::all();


    $query='';
    if(isset($data))
    {
      $query.="SELECT product.pid,product.pname,attribute.price 
      FROM product,attribute
      WHERE attribute.pid = product.pid ";
      if(isset($data['minprice']) && $data['minprice']!='')
      {
        $query.=" AND  attribute.price >= ".$data['minprice'];
      }

      if(isset($data['maxprice']) && $data['maxprice']!='')
      {
        $query.=" AND  attribute.price <= ".$data['maxprice'];
      }
     
      if(isset($data['scname']))
      {
        $query .= " AND product.s_c_id IN (";
        foreach($data['scname'] as $key => $val)
        {
           if($key < (count($data['scname']) - 1))
           {
               $query .= $val.",";
           }
           else
           {
               $query .= $val;
           }
        }
          $query .= ")";
      }
   if(isset($data['cname']))
      {
        $query .= " AND product.cid IN (";
        foreach($data['cname'] as $key => $val)
        {
           if($key < (count($data['cname']) - 1))
           {
               $query .= $val.",";
           }
           else
           {
               $query .= $val;
           }
        }
        $query .= ")";
      }
      if(isset($data['pack_name']))
      {
        $query .= " AND product.pack_id IN (";
        foreach($data['pack_name'] as $key => $val)
        {
           if($key < (count($data['pack_name']) - 1))
           {
               $query .= $val.",";
           }
           else
           {
               $query .= $val;
           }
        }
        $query .= ")";
      }
      if(isset($data['brand_name']))
      {
        $query .= " AND product.brand_id IN (";
        foreach($data['brand_name'] as $key => $val)
        {
           if($key < (count($data['brand_name']) - 1))
           {
               $query .= $val.",";
           }
           else
           {
               $query .= $val;
           }
        }
        $query .= ")";
      }
      if(isset($data['flav_name']))
      {
        $query .= " AND product.flav_id IN (";
        foreach($data['flav_name'] as $key => $val)
        {
           if($key < (count($data['flav_name']) - 1))
           {
               $query .= $val.",";
           }
           else
           {
               $query .= $val;
           }
        }
        $query .= ")";
      }
   if(isset($data['size_name']))
      {
        $query .= " AND attribute.size_id IN (";
        foreach($data['size_name'] as $key => $val)
        {
           if($key < (count($data['size_name']) - 1))
           {
               $query .= $val.",";
           }
           else
           {
               $query .= $val;
           }
        }
        $query .= ")";
      }

    }
      $query.=" Group By product.pid";
   
    $data['product']= \DB::select($query);
    
  
    // print_r($data['product']);

    
    foreach($data['product'] as $key=>$val)
  {
   
    $data['img'][$val->pid]=pimage::where('pid',$val->pid)->first();
  }
  // print_r($data['img']);
     return view('applyfilter',$data);
}
  
  
  public function wishlist(){
        
    $data['wishlist'] = wishlist::join('product','product.pid','wishlist.pid')->where('uid',session()->get('user.uid'))->get();
    foreach($data['wishlist'] as $val){ 
        $data['images'][$val->pid] = pimage::where('pid',$val->pid)->first();
    }
    
    return view('wishlist',$data);
  }
  public function addtowishlist($id){
    $user = session()->get('user');
    if($user!='')
    {
        $wish = wishlist::where([ ['pid',$id] , ['uid',$user['uid']] ])->first();
      
        if($wish!='')
        {
            return redirect()->back()->with('message1','Product Already Added To Wishlist');   
        }
        else
        {
            $ins = array(
                'pid' => $id,
                'uid' => $user['uid'],
            );
            
            wishlist::create($ins);
            return redirect()->back()->with('message2','Product Added To Wishlist');
            
        }
      
    }
    else
    {
        return view('/userlogin')->with('message','Login First !!');
    }
    
  }
  public function deletewishlist($id)
  {
     

   wishlist::where('w_id',$id)->delete();
   return redirect('wishlist');
  }

}




