<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use APP\Models\User;

class ReportTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $user = User::factory()->create([
            'email' => 'tom@mail.com'
        ]);
        $this->browse(function ($browser) use ($user) {
            $browser->visit('http://e-bank.test/login')
                ->type('email', $user->email)
                ->type('password', 'password')
                ->press('.btn')
                ->clickAtXPath('/html/body/nav/div/div/ul/li[4]/p/a')
                ->type('datefrom')
                ->type('dateto')
                ->press('.btn')
                ->assertPathIs('/report');
            $browser->screenshot('report');
        });
    }
}
