<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'user_id',
        'image',
        'category',
        'description',
        'view_count',
    ];

    // Metode untuk menambah jumlah view
    public function incrementViewCount()
    {
        $this->view_count++;
        return $this->save();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function visitorLogs()
    {
        return $this->hasMany(VisitorLog::class);
    }
}
