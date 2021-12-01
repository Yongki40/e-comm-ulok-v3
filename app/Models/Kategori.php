<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kategori extends Model
{
    use HasFactory;
    protected $connection   = "mysql";
    protected $table        = "kategories";
    protected $primaryKey   = "id";
    public $incrementing    = true;
    public $timestamps      = true;

    public $guarded = ['deleted_at'];
    use SoftDeletes;
}
