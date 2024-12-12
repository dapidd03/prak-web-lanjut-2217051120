<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;

    protected $table = 'user';
    protected $guarded = ['id'];
    protected $fillable = [
        'nama',
        'ipk',
        'kelas_id',
        'foto',
    ];

    public function kelas(){
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    // Updated getUser function with optional $id parameter
    public function getUser($id = null) {
        $query = $this->join('kelas', 'kelas.id', '=', 'user.kelas_id')
                      ->select('user.id', 'user.nama', 'user.npm', 'user.foto', 'kelas.nama_kelas');

        // If $id is provided, filter by user.id
        if ($id !== null) {
            return $query->where('user.id', $id)->first(); // Return single record if $id is given
        }

        // Return all users if $id is not provided
        return $query->get(); 
    }
}
