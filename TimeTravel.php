<?php
	/**
	 * Created by PhpStorm.
	 * User: julien
	 * Date: 2019-04-29
	 * Time: 10:35
	 */
	
	class TimeTravel
	{
		private $start;
		private $end;
		
		public function __construct(DateTime $start, DateTime $end)
		{
			$this->start = $start;
			$this->end = $end;
		}
		public function getTravelInfo(): string
		{
			$differences = $this->start->diff($this->end);
			return $differences->format('Il y a %Y années, %m mois, %d jours, %H heures, %i minutes et %s secondes de différences');
		}
		public function findDate(int $interval): DateTime
		{
			$timeInterval = new DateInterval('PT' . $interval . 'S' );
			return $this->start->sub($timeInterval);
		}
		public function backToFutureStepByStep($step) : array
		{
			$result = [];
			$periods = new DatePeriod($this->start, $step, $this->end);
			foreach ($periods as $date)
			{
				$result[] = $date->format('M, d, Y, A, H:s');
				//echo "<br/>" . $date->format('Y-m-d');
			}
			return $result;
		}
	}