<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class LogActivity extends Model
{
    protected $table = 'activity_logs';
    
    protected $fillable = [
        'user_id', 'aksi', 'deskripsi', 'ip'
    ];

    /**
     * Add a new log entry
     *
     * @param string $subject
     * @param string $description
     * @return LogActivity
     */
    public static function add($subject, $description = null)
    {
        return static::create([
            'user_id' => Auth::id(),
            'aksi' => $subject,
            'deskripsi' => $description,
            'ip' => Request::ip(),
        ]);
    }

    /**
     * Get the user that owns the log entry.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
