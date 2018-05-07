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
            $browser->visit('http://localhost:8000')
                   ->assertSee('Laravel');
        });
    }
    public function testBasicExample2()
    {
        $user = factory(User::class)->create([
            'email' => 'ps231@gmail.com',
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                ->type('email', $user->email)
                ->type('password', 'secret')
                ->press('Login')
                ->assertPathIs('/home');
        });
    }
}
