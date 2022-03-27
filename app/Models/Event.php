<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Event extends Model
    {
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
