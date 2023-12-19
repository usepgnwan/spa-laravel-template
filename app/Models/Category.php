<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['asset'];
    
    public function packet()
    {
        return $this->belongsToMany(Packet::class, 'categories_packets','categori_id','packet_id');
    }
    public function asset()
    {
        return $this->belongsTo(Asset::class, 'asset_id');
    }
}
