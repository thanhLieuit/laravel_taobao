<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\donhang;
use Carbon\Carbon;

class ChartDataController extends Controller
{
    function getAllMonths(){

		$month_array = array();
		$posts_dates = donhang::orderBy( 'created_at', 'ASC' )->pluck( 'created_at' );

		$posts_dates = json_decode( $posts_dates );
		if ( ! empty( $posts_dates ) ) {
			foreach ( $posts_dates as $unformatted_date ) {
				$date = new \DateTime( $unformatted_date );
				$month_no = $date->format( 'm' );
				$month_name = $date->format( 'M' );
				$month_array[ $month_no ] = $month_name;
			}

		}
		return $month_array;
	}

	function getMonthlyPostCount( $month ) {
		$monthly_post_count = donhang::whereMonth( 'created_at', $month )->get()->count();
		return $monthly_post_count;
	}

	function getMonthlyPostData() {

		$monthly_post_count_array = array();
		$month_array = $this->getAllMonths();
		$month_name_array = array();
		if ( ! empty( $month_array ) ) {
			foreach ( $month_array as $month_no => $month_name ){
				$monthly_post_count = $this->getMonthlyPostCount( $month_no );
				array_push( $monthly_post_count_array, $monthly_post_count );
				array_push( $month_name_array, $month_name );
			}
		}

		$max_no = max( $monthly_post_count_array );
		$max = round(( $max_no + 10/2 ) / 10 ) * 50;
		$monthly_post_data_array = array(
			'months' => $month_name_array,
			'post_count_data' => $monthly_post_count_array,
			'max' => $max,
		);

		return $monthly_post_data_array;

    }

    function getAllDays(){

		$day_array = array();
		$posts_dates = donhang::orderBy( 'created_at', 'ASC' )->pluck( 'created_at' );

		$posts_dates = json_decode( $posts_dates );

		if (! empty( $posts_dates ) ) {
			foreach ( $posts_dates as $unformatted_date ) {
				$dt = Carbon::now();
				//$date = new \DateTime( $unformatted_date );
				$day_no = $dt->format( 'd-m' );
				$day_name = $dt->format( 'D-m' );
				$day_array[ $day_no ] = $day_name;
			}
			
		}
		return $day_array;
	}

	function getDaylyPostCount( $day ) {
		$dayly_post_count = donhang::whereDay( 'created_at', $day )->get()->count();

		return $dayly_post_count;
	}

	function getDaylyPostData() {

		$dayly_post_count_array = array();
		$day_array = $this->getAllDays();
		$day_name_array = array();
		if ( ! empty( $day_array ) ) {
			foreach ( $day_array as $day_no => $day_name ){
				$dayly_post_count = $this->getDaylyPostCount( $day_no );
				array_push( $dayly_post_count_array, $dayly_post_count );
				array_push( $day_name_array, $day_name );
			}
		}

		$max_no = max( $dayly_post_count_array );
		$max = round(( $max_no + 10/2 ) / 10 ) * 50;
		$dayly_post_data_array = array(
			'days' => $day_name_array,
			'post_count_data' => $dayly_post_count_array,
			'max' => $max,
		);

		return $dayly_post_data_array;

    }
    function getAllWeeks(){

		$Week_array = array();
		
		$dt = Carbon::now();
		$bayngay = Carbon::now()->subDay(7);
		
		$posts_dates = donhang::whereBetween('created_at', array($bayngay, $dt))->orderBy( 'created_at', 'ASC' )->pluck( 'created_at' );
		
		$posts_dates = json_decode( $posts_dates );

		if (! empty( $posts_dates ) ) {
			foreach ( $posts_dates as $unformatted_date ) {
			
				$date = new \DateTime( $unformatted_date );
				$day_no = $date->format( 'd' );
				$day_name = $date->format( 'd-m' );
				$day_array[ $day_no ] = $day_name;
			}
		}
		return $day_array;
	}

	function getWeeklyPostCount( $week ) {
		$weekly_post_count = donhang::whereWeek( 'created_at', $week )->get()->count();

		return $weekly_post_count;
	}

	function getWeeklyPostData() {

		$weekly_post_count_array = array();
		$week_array = $this->getAllWeeks();
		$week_name_array = array();
		if ( ! empty( $week_array ) ) {
			foreach ( $week_array as $week_no => $week_name ){
				$weekly_post_count = $this->getDaylyPostCount( $week_no );
				array_push( $weekly_post_count_array, $weekly_post_count );
				array_push( $week_name_array, $week_name );
			}
		}

		$max_no = max( $weekly_post_count_array );
		$max = round(( $max_no + 10/2 ) / 10 ) * 50;
		$weekly_post_data_array = array(
			'weeks' => $week_name_array,
			'post_count_data' => $weekly_post_count_array,
			'max' => $max,
		);

		return $weekly_post_data_array;

    }

}
