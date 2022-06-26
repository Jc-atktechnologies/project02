<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Claims;
use Illuminate\Support\Facades\DB;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $claims_data = Claims::get();
        return view('claims.index',compact('claims_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('claims.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        try {
            DB::beginTransaction();
            $claims_data = [
                'created_by'    => auth()->user()->id,
                'claimnumber'         => $request->get('claimnumber'),
                'created_at'    => date('Y-m-d H:i:s')
            ];
            $store_data = Branch::insert($claims_data);
            if ($store_data){
                DB::commit();
                $message = str_replace(':module',trans('create_success_message'),true);
                flash($message)->success();
                return redirect()->to(route('claims-list'));
            } else{
                DB::rollBack();
                flash(trans('general_error'))->error();
                return redirect()->back();
            }
        } catch (\Exception $exception){
            flash(trans('general_error'))->error();
            return redirect('home');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Claims  $claims
     * @return \Illuminate\Http\Response
     */
    public function show(Claims $claims)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Claims  $claims
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        try {
            if (empty($id)){
                flash(trans('url_change_error'))->error();
                return redirect()->back();
            }
            $branch_data = Branch::where('id',$id)->first();
            return view('claims.form',compact('claims_data'));
        } catch (\Exception $exception){
            flash(trans('general_error'))->error();
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Claims  $claims
     * @return \Illuminate\Http\Response
     */
    public function update(Claims $request)
    {
        //
        try {
            $claims_data = [
                'created_by'    => auth()->user()->id,
                'updated_at'    => date('Y-m-d H:i:s')
            ];
            $id = $request->id;
            DB::beginTransaction();
            $is_update = Claims::where('id','=',$id)->update($claims_data);
            if ($is_update){
                DB::commit();
                $message = str_replace(':module',trans('update_success_message'));
                flash($message)->success();
                return redirect()->to(route('claims-list'));
            } else{
                DB::rollBack();
                flash(trans('general_error'))->error();
                return redirect()->back();
            }
        } catch (\Exception $exception){
            flash(trans('general_error'))->error();
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Claims  $claims
     * @return \Illuminate\Http\Response
     */
    public function destroy(Claims $claims)
    {
        //
    }
}
