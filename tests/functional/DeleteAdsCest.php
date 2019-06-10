<?php



use Codeception\Util\Fixtures;
use app\tests\fixtures\Ads as AdsFixture;
use app\tests\fixtures\User as UserFixture;
use app\models\Ads;
use app\models\User;



class DeleteAdsCest
{

    public $ads1 = null;
    public $ads4 = null;
    public $ads3 = null;
    public $ads6 = null;
    public $user1 = null;
    public $user2 = null;
    public $user3 = null;


    public function _before(FunctionalTester $I)
    {
    //    parent::_before($I);

        $this->url = 'tests/ads';
        $I->haveFixtures([
            'ads' => [
                'class' => AdsFixture::class,
                'dataFile' => YII_APP_BASE_PATH . '\fixtures\data\ads.php'
            ],
            'users' => [
                'class' => UserFixture::class,
                'dataFile' => YII_APP_BASE_PATH . '\fixtures\data\user.php'
            ]
        ]);
        $this->ads1 = $I->grabRecord('app\models\Ads', ['id' => 1]);
        $this->ads3 = $I->grabRecord('app\models\Ads', ['id' => 3]);
        $this->ads4 = $I->grabRecord('app\models\Ads', ['id' => 4]);
        $this->ads6 = $I->grabRecord('app\models\Ads', ['id' => 6]);
        $this->user1 = $I->grabRecord('app\models\User', ['id' => 1]);
        $this->user2 = $I->grabRecord('app\models\User', ['id' => 2]);
        $this->user3 = $I->grabRecord('app\models\User', ['id' => 3]);
    }

    public function _after(FunctionalTester $I)
    {
    }

    // tests
    public function tryToDeleteAds(FunctionalTester $I)
    {
        $I->wantTo('Check what User can not delete others ad');
        $I->amOnPage('/');
        $I->click('Вход');
        $I->canSee('Логин');
        $I->fillField('Логин','ram_test');
        $I->fillField('Пароль','Njvf+1974');
        $I->click('login-button' );
        $I->see('Выход (ram_test)');
        $I->click('Объявление №5');
        $I->canSee('Заголовок 5');
        $I->cantSee('Удалить');
    }


}
