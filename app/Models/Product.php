<?php

namespace App\Models;

use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    use HasFactory;

    protected $fillable = ['name','description','price','category_id','image','stock'];

    public function category(){
        
        return $this->belongsTo(Category::Class);
    }

    
};
