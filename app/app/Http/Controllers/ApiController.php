<?php

namespace App\Http\Controllers;

use App\Traits\RequestHandler;
use App\Traits\DatabaseHandler;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Api;
use DB;

class ApiController extends Controller
{
    use RequestHandler, DatabaseHandler;

  	public function index()
  	{
  		//This empties the table and reindex the primary key.
  		$this->truncate_table('apis');

  		//This makes request to the NASA API server and gets data, organizes it and responses it.
 	 	$data = $this->get_data();

 	 	//This inserts the data one by one into database table "apis" with respect to the columns.
  		$this->insert_into_api($data);

  		$array = json_encode(array("hello"=>"world"));
  		return view('api.index', compact('array'));
  	}

  	public function hazardous()
  	{
  		$neos = Api::where('is_hazardous', '=', 1)
  			->get();

  		return view('api.hazardous', compact('neos'));
  	}

  	public function fastest(Request $request)
  	{
  		$hazardous = $request->hazardous;
  		$hz = 0;
  		
  		if($hazardous != null)
  		{
  			if($hazardous == "true")
  			{
  				$hz = 1;
  			}

  		}

  		//Query gets maximum speed NEO with respect to hazardous boolean value
  		$neos = DB::table('apis')
  			->where('is_hazardous','=',$hz)
  			->selectRaw("reference, name, MAX(speed) AS speed, is_hazardous")
  			->first();

  		return view('api.fastest', compact('neos', 'hz'));
  	}

  	public function best_year(Request $request)
  	{
  		$hazardous = $request->hazardous;
  		$hz = 0;
  		
  		if($hazardous != null)
  		{
  			if($hazardous == "true")
  			{
  				$hz = 1;
  			}

  		}
  		
  		//Query gets YEAR with max NEOs with respect to hazardous boolean value
  		$neos = DB::table('apis')
  			->selectRaw("DATE_FORMAT(date, '%Y') AS year, COUNT(*) AS count")
  			->where('is_hazardous','=',$hz)
  			->groupBy(DB::raw("DATE_FORMAT(date, '%Y')"))
  			->orderBy('count', 'DESC')
  			->first();

  		return view('api.best_year', compact('neos', 'hz'));
  	}

  	public function best_month(Request $request)
  	{
  		$hazardous = $request->hazardous;
  		$hz = 0;
  		
  		if($hazardous != null)
  		{
  			if($hazardous == "true")
  			{
  				$hz = 1;
  			}

  		}

  		//Query gets MONTH with max NEOs with respect to hazardous boolean value
  		$neos = DB::table('apis')
  			->selectRaw("DATE_FORMAT(date, '%m') AS month, COUNT(*) AS count")
  			->where('is_hazardous','=',$hz)
  			->groupBy(DB::raw("DATE_FORMAT(date, '%m')"))
  			->orderBy('count', 'DESC')
  			->first();

  		return view('api.best_month', compact('neos', 'hz'));
  	}
}
