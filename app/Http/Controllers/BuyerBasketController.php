<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BuyerBasket;
use App\Http\Requests\LoginRequest;
use Sentinel;
use DataTables;
use App\User;
use Artisan;
use App\Category;
use App\Item;
use App\Ingredient;
use Hash;
use Cart;
use App\Setting;
use App\Order;
use App\Contact;
use App\City;
use App\OrderResponse;
use Share;
use Session;

class BuyerBasketController extends Controller
{
    //
    
    public function index(Request $request)
    {
     
        
     if($request->get("delivery_option")==0||$request->get("delivery_option")==1){
        $user = Session::get("login_user");
        $category=Category::where("is_deleted",'0')->get();
        $allmenu=Item::all();
        $inter=Ingredient::all();
        $setting=Setting::find(1);
        $city=City::where("is_deleted",'0')->get();
        $ip = $_SERVER['REMOTE_ADDR'];
        $lat=21.2284231;
        $long=72.896816;
        $item=Item::with('categoryitem')->where("is_deleted",'0')->get();
        $buyerbaskets = BuyerBasket::where('user_id', $user)->get();
        $subtotal = BuyerBasket::where('user_id', $user)->get()->sum('prod_price');
        return view("user.basket_checkout")->with("category",$category)->with("allmenu",$allmenu)
        ->with("menu_interdient",$inter)
        ->with("items",$item)->with("shipping",$request->get("delivery_option"))
        ->with("delivery_charges",$setting->delivery_charges)->with("city",$city)
        ->with('latitude',$lat)->with("longtitude",$long)->with("setting",$setting)
        ->with('buyerbaskets', $buyerbaskets)
        ->with('subtotal', $subtotal);
    }
}
    public function store(Request $request)
    {   
        $user = Session::get("login_user");
        $buyer_basket = new BuyerBasket;
        $buyer_basket->user_id = $user;
        $buyer_basket->prod_name = $request->prod_name;
        $buyer_basket->prod_image = $request->prod_image;
        $buyer_basket->prod_price = $request->prod_price;
        $buyer_basket->prod_qty = $request->prod_qty;
        $buyer_basket->save();
        Session::flash('message', __('Item added to basket succesfully')); 
        Session::flash('alert-class', 'alert-success');
        return redirect()->back();
      
    }
    
    public function basketdetails(){
        if(!Session::get("login_user")){
            Session::flash('message', __('Please login')); 
            Session::flash('alert-class', 'alert-success');
            return redirect("/");
         }
        else{
            $setting=Setting::find(1);
            $category=Category::where("is_deleted",'0')->get();
            $item=Item::with('categoryitem')->where("is_deleted",'0')->get();
            $user = Session::get("login_user");
            $buyerbaskets = BuyerBasket::where('user_id', $user)->get();
            $subtotal = BuyerBasket::where('user_id', $user)->get()->sum('prod_price');
            $allmenu=Item::all();
            return view("user.basketdetails")
            ->with("category",$category)
            ->with("delivery_charges",$setting->delivery_charges)
            ->with("buyerbaskets",$buyerbaskets)
            ->with('allmenu', $allmenu)    
            ->with('subtotal', $subtotal);  
        }
     }
    
    public function delete($id){
        $del=BuyerBasket::find($id);
        if($del){
           $del->delete();
  
           Session::flash('message',__('Item was deleted succesfully')); 
           Session::flash('alert-class', 'alert-success');
           return redirect("basketdetails");
        }
        else{
            return redirect("basketdetails");
         }
    }
}
