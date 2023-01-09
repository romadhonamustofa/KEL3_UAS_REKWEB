<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class MahasiswaBaru extends Model
{

    protected $table = 'table_mahasiswabaru';


    protected $fillable = ['nama', 'asal_sekolah', 'tempat_lahir', 'tanggal_lahir', 'no_hp', 'alamat'];

}
