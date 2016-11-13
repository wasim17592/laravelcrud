<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/4/16
 * Time: 10:18 AM
 */
namespace  App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

    public $fillable = ['title','description'];

}