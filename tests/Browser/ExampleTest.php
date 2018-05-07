<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\DuskServiceProvider;
use App\User;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */

    public function testBasicExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                   ->assertSee('Laravel');
        });
    }
    public function testLogin()
    {
        $user = factory(User::class)->create([
            'email' => 'ps221231@gmail.com',
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                ->type('email', $user->email)
                ->type('password', 'secret')
                ->press('Login')
                ->assertPathIs('/home');
        });
    }

    public function testRegister()
    {
        $user = factory(User::class)->create([
            'email' => 'ps944343531@gmail.com',
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/register')
                ->type('email', $user->email)
                ->type('password', 'secret')
                ->type('password_confirmation', 'secret')
                ->press('Register')
                ->assertPathIs('/home');
        });
    }
}
