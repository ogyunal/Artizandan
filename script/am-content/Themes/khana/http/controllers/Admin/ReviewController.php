<?php 

namespace Amcoders\Theme\khana\http\controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comment;
/**
 * 
 */
class ReviewController extends controller
{
	public function index()
	{
		$reviews = Comment::orderBy('id','DESC')->with('comment_meta')->paginate(20);
		return view('theme::admin.review.index',compact('reviews'));
	}

	public function delete($id)
	{
		Comment::find($id)->delete();

		return back();
	}
}