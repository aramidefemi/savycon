<?php

namespace App\Models\Access\User;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SocialLogin.
 */
class Freelancer extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'freelancers';

    public function user()
    {
        return $this->belongsTo('App\Models\Access\User\User');
    }

}
