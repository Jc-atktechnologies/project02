<?php

namespace App\Http\Controllers;

use App\Http\Requests\userDetailRequest;
use App\Models\PayoutSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PayoutSettingController extends Controller
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
            $payout_data = [
                'user_id'           => $request->user_id,
                'created_by'        => auth()->id(),
                'disbursement_type' => $request->disbursement_type,
                'amount'            => $request->amount,
                'created_at'        => date('Y-m-d H:i:s')
            ];
            DB::beginTransaction();
            $save_payout    = PayoutSetting::insert($payout_data);
            if ($save_payout){
                DB::commit();
                $message = str_replace(':module','Payout',trans('general_messages.create_success_message'));
                flash($message)->success();
                return redirect()->to(route('team-membership'));
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
     * @param  \App\Models\PayoutSetting  $payoutSetting
     * @return \Illuminate\Http\Response
     */
    public function show(PayoutSetting $payoutSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PayoutSetting  $payoutSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(PayoutSetting $payoutSetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PayoutSetting  $payoutSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PayoutSetting $payoutSetting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PayoutSetting  $payoutSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(PayoutSetting $payoutSetting)
    {
        //
    }
}
