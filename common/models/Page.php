<?php

namespace common\models;

use common\models\Languages;
use Yii;

/**
 * This is the model class for table "Pages".
 *
 * @property integer $id
 * @property string $title
 * @property string $slug
 * @property string $content
 * @property integer $created_at
 * @property integer $lang_id
 * @property integer $original_id
 *
 * @property Languages $lang
 * @property Page $original
 * @property Page[] $pages
 */
class Page extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'page';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'slug', 'content', 'created_at', 'lang_id'], 'required'],
            [['content'], 'string'],
            [['created_at', 'lang_id', 'original_id'], 'integer'],
            [['title', 'slug'], 'string', 'max' => 255],
            [['slug'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'slug' => 'Slug',
            'content' => 'Content',
            'created_at' => 'Created At',
        ];
    }




}
