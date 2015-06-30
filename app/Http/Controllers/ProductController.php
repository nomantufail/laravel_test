<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Product;
use App\Stock;
use App\Tanker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Request as Form_Request;
use Symfony\Component\Console\Input;

class ProductController extends ParentController {

    public $product;
    public function __construct(Product $product)
    {
        $this->product = $product;
        parent::__construct();
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


    public function show_all()
    {
        $products = Product::with('stock')->with('customer')->get();
        $tankers = Tanker::with('stock')->get();

        return View('products.all')
            ->withProducts($products)
            ->withTankers($tankers);
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

        $product = Product::create(Form_Request::all());
        $stock = array(
            'product_id'=>$product->id,
            'tanker_id'=>1,
            'quantity'=>0,
        );
        Stock::create($stock);
        $redirect =  Redirect::back();
        if($product != null)
        {
            return $redirect->with('message', 'Successfully saved!');
        }
        else
        {
            return $redirect->withInput()->withErrors(['error_message',]);
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

	}

}
