<?php

namespace App\Policies;

use App\Models\Answer;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AnswerPolicy
{
    use HandlesAuthorization;

    public function deleteAnswer(User $user, Answer $answer)
    {
        return $answer->user()->is($user);
    }
}
