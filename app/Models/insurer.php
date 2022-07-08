<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Insurer extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded =[];
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function representative(){

        return $this->hasOne(Representative::class);
    }
}