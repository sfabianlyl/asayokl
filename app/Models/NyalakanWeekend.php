<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;
    class NyalakanWeekend extends Model
    {
        use SoftDeletes;
        protected $fillable = [
            'name',
        ];

        public function participants()
        {
            return $this->hasMany(NyalakanParticipant::class, "weekend_id");
        }
    }
