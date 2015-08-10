<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Photo extends Model {

    use SoftDeletes, RecordsActivity;

    protected $dates = ['deleted_at'];
    //protected static $recordEvents = ['created'];

    public function gallery()
    {
        return $this->belongsTo('App\Gallery');
    }



}
