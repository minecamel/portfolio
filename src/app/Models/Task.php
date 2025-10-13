<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'registered_at',
        'due_date',
        'memo',
    ];

    protected $casts = [
        'registered_at' => 'datetime',
        'due_date' => 'datetime',
    ];

    // 所有者（1対多側）
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeOverdue($query)
    {
        return $query->where('due_date', '<', now());
    }
}
