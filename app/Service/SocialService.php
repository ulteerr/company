<?php namespace App\Service;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SocialService
{
    public function saveSocialData($user)
    {
        $email = $user->getEmail();
        $name = $user->getName();
        if (empty($user->getAvatar())) {
            $avatar = $user->getAvatar('/img/no_image.png');
        } else {
            $avatar = $user->getAvatar();
        }

        $password = Hash::make('123456789');

        $data = ['email' => $email, 'password' => $password, 'name' => $name, 'avatar' => $avatar];
        $u = User::where('email', $email)->first();

        if ($u) {
            return $u->fill(['name' => $name, 'avatar' => $avatar]);
        }
        return User::create($data);
    }
}
