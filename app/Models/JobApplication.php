<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;
            protected $table ='job_applications';

//     protected $fillable = [
//     'job_id','full_name','email','phone','city','cv','message','status'
// ];
protected $fillable = [
        'job_id',
        'full_name', // <-- Yeh add hona lazmi hai
        'email',
        'phone',
        'city',
        'cv',
        'message',
        'status'
    ];
public function job()
{
    return $this->belongsTo(Job::class);
}

}
