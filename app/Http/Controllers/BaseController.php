<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Torann\LaravelMetaTags\Facades\MetaTag;

class BaseController extends Controller
{

    /**
     * BaseController constructor.
     */
    public function __construct()
    {
        MetaTag::set('description', 'Blog Wes Anderson bicycle rights, occupy Shoreditch gentrify keffiyeh.');
        MetaTag::set('image', asset('storage/images/default-share-image.png'));
    }
}
