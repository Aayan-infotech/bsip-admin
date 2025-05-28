<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeaderMenu extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'hin_title', 'menuHas', 'url', 'sequence', 'status'];

    // Relationship to child menu pages
    public function menuPages()
    {
        return $this->hasMany(MenuPage::class, 'parent_menu_id');
    }
}
