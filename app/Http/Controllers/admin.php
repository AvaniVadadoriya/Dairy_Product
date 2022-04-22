<?php

namespace App\Http\Controllers;
use App\Models\category;
use App\Models\subcategory;
use App\Models\adminregistration;
use App\Models\country;
use App\Models\state;
use App\Models\city;
use App\Models\address;
use App\Models\product;
use App\Models\pimage;
use App\Models\size;
use App\Models\packtype;
use App\Models\contactus;
use App\Models\brand;
use App\Models\attribute;
use App\Models\promocode;
use App\Models\order;
use App\Models\orderdetail;
use App\Models\deliveryboy;
use App\Models\rating;


use App\Models\flavour;
use Mail;
use App\Models\userregistration;

use Illuminate\Http\Request;

class admin extends Controller
{
   
    public function home()
    {
        $id=session()->get('admin.uid');
        if($id)
      {
        
        $data['chart']=\DB::select('SELECT COUNT(o_id) as order_count,SUBSTRING(STR_TO_DATE(o_date,"%Y-%m-%d"),1,7) as chart_month,SUM(amount) as order_amt FROM norder GROUP BY chart_month ORDER BY chart_month');
        $data['product']=\DB::select('SELECT COUNT(pid) as total_product FROM product ')[0];
        $data['order']=\DB::select('SELECT COUNT(o_id) as total_order FROM norder ')[0];
        $data['userregistration']=\DB::select('SELECT COUNT(uid) as total_user FROM userregistration WHERE u_type=0')[0];
        $data['review']=\DB::select('SELECT COUNT(r_id) as total_review FROM rating ')[0];
      }
        else
        {
          return redirect('/admin');
        }
     return view('admin/home',$data);
    }
    public function sidebar()
    {
       
        return view('admin/sidebar');
        

    }
    
    public function chart()
    {
        return view('admin/chart');
    }
    public function documentation()
    {
        return view('admin/documentation');
    }
    public function basic_element()
    {
        return view('admin/basic_element');
    }
    public function mdi()
    {
        return view('admin/mdi');
    }
    public function error_404()
    {
        return view('admin/error_404');
    }
    public function error_500()
    {
        return view('admin/error_500');
    }

    public function login()
    {
       
        return view('/admin/dashboard');
    }
    

    public function logincheck(Request $request)
    {

        $request->validate([
            'email'=>'required|email:rfc',
             'password'=>'required',
        ]);

        $data=$request->input();
        print_r($data);
     
         $result=userregistration::where(['email'=>$data['email'],'password'=>$data['password'],'u_type'=>1])->first();
         print_r($result);
         if($result!='')
         {
            
            session()->put('admin',$result);

            return redirect('/admin/dashboard');
         }
         else
         {  
             session()->flash('message','Emailid or Password Invalid');
             return redirect('/admin');
         }
  
  
    }

    public function logout()
  {
   
      session()->pull('admin');

      return redirect('/admin/dashboard');
  }

   
  public function contactlist()
  {
      $data['contactlist']=contactus::all();
      return view('admin/contactlist',$data);
  }
    
   
    public function category()
    {
        $data['cate']=category::all();
        return view('admin/category',$data);
    }
    public function insertcategory(Request $request)
    {
       $data=$request->input();
       $ins=array(
           'cname'=>$data['cname'],
       );
       $request->validate([
        'cname'=>'required|alpha',
        
        ]);
   
       category::create($ins);
      return redirect('admin/category');
    }
    public function subcategory()
    {
        $data['cate']=category::all();
        $data['subcategory']=subcategory::all();
        return view('admin/subcategory',$data);
    }
    public function insertsubcategory(Request $request)
    {
       

       $data=$request->input();
       $ins=array(
        
        'cid'=>$data['cid'],
           'scname'=>$data['scname'],
       );
       $request->validate([
        
        'scname'=>'required',
        
        ]);
       subcategory::create($ins);
      return redirect('admin/subcategory');
    }

