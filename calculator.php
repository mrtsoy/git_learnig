<?php

$vklad =100000;
$month = 36;

$refill_total = '-';
$year = $month / 12;
$refill_date = date("d.m.Y",strtotime('2018-01-29'));
$percent = 13;
$refill_var = '';
	
	$deposit_date_start = $refill_date;

	$period_date_end = $month;
	$deposit_date_end = $this->add_date($deposit_date_start, $month)->format('d.m.Y');
	$deposit_date_year_end = date("Y", strtotime($deposit_date_end));
	
	$days = floor((strtotime($deposit_date_end) - strtotime($refill_date)) / (60 * 60 * 24));
	
	$month_days = 0;
	if($month < 12){
		//без капитализации
		$profit_output = $vklad * ($percent/100) / 365 * $days;
	}
	elseif($month >= 12 && $month <= 24){
		//c капитализацией
		$profit_output = ($vklad + ($vklad * ($percent/100))) * ($percent/100) / 365 * ($days - 365) + ($vklad * ($percent/100));
		
	}
	elseif($month > 24 && $month <= 36){
		//c капитализацией
		$month_reminder = $month % 12;
		
		if($month_reminder == 0){
			$days_reminder = 366/365;
		}else{
			$reminder_date = $this->add_date($refill_date, ($month - $month_reminder))->format('d.m.Y');
			$days_reminder = floor((strtotime($deposit_date_end) - strtotime($reminder_date)) / (60 * 60 * 24)) / 365;
		}
		$profit_output = $vklad * ($percent / 100) + ($vklad + $vklad * ($percent / 100) )* ($percent / 100) + ($vklad + ($vklad + $vklad * ($percent / 100) ) * ($percent / 100) + ($vklad * ($percent / 100) ))* ($percent/100) * $days_reminder;
		
	}
	// var_dump($days_reminder);
	var_dump($profit_output);
?>