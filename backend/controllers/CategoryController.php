<?php

namespace backend\controllers;

use backend\models\Terms;
use backend\models\TermTaxonomy;
use Yii;
use backend\models\Category;
use backend\models\CategorySearch;
use yii\base\Module;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CategoryController implements the CRUD actions for Category model.
 */
class CategoryController extends Controller
{
    public function __construct($id, Module $module, array $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->layout = 'white-box';
    }

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
     * Lists all Category models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Category model.
     * @param integer $id
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
     * Creates a new Category model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $terms = new Category();
        $taxonomy = new TermTaxonomy();

        if ($response = $this->save($terms, $taxonomy)) {
            return $response;
        }

        return $this->render('update', [
            'terms' => $terms,
            'taxonomy' => $taxonomy,
        ]);
    }

    /**
     * Updates an existing Category model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $terms = $this->findModel($id);
        $taxonomy = TermTaxonomy::findOne(['term_id' => $id]);

        if ($response = $this->save($terms, $taxonomy)) {
            return $response;
        }

        return $this->render('update', [
            'terms' => $terms,
            'taxonomy' => $taxonomy,
        ]);
    }

    /**
     * Deletes an existing Category model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        if ($taxonomy = TermTaxonomy::findOne(['term_id' => $id])) {
            $taxonomy->delete();
        }

        return $this->redirect(['index']);
    }

    /**
     * Finds the Category model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Category the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Category::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    /**
     * @param Terms $terms
     * @param TermTaxonomy $taxonomy
     * @return bool|\yii\web\Response
     */
    protected function save(Terms $terms, TermTaxonomy $taxonomy)
    {
        if ($terms->load(Yii::$app->request->post()) && $terms->save()) {

            $taxonomy->load(Yii::$app->request->post());
            $taxonomy->term_id = $taxonomy->term_id ? $taxonomy->term_id : $terms->term_id;
            $taxonomy->taxonomy = $taxonomy->taxonomy ? $taxonomy->taxonomy : 'category';

            if ($taxonomy->validate()) {
                $taxonomy->save();
            }

            return $this->redirect(['view', 'id' => $terms->term_id]);
        }

        return false;
    }
}
