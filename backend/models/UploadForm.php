<?php
/**
 * Created by PhpStorm.
 * User: d.denisov
 * Date: 11.05.2017
 * Time: 16:38
 */

namespace backend\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }

    public function upload()
    {
        //if ($this->validate() && $this->imageFile->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension))
        if ($this->validate() && $this->imageFile->saveAs(dirname(dirname(__DIR__)) . '/frontend/web/uploads/logo/' . $this->imageFile->baseName . '.' . $this->imageFile->extension))
            return true;
        else
            return false;
    }
}