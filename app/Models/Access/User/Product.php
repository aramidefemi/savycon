<?php

namespace App\Models\Access\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class SocialLogin.
 */
class Product extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';

    protected $guarded = ['id'];

    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo('App\Models\Access\User\User');
    }

    public function photos()
    {
        return $this->hasMany('App\Models\Access\User\ProductPhotos');
    }


}
