<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historique extends Model
{
    use HasFactory;

    public function personnel(){
        return $this->belongsTo(Personnel::class,'personnelId');
    }
    public function article(){
        return $this->belongsTo(Article::class,'articleId');
    }
}
