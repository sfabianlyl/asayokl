<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;
    class Content extends Model
    {
        use SoftDeletes;
        protected $fillable = [
            'title',
            'keyword',
            'content',
            "notes",
            "user_id"
        ];

        
    }
