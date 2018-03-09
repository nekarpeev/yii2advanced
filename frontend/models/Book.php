<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "book".
 *
 * @property int $id
 * @property string $name
 * @property string $isbn
 * @property string $date_published
 * @property int $publisher_id
 */
class Book extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{book}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'publisher_id'], 'required'],
            [['date_published'], 'safe'],
            [['publisher_id'], 'integer'],
            [['name', 'isbn'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'             => 'ID',
            'name'           => 'Название книги',
            'isbn'           => 'Серийный номер',
            'date_published' => 'Дата публикации',
            'publisher_id'   => 'ID Издательства',
        ];
    }

    public function getDatePublished()
    {
        return ($this->date_published) ? Yii::$app->formatter->asDate($this->date_published) : 'Дата не задана';
    }

    public function getPublisher()
    {
        return $this->hasOne(Publisher::className(), ['id' => 'publisher_id'])->one();
    }

    public function getPublisherName()
    {
        if ($publisher = $this->getPublisher()) {
            return $publisher->name;
        }

        return 'Издатель не указан';
    }

    /* use viaTable
    public function getAuthors() {
        return $this->hasMany(Author::className(), ['id' => 'book_id'])->viaTable('book_to_author', ['author_id' => 'id'])->all();
    }
    */

    public function getBookToAuthorRelation()
    {
        return $this->hasMany(BookToAuthor::className(), ['book_id' => 'id']);
    }

    public function getAuthors()
    {
        return $this->hasMany(Author::className(), ['id' => 'author_id'])->via('bookToAuthorRelation')->all();
    }

    public function getAuthorsName()
    {
        foreach ($this->getAuthors() as $author) {

            if ($author->first_name && $author->last_name) {
                return $author->first_name .' '.$author->last_name;
            }
            else {
                return 'Автор не указан';
            }
        }
    }
}
