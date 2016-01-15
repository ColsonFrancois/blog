<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {

    protected $fillable = ['id','autor', 'message', 'article','ephemere', 'created_at'];

}
