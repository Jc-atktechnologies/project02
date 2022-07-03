<?php

namespace App\Http\Controllers;

use App\Http\Requests\userDetailRequest;
use App\Models\Attatchment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class AttachmentController extends Controller
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
    public function store(userDetailRequest $request)
    {
        //
        try {
            $user_id = $request->user_id;
            $save_data = [
                'user_id'       => $user_id,
                'created_by'    => auth()->id(),
                'added_on'      => date('Y-m-d'),
                'description'   => $request->description,
                'created_at'    => date('Y-m-d H:i:s')
            ];
            if($request->file('attachment')){
                $directory_path = public_path().'/'.$user_id;
                if (!file_exists($directory_path)){
                    mkdir($directory_path,0755, true);
                }
                $file= $request->file('attachment');
                $filename= date('YmdHi').$file->getClientOriginalName();
                $file-> move($directory_path, $filename);
                $save_data['file_name']= $filename;
            }
            DB::beginTransaction();
            $save_attachment = Attatchment::insert($save_data);
            if ($save_attachment){
                $message = str_replace(':module','Attachment',trans('general_messages.create_success_message'));
                flash($message)->success();
                DB::commit();
                if (Route::currentRouteName() == 'update-attachment'){
                    return redirect()->to(route('change-management-notes',['id'=>$user_id]));
                } else{
                    return redirect()->to(route('management-notes'));
                }
            } else{
                DB::rollBack();
                flash(trans('general_messages.general_error'));
                return redirect()->back();
            }
        } catch (\Exception $exception){
            DB::rollBack();
            flash(trans('general_messages.general_error'));
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attatchment  $attatchment
     * @return \Illuminate\Http\Response
     */
    public function show(Attatchment $attatchment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attatchment  $attatchment
     * @return \Illuminate\Http\Response
     */
    public function edit(Attatchment $attatchment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attatchment  $attatchment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attatchment $attatchment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attatchment  $attatchment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attatchment $attatchment)
    {
        //
    }
}
