<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use Illuminate\Support\Facades\DB;

class UsersModuleTest extends TestCase
{
    /** @test
     */
    use RefreshDatabase;

      /** @test */
     function it_shows_the_users_list()
    {


    factory(User::class)->create([
    'name' => 'diego',
    //'website' => 'caras.com',

   ]);
    
    factory(User::class)->create([
    'name' => 'fernando',
   ]);

factory(User::class)->create([
    'name' => 'alejandra',
   ]);
           $this->get('/usuarios')
            ->assertStatus(200)
            ->assertSee('Listado de usuarios')
            ->assertSee('diego')
            ->assertSee('fernando')
            ->assertSee('alejandra');
           
    }
    /** @test */
    function it_shows_a_default_message_if_the_users_list_is_empty()
    {

      // DB::table('users')->truncate();
       // $this->get('/usuarios?empty')
        $this->get('/usuarios')
            ->assertStatus(200);
           // ->assertSee('No hay usuarios registrados.');
    }
    
      /** @test */
    function it_displays_the_users_details()
       {
    
    factory(User::Class)->create([
        'name' => 'diego bustos',

    ]);

      $this->get('/usuarios/'.$user->id) //usuarios 5
            ->assertStatus(200)
            ->assertSee('diego bustos');
           // ->assertSee('Mostrando detalle del usuario: 5');
           
    }
     /** @test */
    function error_404_si_el_usuario_no_es_encontrado()
      {

        $this->get('/usuarios/999')
        ->assertStatus(404);
       // ->assertSee('PAGINA NO ENCONTRADA');

      }  
      /** @test */

    function it_loads_the_new_users_page()

    {
        $this->get('/usuarios/nuevo')
            ->assertStatus(200);
          //  ->assertSee('Crear nuevo usuario');
    }
  
  /** @test */
  function it_creates_a_new_user(){

    $this->withoutExceptionHandling();

    $this->post('/usuarios/',[
    'name' => 'digo bustos',
    'email' => 'ferchobmg@gmail.com',
    'password' => '123456'
    

    ])->asserRedirect('usuarios');
    //->asserRedirect(route('users.index'));

    $this->assertCredentials([
    'name' => 'digo bustos',
    'email' => 'ferchobmg@gmail.com',
    'password' => '123456',


    ]);

}
  /** @test */
    function the_name_is_required(){

    $this->from('usuarios/nuevo')
    ->post('/usuarios/',[

    'name' => '',
    'email' => 'ferchobmg@gmail.com',
    'password' => '123456'
    
    ])->asserRedirect('usuarios/nuevo')
    ->assertSessionHasErrors(['name' => 'El campo nombre es obligatorio'] );

    $this->assertEquals(0,User::count());
    
    // $this->asserDatabaseMissing('users',[
    // 'email'=> 'ferchobmg@gmail.com',

    // ]);


    }
  /** @test */
    function the_email_is_required(){

    $this->from('usuarios/nuevo')
    ->post('/usuarios/',[

    'name' => 'diego',
    'email' => '',
    'password' => '123456'
    
    ])->asserRedirect('usuarios/nuevo')
    ->assertSessionHasErrors(['email'] );

    $this->assertEquals(0,User::count());
    
    // $this->asserDatabaseMissing('users',[
    // 'email'=> 'ferchobmg@gmail.com',

    // ]);

}
  /** @test */
 function the_email_mush_be_valid(){

    $this->from('usuarios/nuevo')
    ->post('/usuarios/',[

    'name' => 'diego',
    'email' => 'correo-no-valido',
    'password' => '123456'
    
    ])->asserRedirect('usuarios/nuevo')
    ->assertSessionHasErrors(['email'] );

    $this->assertEquals(0,User::count());
    
    // $this->asserDatabaseMissing('users',[
    // 'email'=> 'ferchobmg@gmail.com',

    // ]);

}
  /** @test */
function the_email_mush_be_unique(){
  factory(User::class)->create([
   'email'=>'ferchobmg@gmail.com'
  ]);

    $this->from('usuarios/nuevo')
    ->post('/usuarios/',[

    'name' => 'diego',
    'email' => 'ferchobmg@gmail.com',
    'password' => '123456'
    
    ])->asserRedirect('usuarios/nuevo')
    ->assertSessionHasErrors(['email'] );
    
    $this->assertEquals(1,User::count());
    
    // $this->asserDatabaseMissing('users',[
    // 'email'=> 'ferchobmg@gmail.com',

    // ]);

}
  /** @test */
    function the_password_is_required(){

    $this->from('usuarios/nuevo')
    ->post('/usuarios/',[

    'name' => 'diego',
    'email' => 'ferchobmg@gmail.com',
    'password' => ''
    
    ])->asserRedirect('usuarios/nuevo')
    ->assertSessionHasErrors(['password'] );

    $this->assertEquals(0,User::count());
    
    // $this->asserDatabaseMissing('users',[
    // 'email'=> 'ferchobmg@gmail.com',

    // ]);

  }
    
