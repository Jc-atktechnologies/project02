<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;
use App\Http\Requests;
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
        $branches_data = Branch::get();
        return view('branch.index',compact('branches_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('branch.form');
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
            $branch_data = [
                'created_by'    => auth()->user()->id,
                'title'         => $request->get('title'),
                'status'        => $request->get('status'),
                'created_at'    => date('Y-m-d H:i:s')
            ];
            $store_data = Branch::insert($branch_data);
            if ($store_data){
                DB::commit();
                $message = str_replace(':module',trans('create_success_message'),true);
                flash($message)->success();
                return redirect()->to(route('branch-list'));
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
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $branch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Branch  $branch
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
            return view('branch.form',compact('branch_data'));
        } catch (\Exception $exception){
            flash(trans('general_error'))->error();
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(Branch $request)
    {
        //
        try {
            $branch_data = [
                'created_by'    => auth()->user()->id,
                'title'         => $request->title,
                'status'        => $request->status,
                'updated_at'    => date('Y-m-d H:i:s')
            ];
            $id = $request->id;
            DB::beginTransaction();
            $is_update = Branch::where('id','=',$id)->update($branch_data);
            if ($is_update){
                DB::commit();
                $message = str_replace(':module',trans('update_success_message'));
                flash($message)->success();
                return redirect()->to(route('branch-list'));
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
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Branch $branch)
    {
        //
    }
}
