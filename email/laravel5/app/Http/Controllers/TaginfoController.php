<?php namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Taginfo;
use View;
use DB;
class TaginfoController extends Controller
{
    
    public function dbTesting()
    {
        $taginfos = DB::table('taginfos')->get();
        //$results = DB::select('select * from tag_infos', array(1));
        
        foreach ($taginfos as $taginfo) {
            var_dump($taginfo->_events);
        }
    }
    public function extractingInfos()
    {
    	$taginfosReceiever = Taginfo::selectReceiever();
        //return view('table', ['name' => 'James']);
        //return View::make('tag_info',$tag_infos);
        return view('table', ['taginfosReceiever'=>$taginfosReceiever]);
    }
    public function extractingRates()
    {
        $taginfosSender = Taginfo::selectSender();
        //return view('table', ['name' => 'James']);
        //return View::make('tag_info',$tag_infos);
        //var_dump($taginfosSender);die;
        return view('tableSendersV1', ['taginfosSender'=>$taginfosSender]);
    }
    public function extractingRatesV2()
    {
        $taginfosSenderV2 = Taginfo::selectSenderV2();
        //return view('table', ['name' => 'James']);
        //return View::make('tag_info',$tag_infos);
        //var_dump($taginfosSender);die;
        return view('tableSendersV2', ['taginfosSenderV2'=>$taginfosSenderV2]);
    }

/*    public function searchUser() 
    {
        $search = Input::get('search');
        $searchTerms = explode(' ', $search);
        $query = User::query();
        $fields = array('first_name', 'last_name', 'email');
        foreach ($searchTerms as $term)
        {
            foreach ($fields as $field)
            {
                $query->orWhere($field, 'LIKE', '%'. $term .'%');
            }
        }
        
        $results = $query->get();
        return view('search',['results'=>$results])
    }
    */
 
}