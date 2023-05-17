<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;
    class Registration extends Model
    {
        use SoftDeletes;
        protected $fillable = [
            'event_id',
            'form_id',
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

        public function form()
        {
            return $this->belongsTo(Form::class);
        }
    }
