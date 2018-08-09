<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\MinkExtension\Context\MinkContext;
use Illuminate\Support\Facades\Auth;
use Laracasts\Behat\Context\DatabaseTransactions;
use Laracasts\Behat\Context\Migrator;
use PHPUnit\Framework\Assert as PHPUnit;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends MinkContext implements Context
{
    use Migrator, DatabaseTransactions;

    protected $name;
    protected $email;
    protected $password;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        ini_set('memory_limit','16M');
    }

    /**
     * @Then I can do something with Laravel
     */
    public function iCanDoSomethingWithLaravel()
    {
        PHPUnit::assertEquals('.env.behat', app()->environmentFile());
        PHPUnit::assertEquals('acceptance', env('APP_ENV'));
        PHPUnit::assertTrue(config('app.debug'));
    }



    /**
     * @When I register :name :email :password
     */
    public function iRegister($name, $email, $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;

        $this->visit('/register');
        $this->fillField('name', $name);
        $this->fillField('email', $email);
        $this->fillField('password', $password);
        $this->fillField('password_confirmation', $password);

        $this->pressButton('Register');
//        $this->printLastResponse();
    }

    /**
     * @Then I should have an account
     */
    public function iShouldHaveAnAccount()
    {
        $this->assertSignedIn();
        Auth::logout();
    }

    /**
     * @Given I have an account :name :email :password
     */
    public function iHaveAnAccount($name, $email, $password)
    {
        $this->iRegister($name, $email, $password);
        Auth::logout();
    }

    /**
     * @When I sign in
     */
    public function iSignIn()
    {
        $this->visit('login');

        $this->fillField('email', $this->email);
        $this->fillField('password', $this->password);

        $this->pressButton('Login');
    }

    /**
     * @When I sign in with invalid credentials
     */
    public function iSignInWithInvalidCredentials()
    {
        $this->email = 'invalid@example.com';
        $this->password = 'invalid';

        $this->iSignIn();
    }

    /**
     * @Then I should be logged in
     */
    public function iShouldBeLoggedIn()
    {
        $this->assertSignedIn();
        Auth::logout();
    }

    /**
     * @Then I should not be logged in
     */
    public function iShouldNotBeLoggedIn()
    {
        PHPUnit::assertTrue(Auth::guest());

        $this->assertPageAddress('login');

        $this->assertPageContainsText('These credentials do not match our records.');
    }

    private function assertSignedIn()
    {
        PHPUnit::assertTrue(Auth::check());

        $this->assertPageAddress('home');
    }

    /**
     * @Then I should be able to see :text
     */
    public function iShouldBeAbleToSee($text)
    {
        $this->assertPageContainsText($text);
        $this->getSession()->wait(5000);
//        print_r(->getPage());
    }
}
