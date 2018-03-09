<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Book;
use yii\web\Controller;

class BookshopController extends Controller
{
    public function actionIndex()
    {
        $bookList = Book::find()->orderBy('date_published')->limit(5)->all();

        return $this->render('index', ['bookList' => $bookList]);
    }

    public function actionCreate() {
        $book = new Book();

        if($book->load(Yii::$app->request->post()) && $book->save()) {
            Yii::$app->session->setFlash('success', 'Save!');
            return $this->refresh();
        }

        return $this->render('create', ['book' => $book]);
    }
}
