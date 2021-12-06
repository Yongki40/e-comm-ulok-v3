<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Th_Jual extends Model
{
    use HasFactory;
    protected $connection   = "mysql";
    protected $table        = "th_jual";
    protected $primaryKey   = "id";
    public $incrementing    = true;
    public $timestamps      = true;

    public $guarded = ['deleted_at'];
    protected $fillable = ['created_at'];
    use SoftDeletes;
}
