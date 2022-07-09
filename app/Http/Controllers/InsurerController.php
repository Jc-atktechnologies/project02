<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;
use App\Http\Requests\InsurerRequest;
use App\Models\Insurer;
use Illuminate\Support\Facades\DB;

class InsurerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $insurers = Insurer::with('branch')->get();
        return view('insurer.index',compact('insurers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branches = Branch::where('status',1)->get();
        return view('insurer.form',compact('branches'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InsurerRequest $request)
    {
        try {
            //  getting data from form and preparing for insert
            $data = [
                'company_name'      => $request->company_name,
                'branch_id'         => $request->branch_id,
                'insurer_address'   => $request->address,
                'insurer_city'      => $request->city,
                'insurer_province'  => $request->state,
                'insurer_postal'    => $request->zipcode,
                'insurer_country'   => $request->country,
                'insurer_phone'     => $request->phone,
                'insurer_fax'       => $request->fax,
                'insurer_email'     => $request->email,
                'insurer_altemail'  => $request->alt_email,
                'insurer_altphone'  => $request->alt_phone,
                'insurer_notes'     => $request->notes
            ];
            DB::beginTransaction();
            $created = Insurer::create($data);
            if ($created){
                DB::commit();
                $message = str_replace(':module','Create Insurer',trans('general_messages.create_success_message'));
                flash($message)->success();
                return redirect()->to(route('insurer-list'));
            } else{
                DB::rollBack();
                flash(trans('general_messages.general_error'))->error();
                return redirect()->back();
            }
        } catch (\Exception $exception){
            flash($exception->getMessage())->error();
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
        try {
            if (empty($id)){
                flash(trans('general_messages.url_change_error'))->error();
                return redirect()->back();
            }
            $insurer = Insurer::with('branch')->where('id','=',$id)->first();
            $view = view('insurer.show',compact('insurer'))->render();
            return response()->json(['view'=>$view]);
        } catch (\Exception $exception){
            flash(trans('general_messages.general_error'))->error();
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            if (empty($id)){
                flash(trans('general_messages.url_change_error'))->error();
                return redirect()->back();
            }
            $detail = Insurer::where('id','=',$id)->first();
    
            $branches = Branch::where('status',1)->get();
            return view('insurer.form',compact('branches','detail'));
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
    public function update(InsurerRequest $request, $id)
    {
        try {
            $data = [
                'company_name'      => $request->company_name,
                'branch_id'         => $request->branch_id,
                'insurer_address'   => $request->address,
                'insurer_city'      => $request->city,
                'insurer_province'  => $request->state,
                'insurer_postal'    => $request->zipcode,
                'insurer_country'   => $request->country,
                'insurer_phone'     => $request->phone,
                'insurer_fax'       => $request->fax,
                'insurer_email'     => $request->email,
                'insurer_altemail'  => $request->alt_email,
                'insurer_altphone'  => $request->alt_phone,
                'insurer_notes'     => $request->notes
            ];
            DB::beginTransaction();
            $id = $request->id;
            $updated = Insurer::where('id','=',$id)->update($data);
            if ($updated){
                DB::commit();
                $message = str_replace(':module','Insurer',trans('general_messages.update_success_message'));
                flash($message)->success();
                return redirect()->to(route('insurer-list'));
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
            $delete = Insurer::where('id','=',$id)->delete();
            if ($delete){
                DB::commit();
                $message = str_replace(':module','Insurer',trans('general_messages.delete_success_message'));
                flash($message)->success();
                return redirect()->to(route('insurer-list'));
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
