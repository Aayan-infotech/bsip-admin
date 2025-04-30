<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $fillable = [
        'employee_id',
        'staff_type',
        'category_id',
        'sub_category_id',
        'name',
        'name_hin',
        'current_position',
        'hin_current_position',
        'previous_position',
        'hin_previous_position',
        'educational_qualification',
        'hin_educational_qualification',
        'no_of_publications',
        'total_citations',
        'research_interests',
        'telephone_extension',
        'personal_telephone',
        'mobile_no',
        'alternate_mobile_no',
        'email',
        'alternate_email',
        'profile_picture',
        'cv',
        'joining_date',
        'exit_date',
        'superannuation_date',
        'status',
        'archived_status',
    ];

    public function category()
    {
        return $this->belongsTo(Staff_Category::class, 'category_id');
    }

    public function subCategory()
    {
        return $this->belongsTo(StaffSubCategory::class, 'sub_category_id');
    }

    public function getCvAttribute($value)
    {
        return $value ? asset('storage/' . $value) : null;
    }
    public function getProfilePictureAttribute($value)
    {
        return $value ? asset('storage/' . $value) : null;
    }

    public function internationalCollaborations()
    {
        return $this->hasMany(InternationalCollaboration::class, 'staff_id');
    }

    public function professionalServices()
    {
        return $this->hasMany(ProfessionalService::class, 'staff_id');
    }

    public function fellowships()
    {
        return $this->hasMany(Fellowship::class, 'staff_id');
    }
    public function awardsHonors()
    {
        return $this->hasMany(AwardsHonors::class, 'staff_id');
    }
}
