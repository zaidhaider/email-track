<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use View;

class Taginfo extends Model {

	public static function selectReceiever()
    {
    //		$users = DB::table('authors')->where('id', '=', 2)->get();
    //		$users = DB::table('authors')->orderBy('name','desc')->get();
    	$taginfosReceiever = DB::table('taginfos')->get();
    	
       	return $taginfosReceiever;
       	
	}
	public static function selectSender()
	{
		$taginfosSender = DB::table('taginfos')->where('_tags', '=','tag_ver1')->get();
        //var_dump($taginfosSender); die;
        return $taginfosSender;
	}
	public static function selectSenderV2()
	{
		$taginfosSenderV2 = DB::table('taginfos')->where('_tags', '=','tag_ver2')->get();
        //var_dump($taginfosSender); die;
        return $taginfosSenderV2;
	}
	
	


}
