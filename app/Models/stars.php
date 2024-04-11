<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stars extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function title()
    {
        return $this->belongsTo(Title::class);
    }
}
