<?php

namespace App\Http\Controllers;

use App\Models\Representative;
use Illuminate\Http\Request;
use App\Http\Requests\RepresentativeRequest;
use Illuminate\Support\Facades\DB;

class RepresentativeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id=null)
    {
        try{
            if(empty($id) || $id==null){
                flash(trans('general_messages.url_change_error'))->error();
                return redirect()->back();
            }
            
            $representatives = Representative::with('insurer')->get();
            return view('insurer.representative.index',compact('representatives','id'));

        }
        catch(\Exception $exception){

            flash(trans('general_messages.general_error'))->error();
            return redirect()-back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        try{
            if(empty($id) || $id==null){
                flash(trans('general_messages.url_change_error'))->error();
                return redirect()->back();
            }
           $insurer_id = $id;
            return view('insurer.representative.form',compact('insurer_id'));

        }
        catch(\Exception $exception){

            flash(trans('general_messages.general_error'))->error();
            return redirect()-back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RepresentativeRequest $request)
    {
        try {
            $data = [
                'name'          => $request->name,
                'title'         => $request->title,
                'phone'         => $request->phone,
                'cell'          => $request->cell,
                'email'         => $request->email,
                'is_active'     => $request->status,
                'notes'         => $request->notes,
                'insurer_id'    => $request->insurer_id
            ];
            DB::beginTransaction();
            $created = Representative::create($data);
            if ($created){
                DB::commit();
                $message = str_replace(':module','Representative',trans('general_messages.create_success_message'));
                flash($message)->success();
                return redirect()->to(route('representative-list',['id',$request->insurer_id]));
            } else{
                DB::rollBack();
                flash(trans('general_messages.general_error'))->error();
                return redirect()->back();
            }
        } catch (\Exception $exception){
            print_r($exception);
            exit;
            flash(trans('general_messages.general_error'))->error();
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
        try {
            if (empty($id)){
                flash(trans('general_messages.url_change_error'))->error();
                return redirect()->back();
            }
            $detail = Representative::where('id','=',$id)->first();
            return view('insurer.representative.form',compact('detail'));
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
    public function update(RepresentativeRequest $request, $id)
    {
        try {
            $data = [
                'name'          => $request->name,
                'title'         => $request->title,
                'phone'         => $request->phone,
                'cell'          => $request->cell,
                'email'         => $request->email,
                'is_active'     => $request->status,
                'notes'         => $request->notes,
                'insurer_id'    => $request->insurer_id
            ];
          
            DB::beginTransaction();
            
            $updated = Representative::where('id','=',$id)->update($data);
            if ($updated){
                DB::commit();
                $message = str_replace(':module','Representative',trans('general_messages.update_success_message'));
                flash($message)->success();
                return redirect()->to(route('representative-list',['id',$request->insurer_id]));
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
            $representative = Representative::find($id);
            $insurer_id = $representative->insurer_id;
            $delete = $representative->delete();
            if ($delete){
                DB::commit();
                $message = str_replace(':module','Representative',trans('general_messages.delete_success_message'));
                flash($message)->success();
                return redirect()->to(route('representative-list',['id',$insurer_id]));
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
