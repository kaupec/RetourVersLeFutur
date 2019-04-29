<?php
	/**
	 * Created by PhpStorm.
	 * User: julien
	 * Date: 2019-04-29
	 * Time: 10:35
	 */
	require_once 'TimeTravel.php';
	
	$timeTravel = new TimeTravel(new DateTime('1985-12-31'), new DateTime());
	echo $timeTravel->getTravelInfo();
	$date = $timeTravel->findDate(1000000000);
	echo "<br/>" . $date->format('Y-m-d');
	$results = $timeTravel->backToFutureStepByStep(new DateInterval("P1M1W1D"));
	foreach ($results as $result){
		echo  "<br/>". $result;
	}
