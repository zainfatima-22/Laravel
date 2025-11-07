<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model{
    use HasFactory;
    protected $table = 'job_listings' ;
    protected $primaryKey = 'id';
    protected $fillable = ['Title', 'Salary', 'employer_id', 'status', 'published_at',]; 
    protected $guarded = [];

    public function employer(){
        return $this->belongsTo(Employer::class, 'employer_id');
    }
    public function tags()
    {
        return $this->belongsToMany(
            Tag::class,      // 1. Related Model
            table:'job_tags',      // 2. Pivot Table Name
            foreignPivotKey:'job_listings_id', // 3. Foreign Pivot Key (the Job's ID in the pivot table)
            relatedPivotKey:'tag_id'         // 4. Related Pivot Key (the Tag's ID in the pivot table)
        );
    }
}
