<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use File;
use App\Options;
class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $countries= base_path('resources/lang/langlist.json');
     $countries= json_decode(file_get_contents($countries),true);


     $langs=Options::where('key','langlist')->first();

     return view('admin.language.index',compact('countries','langs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {





     $countries=base_path('resources/lang/langlist.json');
     $countries= json_decode(file_get_contents($countries),true);

   if ($request->country) {
      if (file_exists(base_path('resources/lang/'.$request->country.'.json'))) {
       $langs=file_get_contents(base_path('resources/lang/'.$request->country.'.json'));
   }
   else{
       $file = file_get_contents( base_path().'/am-content/Themes/theme.json');
        $themes = json_decode($file, true);
        foreach ($themes as $theme) {
            if ($theme['status'] == 'active') {
               if (file_exists(base_path().'/am-content/Themes/'.$theme['Text Domain'].'/translate.json')) {
                $langs=file_get_contents(base_path().'/am-content/Themes/'.$theme['Text Domain'].'/translate.json');
                break;
               }
               
                
            }
        }

       $default=file_get_contents(base_path('resources/lang/default.json'));
   }

    $langs= $langs  ?? $default;

    $languages= json_decode($langs,true);

    $src=$request->country;
  return view('admin.language.create',compact('countries','languages','src'));

}

return view('admin.language.create',compact('countries'));
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        foreach ($request->key as $key => $row) {
            $arrayname[ $row ] = $request->value[$key];
        }

        $path=base_path('resources/lang/'.$request->lang.'.json');
        File::put($path, json_encode($arrayname,JSON_PRETTY_PRINT));

        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $countries= base_path('resources/lang/langlist.json');
        $countries= json_decode(file_get_contents($countries),true);

        foreach ($countries as $key => $value) {
            if (in_array($value['code'], $request->lang)) {
               $get_value[$value['name']] = $value['code'];
            }
        }


      
        if (!empty($request->status=='active')) {
            $lang=Options::where('key','langlist')->first();
            if (empty($lang)) {
                $lang = new Options;
            }
            $lang->key = "langlist";
            $lang->value = json_encode($get_value);
            $lang->save();
        }

        return response()->json(['Settings Updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
