<?php namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Support\Facades\Request as Form_Request;
use App\Customer;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class CustomersController extends ParentController {

    public $customer;
    public function __construct(Customer $customer)
    {
        parent::__construct();

        $this->customer = $customer;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $customer = $this->customer->create(Form_Request::all());
        if($customer != null)
        {
            $redirect = Redirect::back();
            return $redirect;
        }
	}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Display many resources.
     */
    public function showMany()
    {
        return view('customers.all')
            ->withCustomers($this->customer->get());
    }

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