    public function product()
    {
        $data['cate']=category::all();
       
        $data['size']=size::all();
        $data['brand']=brand::all();
        $data['flavour']=flavour::all();
        $data['packtype']=packtype::all();

        //  $data['product']=product::join('brand','brand.brand_id','=','product.brand_id')->join('flavour','flavour.flav_id','=','product.flav_id')->join('packtype','packtype.pack_id','=','product.pack_id')->get();

        $data['sub']=subcategory::where('cid',$data['cate'][0]->cid)->get();
          $data['product']=product::all();
        
      

         return view('admin/product',$data);

    }
    
    public function insertproduct(Request $request)
    {
        $data=$request->input();

        $request->validate([
            'pname'=>'required',
             'price'=>'required|numeric',
             'mfg_date'=>'required|date',
             'expire_date'=>'required|date',
             'qty'=>'required|numeric',
             'description'=>'required',
             'image.*'=>'required|image|mimes:jpg,jpeg,png,jfif,webp',
                     

            

        ]);
        echo "<pre>";
         // print_r($data);
    
       if(isset($data['flavour'])!='')
       { 
        $ins=array(
        'pname'=>$data['pname'],
        'cid'=>$data['cid'],

        's_c_id'=>$data['s_c_id'],
        'brand_id'=>$data['brand'],
        'flav_id'=>$data['flavour'],
       
        'pack_id'=>$data['packtype'],

        'description'=>$data['description'],
        'ingredients'=>$data['ingredients'],
        'nutritional_facts'=>$data['nutritional_facts'],
    );
    $id= product::create($ins)->pid;
    echo "<pre>";
   print_r($ins);
       }
       else
       {
        $ins=array(
            'pname'=>$data['pname'],
            'cid'=>$data['cid'],
            's_c_id'=>$data['s_c_id'],
            
            'brand_id'=>$data['brand'],
            
       
            'pack_id'=>$data['packtype'],
    
            'description'=>$data['description'],
            'ingredients'=>$data['ingredients'],
            'nutritional_facts'=>$data['nutritional_facts'],
        );
        $id= product::create($ins)->pid;
        echo "<pre>";
       print_r($ins);

       }
       

    
    $ins=array(
                    'pid'=>$id,
                    'size_id'=>$data['size'][0],
                    'price'=>$data['price'],
                    'qty' => $data['qty'],
                    'mfg_date' => $data['mfg_date'],

                    'expire_date' => $data['expire_date'],

                   


                );
                echo "<pre>";
                print_r($ins);
                    attribute::create($ins);
  
                  
        // if(isset($data['flavour']))
        // {
        //     $ins=array(
        //         'pid'=>$id,
        //         // 'size_id'=>$data['size'][0],
        //         // 'brand_id'=>$data['brand'][0],
        //         // 'flav_id'=>$data['flavour'][0],
        //         // 'pack_id'=>$data['packtype'][0],
        //        'qty'=>$data['qty'],

    
    
        //     );
        //     echo "<pre>";
        //     print_r($ins);
        //     //  attribute::create($ins);

        // }
        // else
        // {
        //     $ins=array(
        //         'pid'=>$id,
        //         // 'size_id'=>$data['size'][0],
        //         // 'brand_id'=>$data['brand'][0],
        //         // 'flav_id'=>$data['flavour'][0],
        //     //    'flav_id'=>0,
        //         // 'pack_id'=>$data['packtype'][0],
        //         'qty'=>$data['qty'],

                
                
        //     );
        //     echo "<pre>";
        //     print_r($ins);
        //     //  attribute::create($ins);
        // }


       
      
       

   
    



    // echo "<pre>";
    // print_r($ins);
        // echo "<pre>";
        // print_r($request->file('image'));

        // $request->validate([
        //     'image.*'=>'required|image|mimes:jpg,jpeg,png|max:2048',
        // ]);
        // $file=array();

        if($request->hasFile('image'))
        { 
            $image=$request->file('image');
            $p['pid']  = $id;  
            foreach($image as $key=>$val)
            {    
               
                $path=public_path('/Assets/img/product/');
                $filename=time().$key.'.'.$val->extension();
               
               $val->move($path,$filename); 
             $p['url']=$filename;
             echo "<pre>";
             print_r($p);
             pimage::create($p);
            }
           
            
        }
       
       
           return redirect('admin/product');

       
    }

    public function getsubcate($id)
    {
        $sub=subcategory::where('cid',$id)->get();
        foreach($sub as $val)
        {
            echo "<option value='".$val->s_c_id."'>".$val->scname."</option>";
        }
    }

