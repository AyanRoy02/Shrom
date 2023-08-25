<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;
    protected $table= 'order_details';
    protected $guarded = [];

    public function jobPost(){
        return $this->belongsTo(JobPost::class,'job_id','id');
    }
    public function user(){
        return $this->belongsTo(User::class,'client_id','id');
    }
    public function order(){
        return $this->hasOne(Order::class,'id','order_id')->where('status', '=', 'paid');
    }
}
