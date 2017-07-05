<?php
/**
 * Created by PhpStorm.
 * User: d.denisov
 * Date: 16.03.2017
 * Time: 16:04
 */

?>

<? //frontend\widgets\FilterPanel::widget(['itemId' => $category->id]);?>


<div class="filter">
            <div class="filter-open clearfix">
                <div class="btn-close"></div>
                <div class="filter-block price">
                    <p class="name">Цена</p>
                    <div class="filter-content">
                        <div class="slider-block">
                            <input id="ex2" type="text" class="span2" value="" data-slider-min="100" data-slider-max="10000" data-slider-step="5" data-slider-value="[100,10000]"/>
                        </div>
                        <div class="slider-count">
                            <form class="form-inline" action="" method="POST" role="form">
                                <div class="form-group">
                                    <label for="from">От</label>
                                    <input type="text" class="form-control" name="" id="from" placeholder="100">
                                </div>
                                <div class="form-group">
                                    <label for="to">до</label>
                                    <input type="text" class="form-control" name="" id="to" placeholder="10000">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="filter-block color">
                    <p class="name">Цвет</p>
                    <div class="filter-content clearfix">
                        <div class="checkbox">
                            <input id="check1" type="checkbox">
                            <label for="check1">Белый</label>
                        </div>
                        <div class="checkbox">
                            <input id="check2" type="checkbox">
                            <label for="check2">Белый/Красный</label>
                        </div>
                        <div class="checkbox">
                            <input id="check3" type="checkbox">
                            <label for="check3">Черный/Красный</label>
                        </div>
                        <div class="checkbox">
                            <input id="check4" type="checkbox">
                            <label for="check4">Синий</label>
                        </div>
                        <div class="checkbox">
                            <input id="check5" type="checkbox">
                            <label for="check5">Оранжевый</label>
                        </div>
                    </div>
                </div>
                <div class="filter-block size">
                    <p class="name">Размер</p>
                    <div class="filter-content clearfix">
                        <div class="checkbox">
                            <input id="check6" type="checkbox">
                            <label for="check6">56</label>
                        </div>
                        <div class="checkbox">
                            <input id="check7" type="checkbox">
                            <label for="check7">46</label>
                        </div>
                        <div class="checkbox">
                            <input id="check8" type="checkbox">
                            <label for="check8">52</label>
                        </div>
                        <div class="checkbox">
                            <input id="check9" type="checkbox">
                            <label for="check9">42</label>
                        </div>
                    </div>
                </div>
                <div class="filter-block structure">
                    <p class="name">Состав</p>
                    <div class="filter-content clearfix">
                        <div class="checkbox">
                            <input id="check10" type="checkbox">
                            <label for="check10">40% хб - 60% пэ</label>
                        </div>
                        <div class="checkbox">
                            <input id="check11" type="checkbox">
                            <label for="check11">100% хб</label>
                        </div>
                        <div class="checkbox">
                            <input id="check12" type="checkbox">
                            <label for="check12">100% пэ</label>
                        </div>
                        <div class="checkbox">
                            <input id="check13" type="checkbox">
                            <label for="check13">100% шерсть</label>
                        </div>
                    </div>
                </div>
                <button class="btn apply hidden-xs">ПРИМЕНИТЬ</button>
            </div>
            <div class="filter-btn">Фильтр</div>
        </div>