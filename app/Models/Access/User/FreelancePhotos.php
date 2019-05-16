<?php

namespace App\Models\Access\User;

use Illuminate\Database\Eloquent\Model;
/**
 * Class SocialLogin.
 */
class FreelancePhotos  extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'freelance_photos';
    protected $fillable = ['user_id', 'filename'];

    public function product()
    {
        return $this->belongsTo('App\Models\Access\User\Product');
    }
}
