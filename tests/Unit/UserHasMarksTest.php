<?php

namespace Tests\Unit;
use App\Models\User;

use Tests\TestCase;

use Illuminate\Database\Eloquent\Collection;

class UserHasMarksTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_user_has_marks()
    {

        $user= new User;
        $this->assertInstanceOf(Collection::class,$user->marcas);
       
    }
    public function test_user_has_marks2()
    {

        $users=User::all();
        $array_merge=[];
        $users->each(function($user){
            
            $user=array_merge(json_decode($user, true),json_decode($user->image, true));
            dd($user);
      
    }  );

}
}
