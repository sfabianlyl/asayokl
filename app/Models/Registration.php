<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Registration extends Model
    {
        protected $fillable = [
            'event_id',
            'name',
            'age',
            'gender',
            'nationality',
            'email',
            'phone',
            'diocese',
            'parish',
            'payment',
            'vaccination',
            "other_details"
        ];

        public function event()
        {
            return $this->belongsTo(Event::class);
        }
    }
