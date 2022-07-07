<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;
use App\Models\ClaimCategory;
use App\Models\Claim;
use App\Models\Insurer;
use App\Models\LossType;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ClaimsRequest;
use App\Models\ClaimAssignmentInfromation;
use App\Models\ClaimInsuredDetail;
use App\Models\ClaimLossDetail;

class ClaimsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $claim_data = Claim::with('insurer','insured','lossdetail')->get();
        return view('claims.index',compact('claim_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $insurers = Insurer::get();
        $claim_categories = ClaimCategory::get();
        $loss_types = LossType::get();
        $assignment_methods = [
            ['id'=>1,'title'=>'Direct Assign'],
            ['id'=>2,'title'=>'Team Assign'],
            ['id'=>3,'title'=>'Leave Unassigned']
        ];
        $share_users = User::get();
        $claim_number = Claim::GetClaimNumber();
        return view('claims.form',compact('claim_categories','loss_types','insurers','assignment_methods','share_users','claim_number'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClaimsRequest $request)
    {
        
        //
        try {
            DB::beginTransaction();
            // adding main info in claims table
            $claims_data = [
                'created_by'           => auth()->user()->id,
                'claim_number'         => $request->claim_number,
                'policy_number'        => $request->policy_number,
                'insurer_id'           => $request->insurer_id,
                'representative_id'    => $request->representative_id,
                'assingment_method'    => $request->assignment_method,
            ];
            $store_data = Claim::create($claims_data);
            // adding insured detail in claim_insured_details table
            $claim_insured_details = [
                'name'          => $request->insured,
                'state'         => $request->state,
                'address'       => $request->address,
                'country'       => $request->country,
                'city'          => $request->city,
                'postal_code'   => $request->zip_code,
                'email'         => $request->email,
                'cell'          => $request->phone,
                'phone'         => $request->cell,
                'claim_id'     => $store_data->id,
            ];

            $store_claim_insured_details = ClaimInsuredDetail::create($claim_insured_details);
            // adding loss detail in claim_loss_details table

            $claim_loss_details = [
                'loss_date'         => $request->date_of_loss,
                'loss_time'         => $request->time_of_loss,
                'loss_type_id'      => $request->loss_type,
                'reported_date'     => $request->reported_date,
                'loss_location'     => $request->loss_location,
                'loss_description'  => $request->loss_description,
                'country'           => $request->loss_country,
                'additional_notes'  => $request->additional_notes,
                'claim_id'          => $store_data->id,
            ];

            $store_claim_loss_details= ClaimLossDetail::create($claim_loss_details);

            // adding assignemnt information in claim_assignment_infromations table

            $claim_assignment_information = [
                'calim_ctegory_id'   => $request->claim_category,
                'share_with'         => $request->share_with,
                'claim_id'           => $store_data->id,
            ];

            if($request->has('assign_to')){
                $claim_assignment_information['assign_to']= $request->assign_to;
            }

            $store_claim_assignment_information= ClaimAssignmentInfromation::create($claim_assignment_information);

            if ($store_data && $store_claim_insured_details && $store_claim_loss_details && $store_claim_assignment_information){
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
            print_r($exception->getMessage());
            exit;
            flash(trans('general_error'))->error();
            return redirect('home');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Claim  $claims
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
            $claim = Claim::with('insurer','user','insured','assignmentmethod')->where('id',$id)->first();
            $view = view('claims.ajax.claim-detail',compact('claim'))->render();

            return response()->json(['view'=>$view]);
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Claim  $claims
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
     * @param  \App\Models\Claim  $claims
     * @return \Illuminate\Http\Response
     */
    public function update(Claim $request)
    {
        //
        try {
            $claims_data = [
                'created_by'    => auth()->user()->id,
                'updated_at'    => date('Y-m-d H:i:s')
            ];
            $id = $request->id;
            DB::beginTransaction();
            $is_update = Claim::where('id','=',$id)->update($claims_data);
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
    public function destroy($id)
    {
        try {
            if (empty($id)){
                flash(trans('general_messages.url_change_error'))->error();
                return redirect()->back();
            }
            DB::beginTransaction();
            
            $delete_insured = ClaimInsuredDetail::where('claim_id','=',$id)->delete();
            $delete_loss_detail = ClaimLossDetail::where('claim_id','=',$id)->delete();
            $delete_assignment_information = ClaimAssignmentInfromation::where('claim_id','=',$id)->delete();
            $delete = Claim::where('id','=',$id)->delete();
            if ($delete_insured && $delete_loss_detail && $delete_assignment_information && $delete ){
                DB::commit();
                $message = str_replace(':module','Claims',trans('general_messages.delete_success_message'));
                flash($message)->success();
                return redirect()->to(route('claims-list'));
            }else{
                DB::rollBack();
                flash(trans('general_messages.general_error'))->error();
                return redirect()->back();
            }
        } catch (\Exception $exception){
            flash(trans('general_messages.general_error'))->error();
            echo $exception->getMessage();
            exit;
            return redirect()->back();
        }
    }


   
    // getting user dropdown for assign to user in add claim form
    public function get_assign_to_users($type){
        
       if($type==1){
            $users = User::get();
            $view = view('claims.ajax.assign_to',compact('users'))->render();
            $status =1;
       }else{
            $view='';
            $status=0;
       }
        
        return response()->json(['form_field'=>$view,'status'=>$status]);
    }

    
}
