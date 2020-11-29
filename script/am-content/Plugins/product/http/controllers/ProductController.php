<?php 

namespace Amcoders\Plugin\product\http\controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Terms;
class ProductController extends controller
{
	

	 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        if (!empty($request->src)) {
           $src=$request->src;
           $posts=Terms::with('preview','price','user')->withCount('order')->where('type',6)->where($request->type,$request->src)->latest()->paginate(30);
           return view('plugin::admin.products',compact('posts','src'));  
        }
        $posts=Terms::with('preview','price','user')->withCount('order')->where('type',6)->latest()->paginate(30);
        return view('plugin::admin.products',compact('posts'));
    }

   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
         if ($request->status=='delete') {
             if ($request->ids) {
                foreach ($request->ids as $id) {
                    Terms::destroy($id);
                }
             }
        }
       
        
        return response()->json('Product Removed');
       
    }
}