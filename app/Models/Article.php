<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    public function marque(){
        return $this->belongsTo(Marque::class,'marqueId');
    }
    public function type(){
        return $this->belongsTo(Type::class,'typeId');
    }
    public function commande(){
        return $this->belongsTo(Commande::class,'commandeId');
    }

    public function historique(){
        return $this->hasMany(Historique::class,'articleId');
    }
}


