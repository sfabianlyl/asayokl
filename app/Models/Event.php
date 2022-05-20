<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;
    class Event extends Model
    {
        use SoftDeletes;
        protected $fillable = [
            'name',
            'date',
            'time',
            'sheet',
            "url"
        ];

        public function registrations()
        {
            return $this->hasMany(Registration::class);
        }
    }
