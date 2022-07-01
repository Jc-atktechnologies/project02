<?php

namespace App\Http\Controllers;

use App\Models\LossType;
use Illuminate\Http\Request;
use App\Http\Requests\LossTypeRequest;
use Illuminate\Support\Facades\DB;
class LossTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = LossType::get();
        return view('setting.system-administration.loss-type.index',compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('setting.system-administration.loss-type.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LossTypeRequest $request)
    {
        try {
            $data = [
                'title'         => $request->title
            ];
            DB::beginTransaction();
            $created = LossType::create($data);
            if ($created){
                DB::commit();
                $message = str_replace(':module','Loss Type',trans('general_messages.create_success_message'));
                flash($message)->success();
                return redirect()->to(route('loss-types'));
            } else{
                DB::rollBack();
                flash(trans('general_messages.general_error'))->error();
                return redirect()->back();
            }
        } catch (\Exception $exception){
            flash(trans('general_messages.delete_success_message'))->error();
            return redirect()->back();
        }
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
        try {
            if (empty($id)){
                flash(trans('general_messages.url_change_error'))->error();
                return redirect()->back();
            }
            $detail = LossType::where('id','=',$id)->first();
    
            return view('setting.system-administration.loss-type.form',compact('detail'));
        } catch (\Exception $exception){
            flash(trans('general_messages.general_error'))->error();
            return redirect()->back();
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LossTypeRequest $request)
    {
        //
        try {
            $data = [
              'title'       => $request->title,
            ];
            DB::beginTransaction();
            $id = $request->id;
            $updated = LossType::where('id','=',$id)->update($data);
            if ($updated){
                DB::commit();
                $message = str_replace(':module','Loss Type',trans('general_messages.update_success_message'));
                flash($message)->success();
                return redirect()->to(route('loss-types'));
            } else{
                DB::rollBack();
                flash(trans('general_messages.general_error'))->error();
                return redirect()->back();
            }
        } catch (\Exception $exception){
            flash(trans('general_messages.general_error'))->error();
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            if (empty($id)){
                flash(trans('general_messages.url_change_error'))->error();
                return redirect()->back();
            }
            $delete_type = LossType::where('id','=',$id)->delete();
            if ($delete_type){
                DB::commit();
                $message = str_replace(':module','Loss Type',trans('general_messages.delete_success_message'));
                flash($message)->success();
                return redirect()->to(route('loss-types'));
            }else{
                DB::rollBack();
                flash(trans('general_messages.general_error'))->error();
                return redirect()->back();
            }
        } catch (\Exception $exception){
            flash(trans('general_messages.general_error'))->error();
            return redirect()->back();
        }
    }
}
