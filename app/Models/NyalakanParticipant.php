<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;
    class NyalakanParticipant extends Model
    {
        use SoftDeletes;
        protected $fillable = [
            'senator_id',
            'weekend_id',
            'nationality',
            'name',
            "baptismal_name",
            'identification',
            'email',
            'allergy',
            'next_of_kin',
            'contact_next_of_kin',
            'age',
            'parish',
            'bus',
            'accomodation_before',
            'accomodation_after',
            'phone',
            'gender'
        ];

        public function senator()
        {
            return $this->belongsTo(User::class, "senator_id");
        }

        public function weekend(){
            return $this->belongsTo(NyalakanWeekend::class, "weekend_id");
        }
    }
