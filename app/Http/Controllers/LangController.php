<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App;
  
class LangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return view('lang',[
            'locale' => request()->session()->get('locale'),
        ]);
    }
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function change(Request $request)
    {
        App::setLocale($request->lang);
        $locale = request()->session()->get('locale');
        if(!$locale){
            session()->put('locale','en' );
        }elseif( $locale=='ar'){
            session()->put('locale', 'en');
        }else{
            session()->put('locale', 'ar');
        }
  
        return redirect()->back();
    }
}