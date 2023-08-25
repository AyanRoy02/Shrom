<?php

namespace App\Http\Controllers;

use App\Library\SslCommerz\SslCommerzNotification;

use App\Models\Cart;
use App\Models\JobPost;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SslCommerzPaymentController extends Controller
{
    public function exampleEasyCheckout()
    {
        return view('exampleEasycheckout');
    }

    public function exampleHostedCheckout()
    {
        return view('exampleHosted');
    }

    public function index(Request $request)
    {

        $client = Auth::user();
        $jobPost = Cart::where('client_id', $client->id)->get();
        $client_id = $client->id;
//        $order = new Order;
//        $order->client_id = $client->id;
//        $order->job_id = $jobPost->id;
        $carts = Cart::where('client_id', $client_id)->with(['jobPost.createby', 'user'])->get();
        $total_cart_price = 0;
        foreach ($carts as $cart) {
            $total_cart_price = $total_cart_price + $cart->jobPost->total_price;
        }
        $data = array();
        $data['jobPost'] = Cart::where('client_id', $client->id)->get();
        $data['client_id'] = $client->id;
        $data['cus_email'] = $client->email;
        $data['cus_phone'] = $client->phone ?? '01777762200';
        $data['shipping_method'] = 'sslcommerz';
        $data['currency'] = "BDT";
        $data['ship_name'] = "Store Test";
        $data['ship_add1'] = "Dhaka";
        $data['ship_add2'] = "Dhaka";
        $data['ship_city'] = "Dhaka";
        $data['ship_state'] = "Dhaka";
        $data['ship_postcode'] = "1000";
        $data['ship_phone'] = "";
        $data['ship_country'] = "Bangladesh";
        $data['shipping_method'] = "NO";
        $data['product_name'] = "product" ?? '';
        $data['product_category'] = "category" ?? '';
        $data['product_profile'] = "profile" ?? '';

        $data['amount'] = $total_cart_price;
        $data['total_item'] = Cart::count();
        $data['transaction_id'] = rand(1000000, 999999999);
        $data['tran_id'] = rand(1000000, 999999999);
        $order = Order::create([
            'client_id' => $data['client_id'],
            'amount' => $data['amount'],
            'total_item' => $data['total_item'],
            'transaction_id' => $data['transaction_id'],
            'status' => 'Pending',
        ]);
        foreach ($jobPost as $cart) {
            DB::table('order_details')->insert([
                'client_id' => $cart->client_id,
                'job_id' => $cart->job_id,
                'order_id' => $order->id,

            ]);
            // $job = JobPost::updateOrCreate(
            //     [
            //         'action' => 'confirmed'
            //         ]
            // );
            // dd($job);



        $cart_id = $cart->id;

        $cartdlt = Cart::find( $cart_id );
        $cartdlt->delete();
    }

// dd($data);
        $sslc = new SslCommerzNotification();
        # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payment gateway here )
        $payment_options = $sslc->makePayment($data, 'checkout', 'hosted');
        if (!is_array($payment_options)) {
            $payment_options = json_decode($payment_options, true);
// dd($payment_options);
            return redirect()->away($payment_options['data']);
        }

    }

    public function success(Request $request)
    {
//        echo "Transaction is Successful";
        $tran_id = $request->input('tran_id');

        $amount = $request->input('amount');
        $currency = $request->input('currency');

        $sslc = new SslCommerzNotification();

        #Check order status in order tabel against the transaction id or order id.
        $order_detials = DB::table('orders')
            ->where('transaction_id', $tran_id)
            ->select('transaction_id', 'status', 'currency', 'amount')->first();

        if ($order_detials->status == 'Pending') {
            $validation = $sslc->orderValidate($request->all(), $tran_id, $amount, $currency);

            if ($validation) {
                $update_product = DB::table('orders')
                    ->where('transaction_id', $tran_id)
                    ->update(['status' => 'paid']);
                return redirect('/');

                echo "<br >Transaction is Successfully Completed";
            }
        } else if ($order_detials->status == 'Processing' || $order_detials->status == 'Complete') {
            /*
             That means through IPN Order status already updated. Now you can just show the customer that transaction is completed. No need to udate database.
             */
            return redirect('/');

            echo "Transaction is Successfully Completed";
        } else {

            #That means something wrong happened. You can redirect customer to your product page.
            echo "Invalid Transaction";
        }


    }

    public function fail(Request $request)
    {
        $tran_id = $request->input('tran_id');

        $order_detials = DB::table('orders')
            ->where('transaction_id', $tran_id)
            ->select('transaction_id', 'status', 'currency', 'amount')->first();

        if ($order_detials->status == 'Pending') {
            $update_product = DB::table('orders')
                ->where('transaction_id', $tran_id)
                ->update(['status' => 'Failed']);
                return redirect()->back();
            echo "Transaction is Falied";
        } else if ($order_detials->status == 'Processing' || $order_detials->status == 'Complete') {
            echo "Transaction is already Successful";
        } else {
            echo "Transaction is Invalid";
        }

    }

    public function cancel(Request $request)
    {
        $tran_id = $request->input('tran_id');

        $order_detials = DB::table('orders')
            ->where('transaction_id', $tran_id)
            ->select('transaction_id', 'status', 'currency', 'amount')->first();

        if ($order_detials->status == 'Pending') {
            $update_product = DB::table('orders')
                ->where('transaction_id', $tran_id)
                ->update(['status' => 'Canceled']);
                return redirect()->back();
            echo "Transaction is Cancel";
        } else if ($order_detials->status == 'Processing' || $order_detials->status == 'Complete') {
            echo "Transaction is already Successful";
        } else {
            echo "Transaction is Invalid";
        }


    }

    public function ipn(Request $request)
    {
        #Received all the payement information from the gateway
        if ($request->input('tran_id')) #Check transation id is posted or not.
        {

            $tran_id = $request->input('tran_id');

            #Check order status in order tabel against the transaction id or order id.
            $order_details = DB::table('orders')
                ->where('transaction_id', $tran_id)
                ->select('transaction_id', 'status', 'currency', 'amount')->first();

            if ($order_details->status == 'Pending') {
                $sslc = new SslCommerzNotification();
                $validation = $sslc->orderValidate($request->all(), $tran_id, $order_details->amount, $order_details->currency);
                dd($validation);
                if ($validation == TRUE) {
                    /*
                    That means IPN worked. Here you need to update order status
                    in order table as Processing or Complete.
                    Here you can also sent sms or email for successful transaction to customer
                    */
                    $update_product = DB::table('orders')
                        ->where('transaction_id', $tran_id)
                        ->update(['status' => 'Processing']);
                    return redirect('/');

                    echo "Transaction is successfully Completed";
                }
            } else if ($order_details->status == 'Processing' || $order_details->status == 'Complete') {

                #That means Order status already updated. No need to udate database.
                $update_product = DB::table('orders')
                    ->where('transaction_id', $tran_id)
                    ->update(['status' => 'Complete']);



                return redirect('/');
            } else {
                #That means something wrong happened. You can redirect customer to your product page.

                echo "Invalid Transaction";
            }
        } else {
            echo "Invalid Data";
        }
    }

}

