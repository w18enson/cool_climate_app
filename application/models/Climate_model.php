<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Climate_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

    function convert_array($jsondata) {	
    	
    	// Prepare the variable
    	$i = 1; $x = 0; $y = 0;
    	$results = array();

    	$rawdata = json_decode($jsondata, true);
    	foreach ($rawdata['list'] as $value) {
    		$results['temp'][$i]['date'] = date('Y-m-d', $value['dt']);
    		$results['temp'][$i]['temp'] = $value['temp']['day'];
    		$x = $x + $value['temp']['day'];
    		$results['temp'][$i]['variance'] = $value['temp']['max'] - $value['temp']['min'];
    		$y = $y + $results['temp'][$i]['variance'];
    		$i++;
    	}
    	$results['average'] = round($x/$i,2);
    	$results['variance'] = round($y/$i,2);

    	return $results;

    }

}