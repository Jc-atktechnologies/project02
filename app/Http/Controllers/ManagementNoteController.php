<?php

namespace App\Http\Controllers;

use App\Http\Requests\userDetailRequest;
use App\Models\ManagementNote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManagementNoteController extends Controller
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
                'note'          => $request->get('note'),
                'is_urgent'     => $request->get('is_urgent',0),
                'created_at'    => date('Y-m-d H:i:s')
            ];
            DB::beginTransaction();
            $save_note = ManagementNote::insert($save_data);
            if ($save_note){
                DB::commit();
                $message = str_replace(':module','Management Note',trans('general_messages.create_success_message'));
                flash($message)->success();
                return redirect()->to(route('users-list'));
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
     * @param  \App\Models\ManagementNote  $managementNote
     * @return \Illuminate\Http\Response
     */
    public function show(ManagementNote $managementNote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ManagementNote  $managementNote
     * @return \Illuminate\Http\Response
     */
    public function edit(ManagementNote $managementNote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ManagementNote  $managementNote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ManagementNote $managementNote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ManagementNote  $managementNote
     * @return \Illuminate\Http\Response
     */
    public function destroy(ManagementNote $managementNote)
    {
        //
    }
}
