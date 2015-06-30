<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Routing\Router;

class ParentController extends Controller {

    protected $my_router;
    public function __construct()
    {
        $this->middleware('auth');
    }
}
