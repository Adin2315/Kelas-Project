<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Mahasiswa extends Model
{
    use HasFactory;

    public function get_all_mahasiswa() {

        return DB::select("select * from mahasiswa");
    }
    public function insert_into_mahasiswa($nrp, $nama, $email){

        return DB::insert("insert into mahasiswa (nrp, nama, email) values (?, ?, ?)", [$nrp, $nama, $email]);
    }
    public function get_mahasiswa($nrp){

        return DB::select("select * from mahasiswa where nrp = ?", [$nrp]);
    }
    public function update_mahasiswa($nama, $email, $nrp){

        return DB::update("update mahasiswa set nama = ?, email = ? where nrp = ?", [$nama, $email, $nrp]);
    }
    public function delete_mahasiswa($nrp){

        return DB::delete("delete from mahasiswa where nrp = ?", [$nrp]);
    }

}
