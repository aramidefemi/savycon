<?php

namespace App\Models\Access\User;

use Illuminate\Database\Eloquent\Model;
/**
 * Class SocialLogin.
 */
class ProductPhotos  extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'product_photos';
    protected $fillable = ['product_id', 'filename'];

    public function product()
    {
        return $this->belongsTo('App\Models\Access\User\Product');
    }
}
