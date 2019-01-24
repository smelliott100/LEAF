<?php

namespace App\Data\Repositories\Dao;

use App\Data\Repositories\Contracts\RecordsRepository;
use Illuminate\Support\Facades\DB;

class RecordsDao implements RecordsRepository
{
    public function getAll()
    {
        $tableName = session('db_name');

        return DB::table($tableName . '.records')->get();
    }

    public function getById($recordId)
    {
        $tableName = session('db_name');

        return DB::table($tableName . '.records')->where('recordID', $recordId)->get();
    }

    public function complicatedStuff($userID, $submitted, $titleSearch)
    {
        $tableName = session('db_name');

        $t = DB::table($tableName . '.records');
        $w = $t->whereRaw("userID = ? AND submitted = ? AND title LIKE ?", [$userID, $submitted, '%'.$titleSearch.'%']);

        return $w->get();
    }
}