    public function country(Request $request)
    {
       $data['coun']=country::all();
       return view('/admin/country',$data);
    }
    public function insertcountry(Request $request)
    {
        $data=$request->input();
        $ins=array(
            'coun_name'=>$data['coun_name'],
        );
        country::create($ins);
        print_r($ins); 
        return redirect('admin/country');

    }
    public function state()
    {
       $data['coun']=country::all();
       $data['state']=state::all();
       return view('/admin/state',$data);
    }
    public function insertstate(Request $request)
    {
        $data=$request->input();
        $ins=array(
            'coun_id'=>$data['coun_id'],
            's_name'=>$data['s_name'],
        );
        state::create($ins);
        print_r($ins); 
        return redirect('admin/state');

    }
    public function city()
    {
        $data['coun']=country::all();
        $data['state']=state::where('coun_id',$data['coun'][0]->coun_id)->get();
        $data['city']=city::all();

        return view('admin/city',$data);
    }
    public function insertcity(Request $request)
    {
        $data=$request->input();
        $ins=array(
            's_id'=>$data['s_id'],
            'c_name'=>$data['c_name'],
        );
        city::create($ins)->c_id;
        print_r($ins);
        return redirect('admin/city');
    }

    public function address()
    {
        $data['coun']=country::all();
        $data['state']=state::all();
        $data['city']=city::where('s_id',$data['state'][0]->s_id)->get();
        $data['address']=address::all();
      
        return view('admin/address',$data);
    }

    public function getstate($coun_id)
    {
        $state=state::where('coun_id',$coun_id)->get();
        foreach($state as $val)
        {
          echo  "<option value='".$val->s_id."'>".$val->s_name."</option>";
          
        }
    }
    public function getcity($s_id)
    {
        $city=city::where('s_id',$s_id)->get();
        foreach($city as $val)
        {
          echo  "<option value='".$val->c_id."'>".$val->c_name."</option>";
          
        }
    }
   
    public function insertaddress(Request $request)

    {
        $data=$request->input();
        $ins=array(
            'add_name'=>$data['add_name'],
           
            'u_id'=>$data['u_id'],
            'c_id'=>$data['c_id'],
            'pincode'=>$data['pincode'],
        );
        address::create($ins);
        print_r($ins);
        }

        public function fetchcity($id)
        {
            echo $id;
        }













        public function userlist()
        {
            $data['userlist']=userregistration::where('u_type',0)->get();
             return view('admin/userlist',$data);
        }
        public function review()
        {
            $data['review']=rating::join('userregistration','userregistration.uid','rating.uid')->get();
            
           
              return view('admin/review',$data);
        }


        public function deleteproduct($id)
        {
            // \DB::table('product')->where('pid',$id)->delete();

         product::where('pid',$id)->delete();
         return redirect('admin/product')->with('message','Product Deleted Successfully.');
        }
        public function deletecategory($id)
        {
           

         category::where('cid',$id)->delete();
         return redirect('admin/category')->with('message','Category Deleted Successfully.');
        }
        public function deletesubcategory($id)
        {
            

         subcategory::where('s_c_id',$id)->delete();
         return redirect('admin/subcategory')->with('message','Sub Category Deleted Successfully.');
        }



        public function fetchproduct($id)
        {
            $data['images']=pimage::where('pid',$id)->get();
        
            $data['product']=product::join('subcategories','subcategories.s_c_id','=','product.s_c_id')->where('product.pid',$id)->first();
            //print_r($data['product']);
              $data['cate']=category::all();
              $data['brand']=brand::all();
              $data['flavour']=flavour::all();

              $data['packtype']=packtype::all();

              $data['sub']=subcategory::where('cid',$data['product']['cid'])->get();
            //  echo "<pre>";
            //   print_r($data['product']);
              return view('admin/updateproduct',$data);
        }

        public function updateproduct(Request $request,$id)

