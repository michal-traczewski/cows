<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MilkOutput extends Model
{
    public $timestamps = false;
    protected $table = 'milk_output';

    protected $fillable = [
        'date',
        'output',
        'cow_id',
    ];
    
    public function cow()
    {
        return $this->belongsTo('\App\Cow');
    }
}
