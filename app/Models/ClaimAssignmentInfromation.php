<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClaimAssignmentInfromation extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function claimcategory()
    {
        return $this->belongsTo(ClaimCategory::class,'calim_ctegory_id');
    }

    public function assignto()
    {
        return $this->belongsTo(User::class,'assign_to');
    }
    public function sharewith()
    {
        return $this->belongsTo(User::class,'share_with');
    }
}
