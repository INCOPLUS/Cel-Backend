<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$type = $request->header('TYPE');
        $identifiant = Auth::user()->identifiant;
 
        if ($request->hasFile(key: 'file_piece')) {
            $file = $request->file(key: 'file_piece');
            $filename = $file->getClientOriginalName();
            $folder = uniqid() . '-' . now()->timestamp;
            //$file->storeAs('avatars/tmp/'. $folder, $filename);
            $file->storeAs('fichers/'. $identifiant, 'piece-'.$filename);

            //return $folder;
        }
        elseif ($request->hasFile(key: 'file_cv')) {
            $file = $request->file(key: 'file_cv');
            $filename = $file->getClientOriginalName();
            $file->storeAs('fichers/'. $identifiant, 'cv-'.$filename);

            //return $folder;
        }
        elseif ($request->hasFile(key: 'file_diplome')) {
            $file = $request->file(key: 'file_diplome');
            $filename = $file->getClientOriginalName();
            $file->storeAs('fichers/'. $identifiant, 'diplome-'.uniqid().'-'.$filename);

            //return $folder;
        }
        return '';
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
        //
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
