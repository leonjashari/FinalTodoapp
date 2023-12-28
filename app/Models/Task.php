<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    protected $guarded = [];
//    protected $fillable = ['title', 'description', 'group', 'urgent','status','group_id'];

    protected $attributes = [
        'status' => self::STATUS_TODO,
    ];

    public const STATUS_TODO = 'Todo';
    public const STATUS_DONE = 'Done';

    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class, 'assigned_user_id'); // Replace 'user_id' with your actual foreign key column name
    }
    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class, 'group_id');
    }

}
