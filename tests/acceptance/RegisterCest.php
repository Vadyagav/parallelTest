<?php


class RegisterCest
{
    /**
     * @var Helper\Acceptance
     */
    protected $acceptance;



    protected function _inject(\Helper\Acceptance $acceptance)
    {
        $this->acceptance = $acceptance;
    }

    public function _before(AcceptanceTester $I)
    {
    }



    public function _after(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {

        $I->wantTo('perform steps from multiple step files');
        $I->amOnPage('/register');
        $I->see('Register');
        $I->fillField('#name', 'koko');
        $I->fillField('#email', 'koko@gmail.com');
        $I->fillField('#password', 'Test1234');
        $I->fillField('#password-confirm', 'Test1234');
        $I->click('//*[@id="app"]/div/div/div/div/div[2]/form/div[5]/div/button');
        $I->see('You are logged in!');

    }
}
