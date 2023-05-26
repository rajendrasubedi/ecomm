<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Esewaorder;
class EsewaController extends Controller
{
    //
    public function list()
	{
		$products  = Product::all();
        // dd($products);
		return view('esewa.product-list', compact('products'));
	}

    public function checkout( Request $request)
    {
    	if( isset( $request->pid) )
    	{
    		$product =  Product::where('id', $request->pid)->first();
    		$order = new esewaorder;
    		$order->product_id = $product->id;
    		$order->invoice_no = $product->id . time();
    		$order->total = $product->amount;
    		$order->save();


    		return view('checkout', compact('product', 'order'));
    	}
    }

    public function success(Request $request)
    {

    	if( isset($request->oid) && isset($request->amt) && isset($request->refId))
    	{
    		$order = esewaorder::where('invoice_no', $request->oid)->first();
    		//dd($order);
    		if( $order)
    		{
    			$url = "https://uat.esewa.com.np/epay/transrec";
				$data =[
				    'amt'=> $esewaorder->total,
				    'rid'=> $request->refId,
				    'pid'=> $esewaorder->invoice_no,
				    'scd'=> 'epay_payment'
				];

			    $curl = curl_init($url);
			    curl_setopt($curl, CURLOPT_POST, true);
			    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
			    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			    $response = curl_exec($curl);
			    //dd($response);
			    curl_close($curl);

			    $response_code = $this->get_xml_node_value('response_code',$response );
			    //dd($response_code);
			    if( trim($response_code) == 'Success')
			    {
			    	$order->status = 1;
			    	$order->save();
			    	return redirect()->route('payment.response')->with('success_message', 'Transaction completed.');
			    }
    		}	

    		
    	}

    }

     public function fail(Request $request)
     {
     	return redirect()->route('payment.response')->with('error_message', ' You have cancelled your transaction .');
     }

    public function get_xml_node_value($node, $xml) {
	    if ($xml == false) {
	        return false;
	    }
	    $found = preg_match('#<'.$node.'(?:\s+[^>]+)?>(.*?)'.
	            '</'.$node.'>#s', $xml, $matches);
	    if ($found != false) {
	        
	            return $matches[1]; 
	         
	    }	  

    return false;
	}

	public function payment_response()
	{
		return view('response-page');
	}
}
