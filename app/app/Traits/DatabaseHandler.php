<?php 

namespace App\Traits;

use App\Api;
use DateTime;

Trait DatabaseHandler
{
	public function insert_into_api($data)
	{
		foreach($data as $d)
  		{
  			if(isset($d['close_approach_data'][0]['relative_velocity']['kilometers_per_hour']))
  			{
  				
  				$is_hazardous = 0;
  				if($d['is_potentially_hazardous_asteroid'] == true)
  				{
  					$is_hazardous = 1;
  				}

  				$speed = $d['close_approach_data'][0]['relative_velocity']['kilometers_per_hour'];
  				$date = date_format(date_create($d['close_approach_data'][0]['close_approach_date']),"Y-m-d");
  				if(count($d['close_approach_data']) > 1)
  				{
  					for($i = 0; $i < count($d['close_approach_data']); $i++)
  					{
  						$speed_new = $d['close_approach_data'][$i]['relative_velocity']['kilometers_per_hour'];
  						if($speed_new > $speed)
  						{
  							$speed = $speed_new;
  						}

  						$date_new = date_format(date_create($d['close_approach_data'][$i]['close_approach_date']),"Y-m-d");
  						if($date_new > $date)
  						{
  							$date = $date_new;
  						}
  					}
  				}

  				$api = new Api;
				$api->date = $date;  				
  				$api->reference = $d['neo_reference_id'];
  				$api->name = $d['name'];
				$api->speed = $speed;
  				$api->is_hazardous = $is_hazardous;
	
  				$api->save();
  			}
  		}
	}
}