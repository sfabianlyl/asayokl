<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;

    class District extends Model
    {
        use SoftDeletes;
        protected $fillable = [
            'name',
        ];
        public function parishes(){
            return $this->hasMany(Entity::class);
        }
        public function senator(){
            return $this->hasOne(User::class);
        }
    }
