<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model {

    protected $fillable = ['id','autor', 'title', 'subtitle', 'message', 'created_at'];

}
