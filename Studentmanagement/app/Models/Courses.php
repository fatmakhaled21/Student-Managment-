<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    protected $table = 'Courses';
    protected $primarykey = 'id';
    protected $fillable = ['name','syllabus','duration'];
    use HasFactory;


    public function duration()
    {
        return $this->duration. "Monthes";
    }
}
