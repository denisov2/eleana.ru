<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Image;
use yii\helpers\Markdown;
use yii\helpers\Url;

use frontend\assets\ConstructorAsset;


/* @var $this yii\web\View */
/* @var $model pistol88\shop\models\Product */

ConstructorAsset::register($this);

$this->title = $model->name;
$images = $model->images;
$this->params['breadcrumbs'][] = ['label' => 'Главная', 'url' => ['/']];
$this->params['breadcrumbs'][] = ['label' => 'Каталог', 'url' => ['catalog/list']];
$this->params['breadcrumbs'][] = $this->title;

$images = $model->getImages();
if ($images) {
    $image = $images[0];
    $image_url = $image->getUrl();
}
?>

<div class="col-md-10 main-content">
    <div class="card-page">
        <!-- breadcrumb begin -->
        <ol class="breadcrumb text-left">
            <li><a href="index.html">Главная</a></li>
            <li class="active"><i class="fa fa-angle-double-right"></i>Куртка поворская</li>
        </ol>
        <!-- breadcrumb end -->

        <!-- card begin -->
        <div class="card clearfix">


            <!-- breadcrumb end -->

            <!-- card begin -->
            <!--========================================
            preview and reset area
        =========================================-->
            <div class="canvas_edit_tool">
                <a href="#" class="preview_btn" data-toggle="modal" data-target="#previewModal"><i class="fa fa-eye"
                                                                                                   aria-hidden="true"></i><span>Просмотр</span></a>
                <a href="#" class="reset_btn"><i class="fa fa-refresh" aria-hidden="true"></i><span>Очистить</span></a>
            </div>
            <!-- ========== End preview and reset area =================== -->

            <!--========================================
                t-shirt design area
            =========================================-->
            <div class="design_area" style="background-image: url('<?= $image_url ?>');">
                <div class="canvas_area_front">
                    <canvas id="front_canvas" width="192" height="302"></canvas>
                </div>
                <div class="canvas_area_back">
                    <canvas id="back_canvas" width="192" height="302"></canvas>
                </div>
            </div>
            <!-- ========== End t-shirt design area =================== -->


            <!--========================================
                left design tool
            =========================================-->
            <div class="design_tool">
                <ul>
                    <li>
                        <a href="#home" data-toggle="modal" data-target="#productModal"><i class="fa fa-leaf"
                                                                                           aria-hidden="true"></i><span>Выбрать продукт</span></a>
                    </li>
                    <li class="add_text">
                        <a class="open_window" href="#">
                            <i class="fa fa-text-width" aria-hidden="true"></i>
                            <span>Добавить текст</span>
                        </a>

                        <div class="text_tool_window">
                            <div class="header clear_fix">
                                <p class="title"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Редактировать
                                    текст</p>
                                <i id="close_window" class="fa fa-window-close" aria-hidden="true"></i>
                            </div>
						<textarea id="text_area"> Текст...
						</textarea>
                            <br>

                            <div class="wrapper clear_fix">
                                <div class="font_area">
                                    <p>Выберите шрифт</p>
                                    <select id="text_font">

                                        <!-- all fonts -->
                                        <option>arial</option>
                                        <option>Russo One</option>
                                        <option>verdana</option>
                                        <option>tahoma</option>
                                        <option>times new roman</option>
                                        <option>anton</option>
                                        <option>Akronim</option>
                                        <option>Alex Brush</option>
                                        <option>Aguafina Script</option>
                                    </select>
                                </div>
                                <div class="color_area">
                                    <p>Цвет текста</p>
                                    <!-- colour -->
                                    <input type="text" id="text_colour"/>
                                </div>
                            </div>
                            <div class="font_style">
                                <p>Стиль текста</p>
                                <select id="text_style">

                                    <!-- font style -->
                                    <option>normal</option>
                                    <option>italic</option>
                                    <option>oblique</option>
                                    <option>bold</option>
                                </select>
                            </div>
                            <div class="font_size">
                                <!-- font size -->
                                <p>Размер шрифта :</p> <input type="range" min="0" max="100" value="30" id="text_size"/><br>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="#" data-toggle="modal" data-target="#imgUploadModal"><i class="fa fa-picture-o"
                                                                                         aria-hidden="true"></i><span>Добавить картинку</span></a>
                    </li>
                    <li>
                        <a href="#" class="export_btn" data-toggle="modal" data-target="#previewModal"><i
                                class="fa fa-arrow-up" aria-hidden="true"></i><span>Сохранить</span></a>
                        <!-- <a href="#" data-toggle="modal" data-target="#previewModal"><i class="fa fa-arrow-up" aria-hidden="true"></i><span>Export</span></a> -->
                    </li>
                </ul>
            </div>
            <!-- ========== End left design tool =================== -->

            <!--========================================
                right help area
            =========================================-->
            <div class="help_area">

                <!-- help popup window -->
                <div class="help_window_wrapper">
                    <div class="help_window">
                        <div class="header clear_fix">
                            <p class="title"><i class="fa fa-question-circle" aria-hidden="true"></i> Помощь</p>
                            <i id="close_help_window" class="fa fa-window-close" aria-hidden="true"></i>
                        </div>

                        <p><i class="fa fa-leaf" aria-hidden="true"></i> <span>Выберите продукт</span> - Используйте для
                            выбора продукта из списка.</p>

                        <p><i class="fa fa-text-width" aria-hidden="true"></i> <span>Добавить текст</span> - Используйте
                            для добавления текста</p>

                        <p><i class="fa fa-pencil-square-o" aria-hidden="true"></i> <span>редактировать текст</span> -
                            Нажмите чтобы отредактировать текст</p>

                        <p><i class="fa fa-picture-o" aria-hidden="true"></i> <span>Добавить картинку</span> - Нажмите
                            чтоюы добавить картинку</p>

                        <p><i class="fa fa-arrow-up" aria-hidden="true"></i> <span>Сохранить</span> - Нажмите на эту
                            кнопку, чтобы сохранить изображение</p>

                        <p><i class="fa fa-trash-o" aria-hidden="true"></i> <span>Удалить</span> - Нажмите на <i
                                class="fa fa-trash-o" aria-hidden="true"></i> иконтку чтобы удалить элемент</p>

                    </div>
                </div>
                <a class="open_help_window" href="#">
                    <i class="fa fa-question-circle" aria-hidden="true"></i>

                    <p>Помощь</p>
                </a>
            </div>
            <!-- ========== End right help area =================== -->


            <!--========================================
                front-back button section
            =========================================-->

            <!--
            <div class="change_side">
                <button class="front_btn" type="button">Front</button>
                <button class="back_btn" type="button">Back</button>
            </div>
            -->
            <!-- ========== End front-back button section =================== -->

            <!--========================================
                product modal
            =========================================-->
            <div class="modal fade" id="productModal" role="dialog">
                <div class="modal-dialog modal-lg">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Продукты</h4>
                        </div>
                        <div class="modal-body product_area clear_fix">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ========== End product modal =================== -->


            <!--========================================
                Image Upload Modal
            =========================================-->
            <div class="modal fade" id="imgUploadModal" role="dialog">
                <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Загрузка рисунка</h4>
                        </div>
                        <div class="modal-body">
                            <input type="file" id="imgfile">
                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-default btn_add_image" name="button">Загрузить</button>

                            <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ========== End Image Upload Modal =================== -->


            <!--========================================
                preview image modal
            =========================================-->
            <div class="modal fade" id="previewModal" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Просмотр</h4>
                        </div>
                        <div class="modal-body clear_fix">
                            <div id="front_preview">
                                <div class="canvas_wrapper">
                                    <canvas id="previewcanvasfront" width="500" height="500"></canvas>
                                </div>
                                <a href="#" class="download" download="YourFileName.jpg"><i class="fa fa-download"
                                                                                            aria-hidden="true"></i><span>Сохранить</span></a>
                            </div>

                            <div id="back_preview">
                                <div class="canvas_wrapper">
                                    <canvas id="previewcanvasback" width="500" height="500"></canvas>
                                </div>
                                <a href="#" class="download_back" download="YourFileName.jpg"><i class="fa fa-download"
                                                                                                 aria-hidden="true"></i><span>Download back</span></a>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>