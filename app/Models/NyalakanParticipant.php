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
            'payment_acknowledgement',
            'age',
            'parish',
            'bus',
            'accomodation_before',
            'accomodation_after'
        ];

        public function senator()
        {
            return $this->hasOne(User::class);
        }

        public function weekend(){
            return $this->hasOne(NyalakanWeekend::class);
        }
    }
