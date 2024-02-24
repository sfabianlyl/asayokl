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
            $this->hasMany(Entity::class);
        }
        public function senator(){
            $this->hasOne(User::class);
        }
    }
