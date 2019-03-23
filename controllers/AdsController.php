<?php

namespace app\controllers;

use Yii;
use app\models\Ads;
use app\models\User;
use yii\data\Pagination;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


/**
 * AdsController implements the CRUD actions for Ads model.
 */
class AdsController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Ads models.
     * @return mixed
     */
    public function actionIndex()
    {
      //  $searchModel = new AdsSearch();
      //  $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $query = Ads::find()->with('user');
        $pagination = new Pagination([
            'defaultPageSize'=> 5,
            'totalCount' => $query->count()
        ]);


        $ads = $query->orderBy(['date' => SORT_DESC])->offset($pagination->offset)->limit($pagination->limit)->all();

        Ads::setNumbers($ads);

        return $this->render('index', [
            'ads' => $ads,
            'active_page' => Yii::$app->request->get("page", 1),
            'count_pages'=>$pagination->getPageCount(),
            'pagination' => $pagination,
        ]);
    }

    /**
     * Displays a single Ads model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Ads model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Ads();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'create' => true,
        ]);
    }

    /**
     * Updates an existing Ads model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if (Yii::$app->user->id !== $model->user_id)   {
            return $this->redirect(['view', 'id' => $model->id]);
        };

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'create' => false,
        ]);
    }

    /**
     * Deletes an existing Ads model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if (Yii::$app->user->id !== $model->user_id)   {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        else {
            $model->delete();
        } ;



        return $this->redirect(['index']);
    }

    /**
     * Finds the Ads model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Ads the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Ads::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Запрошенная страница не найдена. / The requested page does not exist.');
    }
}
