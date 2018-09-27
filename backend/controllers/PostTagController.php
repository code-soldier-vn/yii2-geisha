<?php

namespace backend\controllers;

use backend\models\Terms;
use backend\models\TermTaxonomy;
use Yii;
use backend\models\PostTag;
use backend\models\PostTagSearch;
use yii\base\Module;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PostTagController implements the CRUD actions for PostTag model.
 */
class PostTagController extends Controller
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
     * Lists all PostTag models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PostTagSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PostTag model.
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
     * Creates a new PostTag model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $tag = new PostTag();
        $taxonomy = new TermTaxonomy();

        if ($response = $this->save($tag, $taxonomy)) {
            return $response;
        }

        return $this->render('create', [
            'tag' => $tag,
            'taxonomy' => $taxonomy,
        ]);
    }

    /**
     * Updates an existing PostTag model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $tag = $this->findModel($id);
        $taxonomy = TermTaxonomy::findOne(['term_id' => $id]);

        if ($response = $this->save($tag, $taxonomy)) {
            return $response;
        }

        return $this->render('update', [
            'tag' => $tag,
            'taxonomy' => $taxonomy,
        ]);
    }

    /**
     * Deletes an existing PostTag model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete($id)
    {
        $tag = $this->findModel($id);
        $taxonomy = TermTaxonomy::findOne(['term_id' => $id]);

        if ($tag && $taxonomy) {
            $tag->delete();
            $taxonomy->delete();
        }

        return $this->redirect(['index']);
    }

    /**
     * Finds the PostTag model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PostTag the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PostTag::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    protected function save(Terms $terms, TermTaxonomy $taxonomy)
    {

        if ($terms->load(Yii::$app->request->post()) && $terms->save()) {

            $taxonomy->load(Yii::$app->request->post());
            $taxonomy->term_id = $taxonomy->term_id ? $taxonomy->term_id : $terms->term_id;
            $taxonomy->taxonomy = 'post-tag';

            $taxonomy->save();

            return $this->redirect(['view', 'id' => $terms->term_id]);
        }

        return false;
    }
}
