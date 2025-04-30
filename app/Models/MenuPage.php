<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuPage extends Model
{
    use HasFactory;
    protected $appends = ['icon'];

    protected $fillable = ['title', 'hin_title', 'page_url', 'sequence', 'status', 'parent_menu_id'];

    // Relationship to the parent menu
    public function parentMenu()
    {
        return $this->belongsTo(HeaderMenu::class, 'parent_menu_id');
    }

    public function getIconAttribute()
    {
        switch ($this->page_url) {
            case 'bsip_governing_body':
                return 'fas fa-landmark';
            case 'bsip_research_advisory_council':
                return 'fas fa-lightbulb';
            case 'bsip_finance_and_building_committee':
                return 'fas fa-coins';
            case 'bsip_building_committee':
                return 'fas fa-building';
            case 'director':
                return 'fas fa-user-tie';
            case 'bsip_organizational_setup':
                return 'fas fa-sitemap';
            case 'bsip_past_institute_heads':
                return 'fas fa-users-cog';
            case 'bsip_past_institute_presidents':
                return 'fas fa-user-shield';
            case 'bsip_scientific':
                return 'fas fa-microscope';
            case 'bsip_technical_staff':
                return 'fas fa-tools';
            case 'bsip_administrative':
                return 'fas fa-briefcase';
            case 'bsip_superannuated_employee':
                return 'fas fa-user-clock';
            case 'bsip_acsir':
                return 'fas fa-book-open';
            case 'bsip_research_activities':
                return  'fas fa-atom';
            case 'bsip_collaboration':
                return 'fas fa-handshake';
            case 'bsip_sponsored_project':
                return 'fas fa-money-check-alt';
            case 'bsip_fellowship':
                return 'fas fa-graduation-cap';
            case 'bsip_medals_and_awards':
                return 'fas fa-award';
            case 'bsip_lectures':
                return 'fas fa-chalkboard-teacher';
            case 'bsip_consultancy':
                return 'fas fa-user-tie';
            default:
                return 'fas fa-long-arrow-alt-right';
        }
    }
}
