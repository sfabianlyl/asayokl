<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;
    class Form extends Model
    {
        use SoftDeletes;
        protected $fillable = [
            'title',
            'url',
            'fields',
            'google_sheet_url',
            "google_sheet_sheet_name",
            "body",
            "email_to",
            "email_applicant",
            "response",
            "email_body",
            "status",
            'age_range',
            "background_color",
            "text_color",
            "link_color",
            "payment_amount",
            "button_color",
            "tshirt_sizes",
            "deposit"
        ];

        public function registrations()
        {
            return $this->hasMany(Registration::class);
        }
    }
