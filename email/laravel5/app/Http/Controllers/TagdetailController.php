<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Tagdetail;
use View;
use DB;
class TagdetailController extends Controller
{
    

    public function extractingTagdetails()
    {
    	$tagdetails = Tagdetail::scopeTagdetail();
        //return view('table', ['name' => 'James']);
        //return View::make('tag_info',$tag_infos);
        return view('tableTagdetail', ['tagdetails'=>$tagdetails]);
    }
    
    public function extractingLastweekTagdetails()
    {
        $tagdetails = Tagdetail::scopelastweekTagdetail();
        return view('tablelastweekTagdetail', ['tagdetails'=>$tagdetails]);
    }

    public function extractingPreviousweekTagdetails()
    {
        $tagdetails = Tagdetail::scopepreviousweekTagdetail();
        return view('tablepreviousweekTagdetail', ['tagdetails'=>$tagdetails]);
    }
    public function extractingLastmonthTagdetails()
    {
        $tagdetails = Tagdetail::scopelastmonthTagdetail();
        return view('tablelastmonthTagdetail', ['tagdetails'=>$tagdetails]);
    }


/*    public function extractingindividualTagdetails()
    {
        $individualTagdetail = Tagdetail::selectindividualTagdetail();
        //return view('table', ['name' => 'James']);
        //return View::make('tag_info',$tag_infos);
        return view('tableindividualTagdetail', ['individualTagdetail'=>$individualTagdetail]);
    }
*/
}