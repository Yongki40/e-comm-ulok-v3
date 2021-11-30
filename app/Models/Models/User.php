<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use HasFactory;
    protected $connection   = "mysql";
    protected $table        = "users";
    protected $primaryKey   = "id";
    public $incrementing    = true;
    public $timestamps      = true;

    public $guarded = ['jenis_user', 'deleted_at'];
    use SoftDeletes;
}
