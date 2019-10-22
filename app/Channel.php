<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Discussion;

class Channel extends Model
{

    public function discussions()
    {
        return $this->hasMany(Discussion::class);
    }

    protected $fillable=['name','slug'];

}