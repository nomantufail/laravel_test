<?php namespace App\Http\Controllers;

use App\Product;
use DB;
use App\Customer;
use App\Test_Table_1;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Http\Controllers\ParentController;

class WelcomeController extends ParentController {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
    private $customer;
    //protected $router;
	public function __construct(Product $p)
    {
        parent::__construct();
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
        //echo"hello";
        //echo $this->getRouter()->currentRouteName();
        //$ithName = $this->customer->all();
		return view('home');
	}

    public function show($name)
    {
        $customer = $this->customer->whereName($name)->first();
        return view('customer_profile',compact('customer'));
    }

    public function edit($name)
    {
        $customer = $this->customer->whereName($name)->first();
        return view('edit_customer_profile',compact('customer'));
    }

    public function guest()
    {
        return "Welcome Guest";
    }

}
