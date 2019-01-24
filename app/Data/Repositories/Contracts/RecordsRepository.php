<?php

namespace App\Data\Repositories\Contracts;

interface RecordsRepository
{
    public function getAll();
    public function getById($recordId);
    public function complicatedStuff($userID, $submitted, $titleSearch);
    // public function getByUserId($userId);
    // public function getDeleted();
    // public function getSubmitted();
}