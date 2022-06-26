<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Province;
use Illuminate\Http\Request;
use App\Http\Requests\CityRequest;
use Illuminate\Support\Facades\DB;
use function Symfony\Component\VarDumper\Dumper\esc;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cities_list = City::get();
        return view('city.index',compact('cities_list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $provinces = Province::where('status','=',1)->orderBy('title','ASC')->get();
        return view('city.form',compact('provinces'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityRequest $request)
    {
        //
        try {
            $city_data = [
                'created_by'    => auth()->user()->id,
                'province_id'   => $request->province_id,
                'title'         => $request->title,
                'status'        => $request->status,
                'created_at'    => date('Y-m-d H:i:s')
            ];
            DB::beginTransaction();
            $create_city = City::insert($city_data);
            if ($create_city){
                DB::commit();
                $message = str_replace(':module','City',trans('general_messages.create_success_message'));
                flash($message)->success();
                return redirect()->to(route('cities-list'));
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
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\City  $city
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
            $city_detail = City::where('id','=',$id)->first();
            $provinces = Province::where('status','=',1)->orderBy('title','ASC')->get();
            return view('city.form',compact('city_detail','provinces'));
        } catch (\Exception $exception){
            flash(trans('general_messages.general_error'))->error();
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(CityRequest $request)
    {
        //
        try {
            $city_data = [
              'province_id' => $request->province_id,
              'title'       => $request->title,
              'status'      => $request->status,
              'updated_at'  => date('Y-m-d H:i:s')
            ];
            DB::beginTransaction();
            $id = $request->id;
            $update_city = City::where('id','=',$id)->update($city_data);
            if ($update_city){
                DB::commit();
                $message = str_replace(':module','City',trans('general_messages.update_success_message'));
                flash($message)->success();
                return redirect()->to(route('cities-list'));
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
     * @param  \App\Models\City  $city
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
            $delete_city = City::where('id','=',$id)->delete();
            if ($delete_city){
                DB::commit();
                $message = str_replace(':module','City',trans('general_messages.delete_success_message'));
                flash($message)->success();
                return redirect()->to(route('cities-list'));
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
