<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
     //protected $table = 'Menus';
	protected $fillable = ['name','url','icon'];
	protected $guarded = ['id'];
	 //public $timestemps = false;
}
