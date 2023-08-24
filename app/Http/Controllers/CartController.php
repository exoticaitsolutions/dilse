<?php /** @noinspection ALL */

namespace App\Http\Controllers;
use App\Models\Admin\FoodItem as FoodItemAlias;
use Illuminate\Http\JsonResponse as JsonResponseAlias;
use Illuminate\Http\Request;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
class CartController extends Controller
{


public function viewcart(){
    $extra_items = FoodItemAlias::whereIn('menu_id',[7,6,5,9])->where('status',1)->get();
    return view('Pages.cart',compact('extra_items'));
}

    /**
     * @param Request $request
     * @return JsonResponseAlias
     * @noinspection PhpUndefinedFieldInspection
     */
    public function addtocart(Request $request ) : JsonResponseAlias {
        try {
            if (!empty($request->product_oid)) {
                $product = FoodItemAlias::findOrFail($request->product_oid);
                $cart = session()->get('cart', []);
                if(isset($cart[$request->product_oid])) {
                    $cart[$request->product_oid]['quantity']++;
                }else{
                    $cart[$request->product_oid] = [
                        "id" => $request->product_oid,
                        "price" =>  round($product->price ,2) ,
                        "quantity" => 1,
                        "productdetails" => $product,
                        ];
                }
                session()->put('cart', $cart);
                return response()->json(['code' => 200 ,  'cart_total'=>count((array) $cart), 'status' =>'success', "message"=>"Product add to cart successfully"]);
            }else{
                return response()->json(['code' => 203 ,  'cart_total'=>nullValue(),'status' =>'error', "message"=>"Product Id Not Found"]);
            }
        } catch (NotFoundExceptionInterface|ContainerExceptionInterface $e) {
            return response()->json(['code' => 400 ,  'cart_total'=>nullValue(),'status' =>'error', "message"=>"Something Wrong"]);
        }
   }

    /**
     * @param Request $request
     * @return JsonResponseAlias
     * @noinspection PhpUndefinedFieldInspection
     */
    public  function  updatecart(Request $request ): JsonResponseAlias
    {
        $subtotal = 0;
        try {
            $product = FoodItemAlias::findOrFail($request->product_oid);
            $cart = session()->get('cart');
            if ($request->qty > 0 || $request->qty  > '0'  ) {
                $cart[$request->product_oid]["quantity"] = $request->qty;
                session()->put('cart', $cart);
                foreach ($cart as $key => $details) {
                    $subtotal =  $subtotal + round($details["price"]  * $details["quantity"], 2) ;
                }
                $total =  $subtotal + 0.00;
             return response()->json(['code' => 200 , 'cart_total'=>count((array) session('cart')),'subtotal'=>round($subtotal,2) ,'total'=>round($total,2) ,'status' =>'success', "message"=>"Product add to cart successfully"]);
            }else{
                if(isset($request->product_oid)) {
                    unset($request->product_oid);
                    session()->put('cart', $cart);
                }
                foreach ($cart as $key => $details) {
                    $subtotal =  $subtotal + round($details["price"] ,2) ;
                }
                $total =  $subtotal +  $subtotal + 0.00;
                return response()->json(['code' => 200 , 'cart_total'=>count((array) session('cart')),'subtotal'=>round($subtotal,2) ,'total'=>round($total,2) ,'status' =>'success', "message"=>" Product Remove from add  to cart successfully"]);

            }
        } catch (NotFoundExceptionInterface|ContainerExceptionInterface $e) {
            return response()->json(['code' => 400 , 'cart_total'=>'Null', 'subtotal'=>nullOrEmptyString() ,'total'=>nullOrEmptyString() , 'status' =>'error', "message"=>"Something Wrong"]);
        }
    }


    /**
     * @param string $id
     * @return JsonResponseAlias
     * @noinspection PhpUndefinedFieldInspection
     */
    public function destroy(Request $request ,string $id)  : JsonResponseAlias
    {
        $subtotal = 0;
        try {
            if($id) {
                $cart = session()->get('cart');
                if(isset($cart[$id])) {
                    unset($cart[$id]);
                    session()->put('cart', $cart);
                }
                foreach ($cart as $key => $details) {
                    $subtotal =  $subtotal + round($details["price"] ,2) ;
                }
                $total =   $subtotal + 0.00;
                return response()->json(['code' => 200 , 'cart_total'=>count((array) session('cart')),'subtotal'=>round($subtotal,2) ,'total'=>round($total,2) ,'status' =>'success', "message"=>"Product add to cart successfully"]);
            }else{
                return response()->json(['code' => 203 ,  'cart_total'=>nullValue(),'status' =>'error', "message"=>"Product Id Not Found"]);
            }

        } catch (NotFoundExceptionInterface|ContainerExceptionInterface $e) {
            return response()->json(['code' => 400 , 'cart_total'=>'Null', 'subtotal'=>nullOrEmptyString() ,'total'=>nullOrEmptyString() , 'status' =>'error', "message"=>"Something Wrong"]);
        }



    }

}