        {
            $data=$request->input();
         //print_r($data);

            $update=array(
                'pname'=>$data['pname'],
                's_c_id'=>$data['s_c_id'],
                'description'=>$data['description'],
                
                'brand_id'=>$data['brand'],
                'flav_id'=>$data['flavour'],
                'ingredients' => $data['ingredients'],
                'pack_id'=>$data['packtype'],
            );
            // print_r($update);
            product::where('pid',$id)->update($update);
           return redirect('admin/product')->with('message','Product Updated Successfully.');
        }
        public function fetchcategory($id)
        {
            $category=category::find($id);
         return view('admin/updatecategory',compact('category'));
        }

        public function updatecategory(Request $request,$id)
        {            
            $data=$request->input();

            $category=category::find($id);


            $update=array(
                'cname'=>$data['cname'],
            );
             print_r($update);
            category::where('cid',$id)->update($update);

        
            return redirect('admin/category')->with('status',"Category Updated Successfully.");
        }

        public function fetchsubcategory($id)
        {
            $data['sub']=subcategory::where('s_c_id',$id)->first();
            $data['category']=category::all();
            // echo "<pre>";
            // print_r($data);
            return view('admin/updatesubcategory',$data);

        }

        public function updatesubcategory(Request $request,$id)
        {
          $data=$request->input();
          print_r($data);
          $update=array(
            'cid'=>$data['cid'],

            'scname'=>$data['scname'],
          );
          print_r($update);
          subcategory::where('s_c_id',$id)->update($update);
          return redirect('admin/subcategory')->with('status',"Sub Category Updated Successfully.");

        }

        public function size()
        {
            $data['size']=size::all();
            return view('admin/size',$data);
        }
        public function insertsize(Request $request)
        {
           $data=$request->input();
           print_r($data);
           $ins=array(
               'size_name'=>$data['size_name'],
           );
           $request->validate([
        
            'size_name'=>'required',
            
            ]);
           size::create($ins);
           return redirect('admin/size');
        }
        public function brand()
        {
            $data['brand']=brand::all();
            return view('admin/brand',$data);
        }
        public function insertbrand(Request $request)
        {
           $data=$request->input();
           print_r($data);
           $ins=array(
               'brand_name'=>$data['brand_name'],
           );
           $request->validate([
        
            'brand_name'=>'required',
            
            ]);
           brand::create($ins);
           return redirect('admin/brand');
        }
        public function packtype()
        {
            $data['packtype']=packtype::all();
            return view('admin/packtype',$data);
        }
        public function insertpacktype(Request $request)
        {
           $data=$request->input();
           print_r($data);
           $ins=array(
               'pack_name'=>$data['pack_name'],
           );
           $request->validate([
        
            'pack_name'=>'required',
            
            ]);
           packtype::create($ins);
           return redirect('admin/packtype');
        }
        public function flavour()
        {
            $data['flavour']=flavour::all();
            return view('admin/flavour',$data);
        }
        public function insertflavour(Request $request)
        {
           $data=$request->input();
           print_r($data);
           $ins=array(
               'flav_name'=>$data['flav_name'],
           );
           $request->validate([
        
            'flav_name'=>'required',
            
            ]);
           flavour::create($ins);
           return redirect('admin/flavour');
        }

        public function deletesize($id)
        {
            

         size::where('size_id',$id)->delete();
         return redirect('admin/size')->with('message','Size Deleted Successfully.');
        }

        public function updatesize(Request $request,$id)
        {
            
          $data=$request->input();
          print_r($data);
          $update=array(
           

            'size_name'=>$data['size_name'],
          );
          print_r($update);
          size::where('size_id',$id)->update($update);
          return redirect('admin/size')->with('status',"Size Updated Successfully.");

        }
        
        public function fetchsize($id)
        {
            $data['size']=size::where('size_id',$id)->first();
            
            return view('admin/updatesize',$data);
            

        }
        public function fetchbrand($id)
        {
            $data['brand']=brand::where('brand_id',$id)->first();
            
            return view('admin/updatebrand',$data);
            

        }

        public function deletebrand($id)
        {
            

         brand::where('brand_id',$id)->delete();
         return redirect('admin/brand')->with('message','Brand Deleted Successfully.');
        }
        public function updatebrand(Request $request,$id)
        {
            
          $data=$request->input();
          print_r($data);
          $update=array(
           

            'brand_name'=>$data['brand_name'],
          );
          print_r($update);
          brand::where('brand_id',$id)->update($update);
          return redirect('admin/brand')->with('status',"Size Updated Successfully.");

        }

