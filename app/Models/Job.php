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
            Tag::class,      
            table:'job_tags',      
            foreignPivotKey:'job_listings_id', 
            relatedPivotKey:'tag_id'        
        );
    }
}
