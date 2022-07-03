<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClaimCategory;
use App\Http\Requests\ClaimCategoryRequest;
use Illuminate\Support\Facades\DB;

class ClaimCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = ClaimCategory::get();
        return view('setting.system-administration.claim-category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('setting.system-administration.claim-category.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClaimCategoryRequest $request)
    {
        try {
            $data = [
                'title'         => $request->title
            ];
            DB::beginTransaction();
            $created = ClaimCategory::create($data);
            if ($created){
                DB::commit();
                $message = str_replace(':module','Claim Category',trans('general_messages.create_success_message'));
                flash($message)->success();
                return redirect()->to(route('claim-categories-list'));
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
            $detail = ClaimCategory::where('id','=',$id)->first();
    
            return view('setting.system-administration.claim-category.form',compact('detail'));
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
    public function update(ClaimCategoryRequest $request, $id)
    {
        //
        try {
            $data = [
              'title'       => $request->title,
            ];
            DB::beginTransaction();
            $id = $request->id;
            $updated = ClaimCategory::where('id','=',$id)->update($data);
            if ($updated){
                DB::commit();
                $message = str_replace(':module','Claim Category',trans('general_messages.update_success_message'));
                flash($message)->success();
                return redirect()->to(route('claim-categories-list'));
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
            $delete_type = ClaimCategory::where('id','=',$id)->delete();
            if ($delete_type){
                DB::commit();
                $message = str_replace(':module','Calim Category',trans('general_messages.delete_success_message'));
                flash($message)->success();
                return redirect()->to(route('claim-categories-list'));
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