        public function fetchflavour($id)
        {
            $data['flavour']=flavour::where('flav_id',$id)->first();
            
            return view('admin/updateflavour',$data);
            

        }
        public function deleteflavour($id)
        {
            

         flavour::where('flav_id',$id)->delete();
         return redirect('admin/flavour')->with('message','Flavour Deleted Successfully.');
        }
        public function updateflavour(Request $request,$id)
        {
            
          $data=$request->input();
          print_r($data);
          $update=array(
           

            'flav_name'=>$data['flavour_name'],
          );
          print_r($update);
          flavour::where('flav_id',$id)->update($update);
          return redirect('admin/flavour')->with('status','flavour Updated Successfully.');

        }
        public function fetchpacktype($id)
        {
            $data['packtype']=packtype::where('pack_id',$id)->first();
            
            return view('admin/updatepacktype',$data);
            

        }
        public function deletepacktype($id)
        {
         packtype::where('pack_id',$id)->delete();
         return redirect('admin/packtype')->with('message','Packtype Deleted Successfully.');
        }
        public function updatepacktype(Request $request,$id)
        {
            
          $data=$request->input();
          print_r($data);
          $update=array(
           

            'pack_name'=>$data['packtype_name'],
          );
          print_r($update);
          packtype::where('pack_id',$id)->update($update);
          return redirect('admin/packtype')->with('status','packtype Updated Successfully.');

        }

        public function editprofile()
        {
            if(session()->has('admin'))
            { 
                $data['images']=userregistration::where('uid',session()->get('admin.uid'))->first();
                $data['userregistration']=userregistration::where('uid',session()->get('admin.uid'))->first();
                $data['product'] = userregistration::all();
            //    echo "<pre>";
            //     print_r($data['images']);
                 return view('/admin/updateprofile',$data);
            }
            else
            {
                return view('/admin/dashboard');
            }
            
        }
      
        
        public function updateprofile(Request $request,$id)
        {
            
            $data=$request->input();
         //print_r($data);

         $request->validate([
            'image.*' => 'required|image|mimes:png,jpg,jpeg',
        ]);
    $data = $request->input();
    echo "<pre>";
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
            print_r($update);
             userregistration::where('uid',$id)->update($update);
            // $request->validate([
            //     'uname'=>'required|alpha',
            //     'phone'=>'required|numeric|digits:10',
            //     'email'=>'required|email:rfc',
            //     'password'=>'required|same:confirm_password',
            //     'confirm_password'=>'required|same:password',
            //     'dob'=>'required',

                
                
                
            // ]);
            return redirect('admin/dashboard');
           
      
        }

        public function attribute($id)
        {
           
            $data['size']=size::all();
            $data['product']=product::where('pid',$id)->first();
             $data['attribute']=attribute::where('pid',$id)->get();


           
             return view('/admin/attribute',$data);
        }
        public function insertattribute(Request $request)
        {
            $data=$request->input();
            echo "<pre>";
            print_r($data); 
          
            attribute::where('pid',$data['pid'])->delete();
                    foreach($data['size_id'] as  $key => $s)
                    {
                        $ins=array(
                            'pid'=>$data['pid'],
                            'size_id'=>$s,
                            'qty'=>$data['qty'][$key],
                            'price'=>$data['price'][$key],
                            'mfg_date'=>$data['mfg_date'][$key],

                            'expire_date'=>$data['expire_date'][$key],
                            
                            
                        );
                        echo "<pre>";
                        print_r($ins);

                        attribute::create($ins);
                    }
                    
                        return redirect('/admin/product');

                      
           
        }

        public function addadmin()
        {
            return view('admin/addadmin');
        }
        public function newadmin(Request $request)
        {
            $data=$request->input();
            $ins=array(
                'uname'=>$data['uname'],
                'phone'=>$data['phone'],
                'email'=>$data['email'],
                'dob'=>$data['dob'],

                'password'=>$data['password'],
                'u_type'=>1,
            );
            if (isset($data['terms']))
  
          $ins['terms']=$data['terms'];
          
           userregistration::create($ins);
            echo "registration successfully";
            $request->validate([
                'uname'=>'required|alpha',
                'phone'=>'required|numeric|digits:10',
                'email'=>'required|email:rfc',
                'dob'=>'required|date',
                'password'=>'required|same:confirm_password',
                'confirm_password'=>'required|same:password',
                'terms'=>'required',
            ]);  
            return redirect('admin/dashboard');    
        }

