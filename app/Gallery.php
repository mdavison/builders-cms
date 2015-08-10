<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model {

    use SoftDeletes, RecordsActivity;

    protected $dates = ['deleted_at'];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'galleries';

    public static $rules =
        [
            'name' => 'required'
        ];

    public static function findByLinkToken($link_token)
    {
        return Gallery::where('link_token', '=', $link_token)->firstOrFail();
    }

    public function photos()
    {
        return $this->hasMany('App\Photo')->orderBy('display_order', 'ASC');
    }

}
