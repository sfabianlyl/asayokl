<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;

    class Entity extends Model
    {
        use SoftDeletes;
        protected $fillable = [
            'category',
            'name',
            'pax',
            "user_id",
        ];

        public function district()
        {
            return $this->belongsTo(District::class);
        }
    }
