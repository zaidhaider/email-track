<?php namespace App;
//use App\CarbonMaster\src\Carbon;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;
use View;

class Tagdetail extends Model 
{

	
	public static function scopeTagdetail()
	{
		
        //$tagdetails = DB::table('tagdetails')->join('tags', 'tagdetails.tag_id', '=', 'tags._id')->where('_date', '>=', Date('today'))->get();

        //$tagdetails = DB::table('tagdetails')->join('tags', 'tagdetails.tag_id', '=', 'tags._id')->where ('_date', '=' , Carbon::now())->get();

		//$tagdetails=DB::table('tagdetails')->join('tags', 'tagdetails.tag_id', '=', 'tags._id')->get();
        //return $tagdetails->where('start_at', '>=', Carbon::now()->startOfDay())
                 //->where('start_at', '<=', Carbon::now()->endOfDay());

		$tagdetails= DB::table('tagdetails')->join('tags', 'tagdetails.tag_id', '=', 'tags._id')->where('_date', '>=', date('Y-m-d').' 00:00:00')->get();
		return $tagdetails;
	}
	public static function selectindividualTagdetail()
	{
		$individualTagdetail = DB::table('tagdetails')->where('tag_name', '=','tag_ver2')->get();
        return $individualTagdetail;
	}
	public static function scopelastweekTagdetail()
	{
		$current_date = date("Y-m-d");
		$prev_date = date("Y-m-d",strtotime('-1 week'));

			$tagdetails= DB::table('tagdetails')->join('tags', 'tagdetails.tag_id', '=', 'tags._id')->whereBetween('_date', array($prev_date,$current_date))->get();
			return $tagdetails;
	}
	public static function scopepreviousweekTagdetail()
	{
		$current_date = date("Y-m-d");
		$prev_date = date("Y-m-d",strtotime('-2 week'));

		$tagdetails= DB::table('tagdetails')->join('tags', 'tagdetails.tag_id', '=', 'tags._id')->whereBetween('_date', array($prev_date,$current_date))->get();
		
		return $tagdetails;
	} 
	public static function scopelastmonthTagdetail()
	{
		$current_date = date("Y-m-d");
		$prev_date = date("Y-m-d",strtotime('-4 week'));

		$tagdetails= DB::table('tagdetails')->join('tags', 'tagdetails.tag_id', '=', 'tags._id')->whereBetween('_date', array($prev_date,$current_date))->get();
		
		return $tagdetails;

	}  


}