        public function promocode()
        {
            $data['userregistration']=userregistration::where('u_type',0)->get();
            $data['promocode']=promocode::leftJoin('userregistration','userregistration.uid','promocode.uid')->get();
            return view('admin/promocode',$data);
        }
        public function inspromocode(Request $request)
        {
            $data=$request->input();
            print_r($data);
            $promocode=promocode::where('code',$data['code'])->first();
            if($promocode!='')
            {
                return redirect('/admin/promocode')->with('message','Code Is Invalid');
            }
            else
            {
                $ins=array(
                    'code'=>$data['code'],
                    'uid'=>$data['uid'],
                    'promo_type'=>$data['promo_type'],
                    'amount'=>$data['amount'],
                    's_date'=>$data['s_date'],
                    'e_date'=>$data['e_date'],
                    'min_order'=>$data['min_order'],
                    'no_use'=>$data['no_use'],
                    'promo_status'=>0,
                );
                $request->validate([
        
                    'code'=>'required',
                    
                    'amount'=>'required|numeric',
                    's_date'=>'required',
                    'e_date'=>'required',
                    'min_order'=>'required|numeric',
                    'no_use'=>'required|numeric',
                    


                    
                    ]);
                // echo "<pre>";
                // print_r($ins);
                promocode::create($ins);
                return redirect('admin/promocode')->with('message','Promocode Successfully Inserted.');
            }
            
        }
        public function checkvalidcode($code)
        {
          
          $promocode=promocode::where('code',$code)->first();
          if($promocode == '')
            echo 0;
          else
          echo 1;
         
        }
        public function deletepromocode($id)
        {
            

            promocode::where('promo_id',$id)->delete();
         return redirect('admin/promocode')->with('message','Promocode Deleted Successfully.');
        }


        public function fetchpromocode($id)
        {
            $data['userregistration']=userregistration::all();
            $data['promocode']=promocode::where('promo_id',$id)->first();
            return view('admin/updatepromocode',$data);
        }
        public function updatepromocode(Request $request,$id)
        {
            
          $data=$request->input();
          print_r($data);
          $update=array(
           

            'code'=>$data['code'],
                    'uid'=>$data['uid'],
                    'promo_type'=>$data['promo_type'],
                    'amount'=>$data['amount'],
                    's_date'=>$data['s_date'],
                    'e_date'=>$data['e_date'],
                    'min_order'=>$data['min_order'],
                    'no_use'=>$data['no_use'],
                    'promo_status'=>1,
          );
          print_r($update);
          promocode::where('promo_id',$id)->update($update);
          return redirect('admin/promocode')->with('status','promocode Updated Successfully.');

        }
        
