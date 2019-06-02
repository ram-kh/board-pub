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

    public function tryToEditAndSaveOwnAd(FunctionalTester $I)
    {
        $I->wantTo('Check what User can edit and save ad');
        $I->amLoggedInAs($this->user1);
        $title = 'Измененный Заголовок 6';
        $intro_text = 'Это краткий текст измененного объявления 66';
        $full_text = 'Это полный текст измененного объявления номер 666.';
        $sum = '60009';

        $I->wantTo('ensure that update ad works');
        $I->amOnPage('/');
        $I->click('Вход');
        $I->canSee('Логин');
        $I->fillField('Логин','ram_test');
        $I->fillField('Пароль','Njvf+1974');
        $I->click('login-button' );
        $I->see('Выход (ram_test)');
        $I->seeResponseCodeIs(200);
        $I->click('Объявление №6');
        $I->canSee('Заголовок 6');
        $I->click('Редактировать');
//        $I->seeResponseCodeIs(202);
/*        $I->fillField( ['Ads[title]'],  $title);
        $I->fillField('Ads[intro_text]', $intro_text);
        $I->fillField('Ads[full_text]', $full_text);
        $I->fillField('Ads[sum]', $sum);
//        $I->seeResponseCodeIs(202);
        $I->click( 'button');
*/      $I->seeResponseCodeIs(200);

        $I->sendAjaxPostRequest('?r=ads/update&id=6', //. $this->ads6->id,
            [
                'title' => $title,
                'intro_text' => $intro_text,
                'full_text' => $full_text,
                'sum' => $sum
            ]
        );

      $I->seeResponseCodeIs(200);

      $I->seeInDatabase( 'ads', [
            'title' => $title,
            'intro_text' => $intro_text,
            'full_text' => $full_text,
            'sum' => $sum
        ]);

   }

}
