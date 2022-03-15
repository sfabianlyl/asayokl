<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Registration extends Model
    {
        protected $fillable = [
            'name',
            'age',
            'gender',
            'nationality',
            'email',
            'phone',
            'diocese',
            'parish',
            'payment',
            'vaccination'
        ];

        public function event()
        {
            return $this->belongsTo(Event::class);
        }
    }
