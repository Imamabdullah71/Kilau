<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataAnak extends Model
{
    use HasFactory;
    protected $fillable = ['nama','gender','agama','tempatLahir','tanggalLahir','anakKe','dariBersaudara','statusCPB'];
    protected $table = 'dataAnak';
    public $timestamps = false;
}
