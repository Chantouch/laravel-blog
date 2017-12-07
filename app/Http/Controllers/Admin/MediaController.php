<?php

namespace App\Http\Controllers\Admin;

use App\Media;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use FroalaEditor_Image;
use Exception;

class MediaController extends Controller
{

    public $view = 'admin.medias.';
    public $route = 'admin.medias.';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $response = FroalaEditor_Image::getList('/storage/uploads/media/');
            return stripslashes(json_encode($response));
        } catch (Exception $e) {
            return http_response_code(404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $fileData = $request->file('image'); //this gets the image data for 1st argument
        // $filename 			= $fileData->getClientOriginalName();
        $filename = $_FILES['image']['name'];
        // $completePath 		= url('/' . $location . '/' . $filename);
        $destinationPath = 'images/';
        $request->file('image')->move($destinationPath, $filename);
        $completePath = url('/' . $destinationPath . $filename);
        return response()->json(['link' => $completePath]);
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $input = $request->all();
        $url = parse_url($input['src']);
        $splitPath = explode("/", $url["path"]);
        $splitPathLength = count($splitPath);
        Media::where('path', 'LIKE', '%' . $splitPath[$splitPathLength - 1] . '%')->delete();
    }
}
