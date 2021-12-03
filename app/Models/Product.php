<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    protected $connection   = "mysql";
    protected $table        = "products";
    protected $primaryKey   = "id";
    public $incrementing    = true;
    public $timestamps      = true;

    public $guarded = ['deleted_at'];
    protected $fillable = ['created_at'];
    use SoftDeletes;

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
