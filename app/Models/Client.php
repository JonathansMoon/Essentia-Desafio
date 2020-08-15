<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use multiexplode;

class Client extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'photo'];

    public function setPhoneAttribute($value){

        $phone = $this->multiexplode(array("(", ")", " ", "-"), $value);
        $this->attributes['phone'] =  implode($phone);
    }

    public function getPhoneAttribute(){
        $phone = $this->attributes['phone'];

        $size = strlen(preg_replace("/[^0-9]/", "", $phone));
        if ($size == 11) { // COM CÓDIGO DE ÁREA NACIONAL e 9 dígitos
            return "(".substr($phone,0,2).")".substr($phone,2,5)."-".substr($phone,7,11);
        }
        if ($size == 10) { // COM CÓDIGO DE ÁREA NACIONAL
           return "(".substr($phone,0,2).")".substr($phone,2,4)."-".substr($phone,6,10);
        }
    }

    function multiexplode ($delimiters,$string) {

        $ready = str_replace($delimiters, $delimiters[0], $string);
        $launch = explode($delimiters[0], $ready);
        return  $launch;
    }


}
