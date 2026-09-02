<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Job extends Model
{
    use HasFactory;

   protected $fillable = [

    'position',
    'slug',
    'job_category',
    'job_type',
    'vacancy',
    'experience',
    'posted_date',
    'last_date_to_apply',
    'close_date',
    'gender',
    'salary_from',
    'salary_to',
    'city',
    'state',
    'country',
    'education_level',
    'description',
    'long_description',
    'status',
    'approval_status',
 'allow_application',

];

    protected $casts = [
        'posted_date' => 'date',
        'last_date_to_apply' => 'date',
        'close_date' => 'date',
    ];

    protected static function booted()
    {
        static::creating(function ($job) {
            if (empty($job->slug)) {
                $base = Str::slug(($job->position ?? 'job') . ' ' . ($job->company_name ?? ''));
                $slug = $base ?: Str::slug('job');

                $count = 1;
                while (self::where('slug', $slug)->exists()) {
                    $slug = $base . '-' . $count;
                    $count++;
                }

                $job->slug = $slug;
            }
        });
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