        public function forgotpassword()
        {
            return view('admin/forgotpassword');
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
                  Mail::send('admin/forgotmail',$data,function($message) use($email){ 
                  $message->to($email)
                  ->subject('Forgot Password');
                  });
                  return redirect('admin/forgotpassword')->with('message','Plz Check Your Mail');
            }
            else  
            {
              return redirect('admin/forgotpassword')->with('message','Enter Valid Email Address');
            }
           
        }
        public function resetlink($token)
        {
            $data['token']=$token;
            return view('admin/forpassword',$data);
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
              return redirect('admin/dashboard')->with('message','Password Successfully Changed');
            }
            else
            {
              return redirect('admin/resetlink/'.$data['token'])->with('message','Password And Confirm Password Does Not Match.');
            }
        }
    public function changepassword()
    {
        if(session()->has('admin'))
        { 
            return view('admin/changepassword');
        }
        else
        {
            return view('/admin/dashboard');
        }
    }
    public function updatechangepassword(Request $request)
    {
     $data=$request->input();
     $request->validate([
        'newpassword'=>'required',
         'confirm_password'=>'required',
         'oldpassword'=>'required',

    ]);
     $userregistration=userregistration::where([['password',$data['oldpassword']],['uid',session()->get('admin.uid')]])->first();
    
     if($userregistration =='')
     {
       return redirect('admin/changepassword')->with('message','Old Password Is Wrong...');
     }
     else
     {
       if($data['newpassword'] == $data['confirm_password'])
       {
        userregistration::where('uid',session()->get('admin.uid'))->update(array('password'=>$data['newpassword']));
        return redirect('admin/dashboard')->with('message','Password Update Successfully...');
      }
       else
       {
        return redirect('admin/changepassword')->with('message','New Password And Confirm Password  Does not Match...');

       }
      
     }

    }
    public function order()
    {

        $data['order']=order::join('userregistration','userregistration.uid' ,'norder.uid')->orderBy('o_id','DESC')->get();
        $data['userregistration']=userregistration::where('u_type',2)->get();

        return view('admin/order',$data);
    }
  
    public function invoice($id)
    {
       
        $data['order']=order::where('o_id' ,$id)->first();
        $data['orderdetail']=orderdetail::join('product','product.pid' ,'orderdetail.pid')->where('orderdetail.o_id',$id)->get();
        foreach($data['orderdetail'] as $val){ 
            $data['images'][$val->pid] = pimage::where('pid',$val->pid)->first();
          }
        // echo "<pre>";
        // print_r($data['order']);
          return view('admin/showinvoice',$data);
    }
    public function chandeorderstatus($id,$status)
    {
       
        order::where('o_id',$id)->update(['o_status'=>$status]);
        return redirect('admin/order')->with('message','Order Status Change Successfully.');
    }
    public function assigndeliveryboy(Request $request)
    {
        $data=$request->input();
      
        print_r($data);

        $update=array(
            'o_status'=>2,
            'd_b_id'=>$data['d_b_name'],
        );
        order::where('o_id',$data['o_id'])->update($update);
        return redirect('admin/order')->with('message','Order Status Change Successfully.');

    }
    public function adddeliveryboy()
    {    $data['images']=userregistration::where('uid',session()->get('deliveryboy.uid'))->first();


        $data['deliveryboy']=userregistration::where('u_type',2)->get();

        return view('admin/adddeliveryboy',$data);
    }
    public function newdeliveryboy(Request $request)
    {
        $data=$request->input();
        $request->validate([
            'uname'=>'required|alpha',
            'phone'=>'required|numeric|digits:10',
            'email'=>'required|email:rfc',
            'dob'=>'required|date',
            'password'=>'required|same:confirm_password',
            'confirm_password'=>'required|same:password',
            'terms'=>'required',
            'image.*' => 'required',
           
            
        ]); 
        if($request->hasFile('image'))
        {
    
            $image = $request->file('image');
            echo "<pre>";
            print_r($image);
            $path = public_path('/Assets/profile');
            $filename = time().'.'.$image->extension();
            $image->move($path,$filename);
           
        }

       
        $ins=array(
            'uname'=>$data['uname'],
            'phone'=>$data['phone'],
            'email'=>$data['email'],
            'dob'=>$data['dob'],
            'url'=>$filename,
            'password'=>$data['password'],
            'u_type'=>2,
        );
       
        if (isset($data['terms']))

      $ins['terms']=$data['terms'];
      
       userregistration::create($ins);
        echo "registration successfully";
        
        return redirect('admin/adddeliveryboy');    
    }
    public function deletedeliveryboy($id)
    {
        

        userregistration::where('uid',$id)->delete();
     return redirect('admin/adddeliveryboy')->with('message','DeliveryBoy Deleted Successfully.');
    }



   

   
    public function deleteimage($id){
       
        $data['image'] = pimage::where('i_id',$id)->delete();
        return redirect()->back();
    }
    
    public function addimage(Request $request,$id){
        $data=$request->input();
        if($request->hasfile('image')){

            $image = $request->file('image');
            print_r($image);
            $p['pid'] = $id;

               foreach($image as $key => $val)
               {
                
                   $path = public_path('/Assets/img/product/');
                   $filename = time().$key.'.'.$val->extension();
                   $val->move($path,$filename);
                   $p['url'] = $filename;
                   pimage::create($p);
               }
            }
            return redirect()->back();
    }
   
}

  