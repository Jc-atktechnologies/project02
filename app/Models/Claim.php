<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Claim extends Model
{
    use HasFactory;

    protected $guarded =[];

    public static function GetClaimNumber(){

        $statement = DB::select("SHOW TABLE STATUS LIKE 'claims'");
        $nextId = $statement[0]->Auto_increment;
        return $nextId;
    }

    public function getAssingmentMethodAttribute($val){
        $assignment_method ='';
        if($val==1){
            $assignment_method = 'Direct Assign';
        }elseif($val==2){
            $assignment_method = 'Team Assign';
        }elseif($val==3){
            $assignment_method = 'Leave Unassigned';
        }else{
            $assignment_method = 'No Method selected';
        }

        return $assignment_method;
    }

    public function insurer(){

        return $this->belongsTo(Insurer::class);
    }

    public function insured(){
        return $this->hasOne(ClaimInsuredDetail::class);
    }

    public function lossdetail(){
        return $this->hasOne(ClaimLossDetail::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class,'created_by');
    }

    public function assignmentmethod(){

        return $this->hasOne(ClaimAssignmentInfromation::class);
    }
}
