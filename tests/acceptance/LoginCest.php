<?php


class LoginCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        $I->amOnPage('/login');
        $I->see('Login');
        $I->fillField('#email', 'vadyagav@gmail.com');
        $I->fillField('#password', 'Test1234');
        $I->click('//*[@id="app"]/div/div/div/div/div[2]/form/div[4]/div/button');
        $I->see('You are logged in!');
    }
}
