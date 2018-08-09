<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Hook\Scope\AfterStepScope;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\Mink\Driver\Selenium2Driver;
use Behat\MinkExtension\Context\MinkContext;
use Laracasts\Behat\Context\DatabaseTransactions;
use Laracasts\Behat\Context\Migrator;

/**
 * Defines application features from the specific context.
 */
class UserAuthenticationContext extends MinkContext implements Context
{
    use Migrator, DatabaseTransactions;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /**
     * @Then I should be able to see :text
     */
    public function iShouldBeAbleToSee($text)
    {
        $this->assertPageContainsText($text);
    }

    /**
     * @Given I fill in the form with email :$email
     */
    public function iFillInTheFormWithEmail($email)
    {
        $this->fillField('Email', $email);
    }

    /**
     * @Given I fill in the form with password :arg1
     */
    public function iFillInTheFormWithPassword($arg1)
    {
        throw new PendingException();
    }
}
