<?php

namespace App\Traits;
use App\Api;
use DB;
use GuzzleHttp\Client;
use DateTime;

Trait RequestHandler
{
	public function truncate_table($table_name)
	{
		DB::statement("DELETE FROM ".$table_name);
  		DB::statement("ALTER TABLE ".$table_name." AUTO_INCREMENT = 1");
	}

	public function get_data()
	{
		$temp = array();

		$end = date('Y-m-d');
		$start = new DateTime('-3 days');
		$start = $start->format('Y-m-d');

		$url = "https://api.nasa.gov/neo/rest/v1/feed?start_date=".$start."&end_date=".$end."&api_key=N7LkblDsc5aen05FJqBQ8wU4qSdmsftwJagVK7UD";

  		$client = new Client();
  		$response = $client->request('GET', $url);
		$data = json_decode($response->getBody(), true);
		foreach($data['near_earth_objects'] as $d)
		{
			foreach($d as $d2)
			{
				$temp[] = $d2;
				
			}
		}

		$links = $data['links'];

		if(count($links) > 1)
		{
			$new_url = $links['next'];

			$client = new Client();
			$response = $client->request('GET', $new_url);
			$data2 = json_decode($response->getBody(), true);

			foreach($data2['near_earth_objects'][$end] as $d2)
			{
				$temp[] = $d2;
			}

		}
		return $temp;

	}
}

