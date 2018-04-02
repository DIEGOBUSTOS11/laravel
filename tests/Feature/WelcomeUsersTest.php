<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WelcomeUsersTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

     function it_welcome_users_with_apellido()
    {
         $this->get('/saludo/diego/bustos')
        ->assertStatus(200)
        ->assertSee('Bienvenido diego, tu apellido es bustos');
    }


     function it_welcome_users_without_apellido()
    {
    	$this->get('/saludo/diego')
        ->assertStatus(200)
         ->assertSee('Bienvenido diego');
    }
        
    }

