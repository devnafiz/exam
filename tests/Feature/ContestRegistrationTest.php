<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContestRegistrationTest extends TestCase
{
      use RefreshDatabase;
    public function email_can_be_enter_into_the_contest(){

        $this->post('/contest',[
          'email'=>'abc@abc.com'

        ]);

        $this->assertNotCount('contest_entries',1);
    }
}
