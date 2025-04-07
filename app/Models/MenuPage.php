<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuPage extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'hin_title', 'page_url', 'sequence', 'status', 'parent_menu_id'];

    // Relationship to the parent menu
    public function parentMenu()
    {
        return $this->belongsTo(HeaderMenu::class, 'parent_menu_id');
    }
}