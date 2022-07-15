<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Representative extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function insurer()
    {
        return $this->belongsTo(Insurer::class);
    }

    public function getIsActiveAttribute($val)
    {
        $status='';
        if($val==0)
            $status='Inactive';
        else
            $status='Active';

        return $status;
    }
}
