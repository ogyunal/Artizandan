<?php 

namespace Amcoders\Plugin\plan\http\controllers\Store;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Plan;
use App\User;
use App\Userplan;
use Auth;
use Carbon\Carbon;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use DateTime;
class PlanController extends controller
{
	public function index()
	{
		$plans = Plan::where('status',1)->latest()->get();
		return view('plugin::store.plan.index',compact('plans'));
	}

	public function checkout($id)
	{
		$plan = Plan::find(decrypt($id));
		return view('plugin::store.plan.checkout',compact('plan'));
	}

	public function payment(Request $request)
	{

		$plan = Plan::find($request->id);

		if($request->type == 'stripe')
		{
			$currency=\App\Options::where('key','currency_name')->select('value')->first();
			try {
	            $charge = Stripe::charges()->create([
	                'amount' => $plan->s_price,
	                'currency' => strtoupper($currency->value),
	                'source' => $request->stripeToken,
	                'description' => 'Pricing Plan',
	                'receipt_email' => Auth::User()->email,
	                'metadata' => [
	                	'quantity' => 1,
	                ],
	            ]);

	        } catch (Exception $e) {


	        }
		}


		$userplan = new Userplan();
		$userplan->user_id = Auth::User()->id;
		$userplan->plan_id = $plan->id;
		if($request->type == 'paypal')
		{
			$userplan->payment_method = "paypal";
		}elseif($request->type == 'stripe')
		{
			$userplan->payment_method = "stripe";
		}
		
		$userplan->payment_status = 'approved';
		$userplan->status = 'approved';
	
		$userplan->amount = $plan->s_price;
		$userplan->save();

		$user = Auth::User();
		$user->plan_id = $plan->id;
		$user->save();

		if($request->type == 'paypal')
		{
			return "ok";
		}else{
			return redirect()->route('store.plan');
		}
	}



	public function planCheck(Request  $request)
	{
		if (!$request->ajax()) {
			abort(404);
		}
		$latsEntrol= Userplan::where('user_id',Auth::id())->where('payment_status','approved')->with('usersaas')->latest()->first();
		if (!empty($latsEntrol)) {
		$start = Carbon::parse($latsEntrol->updated_at)->format('Y/m/d');
		$end =  date('Y/m/d');

		$datetime1 = new DateTime($start);
		$datetime2 = new DateTime($end);
		$interval = $datetime1->diff($datetime2);
	    $days = $interval->format('%a');
	    if (!empty($latsEntrol->usersaas)) {
	    	$type = $latsEntrol->usersaas->duration;
	    	if ($type=='month') {
	    		$time=30;
	    	}
	    	elseif($type=='year'){
	    		$time=365;
	    	}
	    }
	    else{
	    	$time=30;
	    }

	    if ($days >= $time) {
	    	$user = User::find(Auth::id());
	    	$user->plan_id=1;
	    	$user->save();

	    	$plan = new Userplan;
	    	$plan->user_id = Auth::id();
	    	$plan->plan_id  = 1;
	    	$plan->payment_method  = "default";
	    	$plan->payment_status  = "approved";
	    	$plan->status  = "approved";
	    	$plan->amount  = 0;
	    	$plan->save();
	    }
	    return "";
	  }
	  else{
	  	return "";
	  }

	   
	}
}