    /** @test */

   function it_loads_the_edit_user_page()
    {
 
        $user = factory(User::class)->create();
        $this->get("/usuarios/{$user->id}/editar") // usuarios/5/editar
            ->assertStatus(200)
            ->assertViewIs('users.edit')
            ->assertSee('Editar usuario')
            ->assertViewHas('user', function ($viewUser) use ($user) {
                return $viewUser->id === $user->id;
            });
    }

   /** @test */
    function it_updates_a_user()
    {
        $user = factory(User::class)->create();
        $this->withoutExceptionHandling();
        $this->put("/usuarios/{$user->id}", [
            'name' => 'diego',
            'email' => 'ferchobmg@gmail.com',
            'password' => '123456'
        ])->assertRedirect("/usuarios/{$user->id}");
        $this->assertCredentials([
            'name' => 'diego',
            'email' => 'ferchobmg@gmail.com',
            'password' => '123456',
        ]);
    }
    /** @test */
    function the_name_is_required_when_updating_the_user()
    {
        $user = factory(User::class)->create();
        $this->from("usuarios/{$user->id}/editar")
            ->put("usuarios/{$user->id}", [
                'name' => '',
                'email' => 'ferchobmg@gmail.com',
                'password' => '123456'
            ])
            ->assertRedirect("usuarios/{$user->id}/editar")
            ->assertSessionHasErrors(['name']);
        $this->assertDatabaseMissing('users', ['email' => 'ferchobmg@gmail.com']);
    }
    /** @test */
    function the_email_must_be_valid_when_updating_the_user()
    {
        $user = factory(User::class)->create();
        $this->from("usuarios/{$user->id}/editar")
            ->put("usuarios/{$user->id}", [
                'name' => 'diego',
                'email' => 'correo-no-valido',
                'password' => '123456'
            ])
            ->assertRedirect("usuarios/{$user->id}/editar")
            ->assertSessionHasErrors(['email']);
        $this->assertDatabaseMissing('users', ['name' => 'diego']);
    }
    /** @test */
    function the_email_must_be_unique_when_updating_the_user()
    {
        //$this->withoutExceptionHandling();
        factory(User::class)->create([
            'email' => 'existing-email@example.com',
        ]);
        $user = factory(User::class)->create([
            'email' => 'ferchobmg@gmail.com'
        ]);
        $this->from("usuarios/{$user->id}/editar")
            ->put("usuarios/{$user->id}", [
                'name' => 'diego',
                'email' => 'existing-email@example.com',
                'password' => '123456'
            ])
            ->assertRedirect("usuarios/{$user->id}/editar")
            ->assertSessionHasErrors(['email']);
        //
    }
    /** @test */
    function the_users_email_can_stay_the_same_when_updating_the_user()
    {
        $user = factory(User::class)->create([
            'email' => 'ferchobmg@gmail.com'
        ]);
        $this->from("usuarios/{$user->id}/editar")
            ->put("usuarios/{$user->id}", [
                'name' => 'diego',
                'email' => 'ferchobmg@gmail.com',
                'password' => '12345678'
            ])
            ->assertRedirect("usuarios/{$user->id}"); // (users.show)
        $this->assertDatabaseHas('users', [
            'name' => 'diego',
            'email' => 'ferchobmg@gmail.com',
        ]);
    }
    /** @test */
    function the_password_is_optional_when_updating_the_user()
    {
        $oldPassword = 'CLAVE_ANTERIOR';
        $user = factory(User::class)->create([
            'password' => bcrypt($oldPassword)
        ]);
        $this->from("usuarios/{$user->id}/editar")
            ->put("usuarios/{$user->id}", [
                'name' => 'diego',
                'email' => 'ferchobmg@gmail.com',
                'password' => ''
            ])
            ->assertRedirect("usuarios/{$user->id}"); // (users.show)
        $this->assertCredentials([
            'name' => 'diego',
            'email' => 'ferchobmg@gmail.com',
            'password' => $oldPassword // VERY IMPORTANT!
        ]);


}
  /** @test */

function it_deletes_a_user(){
  $user = factory(User::class)->create();

  $this->delete("usuarios/{$user->id}")
  ->asserRedirect('usuarios');

 $this->assertDatabaseMissing('users',[
  'id'=> $user->id,
 ]);

 //$this->assertSame(0, User::count());
}



}
