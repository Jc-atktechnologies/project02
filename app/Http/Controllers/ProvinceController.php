<?php

namespace App\Http\Controllers;

use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProvinceRequest;

class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $provinces_list = Province::get();
        return view('province.index',compact('provinces_list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('province.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\ProvinceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProvinceRequest $request)
    {
        //
        try {
            $province_data = [
                'created_by'    => auth()->user()->id,
                'title'         => $request->title,
                'status'        => $request->status,
                'created_at'    => date('Y-m-d H:i:s')
            ];
            DB::beginTransaction();
            $create_province = Province::insert($province_data);
            if ($create_province){
                DB::commit();
                $message = str_replace(':module','Province',trans('general_messages.create_success_message'));
                flash($message)->success();
                return redirect()->to(route('provinces-list'));
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
     * Display the specified resource.
     *
     * @param  \App\Models\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function show(Province $province)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if (empty($id)){
            flash(trans('general_messages.url_change_error'))->error();
            return redirect()->back();
        }
        $province_data = Province::where('id',$id)->first();
        return view('province.form',compact('province_data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function update(ProvinceRequest $request)
    {
        //
        try {
            $province_data = [
              'title'   => $request->title,
              'status'  => $request->status,
              'updated_at'  => date('Y-m-d H:i:s')
            ];
            $id = $request->id;
            DB::beginTransaction();
            $update_province = Province::where('id','=',$id)->update($province_data);
            if ($update_province){
                DB::commit();
                $message = str_replace(':module','Province',trans('general_messages.create_success_message'));
                flash($message)->success();
                return redirect()->to(route('provinces-list'));
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
     * @param  \App\Models\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            if (empty($id)){
                flash(trans('general_messages.url_change_error'))->error();
                return redirect()->back();
            }
            DB::beginTransaction();
            $delete_province = Province::where('id','=',$id)->delete();
            if ($delete_province){
                DB::commit();
                $message = str_replace(':module','Province',trans('general_messages.delete_success_message'));
                flash($message)->success();
                return redirect()->to(route('provinces-list'));
            } else{
                flash(trans('general_messages.general_error'))->error();
                return redirect()->back();
            }
        } catch (\Exception $exception){
            flash(trans('general_messages.general_error'))->error();
            return redirect()->back();
        }
    }
}
