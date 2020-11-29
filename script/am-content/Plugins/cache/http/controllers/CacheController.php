<?php 

namespace Amcoders\Plugin\cache\http\controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * 
 */
class CacheController extends controller
{
	
    public function index()
    {
        return view('plugin::cache.index');
    }
}