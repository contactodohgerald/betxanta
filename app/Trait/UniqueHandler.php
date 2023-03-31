<?php

namespace App\Trait;

use App\Models\User;

trait UniqueHandler {

    public function uniqueId($limit)
    {
        $uniqueID = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $limit);
        $user = User::where('referral', $uniqueID)->first();
        if($user != null)
        {
            $this->uniqueId($limit);
        }
        return $uniqueID;
    }
}