<?php

/**
 * Student Model
 * This model represents a student in the database.
 * It uses Eloquent ORM for database interactions.
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    // Use HasFactory for creating test instances (optional but recommended)
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * This protects against mass assignment vulnerabilities.
     * Only these fields can be assigned using create() or update() methods.
     * 
     * @var array<string>
     */
    protected $fillable = [
        'name',   // Student's name
        'email',  // Student's email address
        'note',   // Student's grade/note
    ];

    /**
     * The table associated with the model.
     * By default, Laravel uses the plural form of the model name.
     * This is optional since 'students' is the default table name.
     * 
     * @var string
     */
    protected $table = 'students';
}
