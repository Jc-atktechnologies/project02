<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Insurer extends Model
{
    use HasFactory;
    
    //protected $guarded = [];
    protected $fillable =[
                            'company_name',
                            'branch_id',
                            'insurer_address',
                            'insurer_city',
                            'insurer_province',
                            'insurer_postal',
                            'insurer_country',
                            'insurer_phone',
                            'insurer_fax',
                            'insurer_email',
                            'insurer_altphone',
                            'insurer_altemail',
                            'insurer_notes'
                            ];
}