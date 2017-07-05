<?php
use yii\helpers\Html;
use \yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;
//use pistol88\cart\widgets\CartInformer;
use frontend\widgets\CartInformer;


use frontend\widgets\TruncateButton;
use frontend\widgets\ElementsList;
use frontend\widgets\OneClick;
use frontend\widgets\OrderForm;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head lang="ru">
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <meta name="description" content="Title"/>
    <!-- Description of the page -->
    <meta name="author" content="Grebenyuk Viktor, Denisov Dmitriy">
    <!-- Author Name -->

    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<header>
    <div class="header-top clearfix hidden-xs">
        <div class="container">
            <div class="row">
                <div class="auth pull-right ">
                    <?php if (Yii::$app->user->isGuest) { ?>
                        <a data-toggle="modal" href="<?= Url::to(['/user/registration/register']); ?>">
                            <button class="btn reg">Регистрация</button>
                        </a>
                        <a data-toggle="modal" href="<?= Url::to(['/user/security/login']); ?>">
                            <button class="btn login">Вход</button>
                        </a>
                    <?php } else { ?>

                        <a  class="btn login" href="<?= Url::to(['/user/security/logout']); ?>" data-method="post">Выход</a>
                    <?php } ?>
                    <span><?= Yii::$app->config->registration_promo ?></span>
                </div>
            </div>
        </div>
    </div>
    <div class="header-middle">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-4 col-xs-5 logo-block">
                    <a href="<?= \yii\helpers\Url::to(['/']) ?>"><img src="<?= \Yii::$app->config->logo ?>" alt="Logo"></a>
                </div>
                <div class="col-lg-4 col-md-3 col-sm-8 search-block">


                    <!--  OLD SEARCH FORM
                    <form class="form-inline">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-red"><i class="fa fa-search"></i></button>
                    </form>
                    -->

                    <!-- yandex search form-->

                    <div class="ya-site-form ya-site-form_inited_no"
                         onclick="return {'action':'http://996934.uy228250.web.hosting-test.net/search','arrow':false,'bg':'transparent','fontsize':14,'fg':'#000000','language':'ru','logo':'rb','publicname':'Поиск по сайту Eleana.ru','suggest':true,'target':'_self','tld':'ru','type':2,'usebigdictionary':true,'searchid':2298242,'input_fg':'#555555','input_bg':'#ffffff','input_fontStyle':'normal','input_fontWeight':'normal','input_placeholder':'Поиск по сайту Eleana.ru','input_placeholderColor':'#cccccc','input_borderColor':'#bbb8b2'}">
                        <form action="https://yandex.ru/search/site/" method="get" target="_self"
                              accept-charset="utf-8"><input type="hidden" name="searchid" value="2298242"/><input
                                type="hidden" name="l10n" value="ru"/><input type="hidden" name="reqenc" value="utf-8"/><input
                                type="search" name="text" value=""/><input type="submit" value="Найти"/></form>
                    </div>
                    <style type="text/css">
                        .ya-page_js_yes .ya-site-form_inited_no {
                            display: none;
                        }

                        .search-block .ya-site-form {
                            line-height: 24px;
                        }
                    </style>
                    <script type="text/javascript">(function (w, d, c) {
                            var s = d.createElement('script'), h = d.getElementsByTagName('script')[0], e = d.documentElement;
                            if ((' ' + e.className + ' ').indexOf(' ya-page_js_yes ') === -1) {
                                e.className += ' ya-page_js_yes';
                            }
                            s.type = 'text/javascript';
                            s.async = true;
                            s.charset = 'utf-8';
                            s.src = (d.location.protocol === 'https:' ? 'https:' : 'http:') + '//site.yandex.net/v2.0/js/all.js';
                            h.parentNode.insertBefore(s, h);
                            (w[c] || (w[c] = [])).push(function () {
                                Ya.Site.Form.init()
                            })
                        })(window, document, 'yandex_site_callbacks');</script>

                    <!-- end yandex form -->
                </div>
                <div class="col-lg-5 col-md-6 bsg-block hidden-sm hidden-xs">
                    <div class="contacts">
                        <div class="contcts-block">
                            <a class="tel" href="tel:<?= Yii::$app->config->phone ?>"><?= Yii::$app->config->phone ?></a>
                            <a class="tel" href="tel:<?= Yii::$app->config->second_phone ?>"><?= Yii::$app->config->second_phone ?></a>
                            <a class="email" href="mailto:<?= Yii::$app->config->contact_email ?>"><?= Yii::$app->config->contact_email ?></a>
                        </div>
                    </div>
                    <div class="bag">
                        <div class="bag-text">
                            <a data-toggle_="modal" href="<?= Url::to('/cart') ?>">
                                <button type="button" class="btn bag-btn"><i class="fa fa-shopping-cart"></i></button>
                            </a>
                            <?php
                            //$items = Yii::$app->cart->getCollection();
                            //$total_sum = Yii::$app->cart->getTotalSum();

                            $elements = yii::$app->cart->elements;
                            ?>
                            <?= CartInformer::widget(['htmlTag' => 'p', 'offerUrl' => '/?r=cart', 'text' => 'В корзине {c} товар(а) на {p}']); ?>
                            <? // TruncateButton::widget(); ?>


                            <? //ElementsList::widget(['type' => ElementsList::TYPE_DROPDOWN]);?>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-footer">
        <div class="container">
            <div class="row">
                <nav class="navbar navbar-default" role="navigation">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-ex1-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <button type="button" class="btn btn-red dropdown-toggle visible-sm visible-xs"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Каталог
                        </button>
                        <ul class="dropdown-menu list-unstyled aside-menu">
                            <li>
                                <a class="collapse-link" role="button" data-toggle="collapse" href="#menu_mob"
                                   aria-expanded="true" aria-controls="collapseExample">
                                    КАТАЛОГ
                                </a>

                                <div class="collapse in" id="menu_mob">
                                    <ul>
                                        <li class="active"><a href="#">Униформа</a></li>
                                        <li><a href="#">Текстиль</a></li>
                                        <li><a href="#">Вышивка</a></li>
                                        <li><a href="#">Ткани</a></li>
                                        <li><a href="#">Обувь</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li><a href="#" class="collapse-link">НОВИНКИ</a></li>
                            <li><a href="#" class="collapse-link">АКЦИИ</a></li>
                            <li>
                                <a class="collapse-link" role="button" data-toggle="collapse" href="#menu_mob2"
                                   aria-expanded="false" aria-controls="collapseExample">
                                    РАЗМЕРНЫЕ ТАБЛИЦЫ <i class="fa fa-angle-down"></i>
                                </a>

                                <div class="collapse" id="menu_mob2">
                                    <ul>
                                        <li><a href="#">Униформа</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a class="collapse-link clearfix" role="button" data-toggle="collapse" href="#menu_mob3"
                                   aria-expanded="false" aria-controls="collapseExample">
                                    ФОТО-ПРАЙСЫ <i class="fa fa-angle-down"></i>
                                </a>

                                <div class="collapse" id="menu_mob3">
                                    <ul>
                                        <li><a href="#">Униформа</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                        <a class="visible-sm visible-xs" data-toggle="modal" href="#bag">
                            <button type="button" class="btn bag-btn"><i class="fa fa-shopping-cart"></i></button>
                        </a>
                    </div>


                    <?= $this->renderFile('@frontend/views/partial/menu.php'); ?>
                </nav>
            </div>
        </div>
    </div>
</header>


<main>
    <div class="container">
        <div class="row">


            <?php // Alert::widget() ?>
            <?= $content ?>
        </div>
    </div>
</main>

<!--MAIN END-->


<!--FOOTER BEGIN-->

<footer>
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <nav class="navbar navbar-default visible-md visible-lg" role="navigation">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-ex1-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse navbar-ex1-collapse">
                        <ul class="nav navbar-nav">
                            <li class="active footer-link"><a
                                    href="<?= Url::to(['/page/show', 'slug' => 'portfolio']) ?>">Портфолио</a></li>
                            <li><a class="footer-link" href="<?= Url::to(['/page/show', 'slug' => 'author-law']) ?>">Авторское
                                    право</a></li>
                            <li><a class="footer-link" href="<?= Url::to(['/page/show', 'slug' => 'give-back']) ?>">Условия
                                    возврата</a></li>
                            <li><a class="footer-link border-none"
                                   href="<?= Url::to(['/page/show', 'slug' => 'dop-info']) ?>">Дополнительная
                                    информация</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <button class="btn btn-red"><a href="<?= Url::to(['/admin']) ?>">Панель управления</a>
                                </button>
                            </li>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </nav>
            </div>
        </div>
    </div>
    <div class="footer-med">
        <div class="container">
            <div class="row">
                <div class="col-md-3 hidden-xs">
                    <div class="footer-logo">
                        <a href="<?= Url::to(['/']) ?>"><img src="/img/logo.png" alt="Logo"></a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="footer-contacts">
                        <ul class="list-unstyled phone-icon">
                            <li><a class="phone-link" href="tel:<?= Yii::$app->config->phone ?>"><?= Yii::$app->config->phone ?></a></li>
                            <li><a class="phone-link" href="tel:<?= Yii::$app->config->second_phone ?>"><?= Yii::$app->config->second_phone ?></a></li>
                        </ul>
                        <ul class="list-unstyled">
                            <li><?= Yii::$app->config->work_time ?></li>
                            <li><a href="mailto:<?= Yii::$app->config->contact_email ?>"><?= Yii::$app->config->contact_email ?></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footer-soc">
                        <a class="soc-link" href="#"><i class="fa fa-vk" aria-hidden="true"></i></a>
                        <a class="soc-link" href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a class="soc-link" href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a class="soc-link" href="#"><i class="fa fa-odnoklassniki" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p>© eleana.ru All right reserved</p>
                </div>
            </div>
        </div>
    </div>

</footer>

<!--FOOTER END-->

<!-- MODAL BEGIN -->

<!--<a class="btn btn-primary" data-toggle="modal" href="bag">Trigger modal</a>-->
<div class="modal fade" id="bag">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Товар добавлен в корзину</h4>
            </div>
            <div class="modal-body">
                <div class="card clearfix">
                    <div class="row">
                        <div class="col-sm-4">
                            <img class="cart-img" src="img/card-big-img.png" alt="product">
                        </div>
                        <div class="col-sm-8">
                            <div class="card__info pull-right">
                                <div class="card__info--wrapper">
                                    <div class="card__info--title">
                                        <div class="title-wrapper clearfix">
                                            <div class="info-left">
                                                <span id="cart-modal-product-title">Выберите товар</span>

                                                <p><span id="cart-modal-product-model">Выберите товар</span></p>
                                            </div>
                                            <div class="info-right info-code"><span id="cart-modal-product-code">Выберите товар</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card__info--des">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <table class="table">
                                                    <tbody>
                                                    <tr>
                                                        <td>Артикул:</td>
                                                        <td><span id="cart-modal-product-sku">Выберите товар</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Состав:</td>
                                                        <td>40%хб-60%пэ</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Цвет:</td>
                                                        <td>черн/крас</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Статус:</td>
                                                        <td>под заказ</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Рост:</td>
                                                        <td>164</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Размер:</td>
                                                        <td>44</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Длина:</td>
                                                        <td>65 см.</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Ширина:</td>
                                                        <td>70 см.</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="price-block">
                                                    1 шт. х <span id="cart-modal-product-price">Выберите товар</span> р.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- card__info begin -->

                    <!-- card__info end -->
                </div>
            </div>
            <div class="modal-footer">
                <a href="<?= Url::to('/cart/confirm') ?>">
                    <button type="button" class="btn btn-red">Оформить заказ</button>
                </a>
                <a href="<?= Url::to('/cart') ?>">
                    <button type="button" class="btn btn-black">Корзина</button>
                </a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade" id="login">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Вход в учетную запись</h4>
            </div>
            <div class="modal-body">
                <form action="" method="POST" role="form">
                    <div class="form-group">
                        <input type="text" class="form-control" name="" placeholder="Имя пользователя" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="" placeholder="Пароль" required>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> Запомнить меня
                        </label>
                        <a href="#" class="text-red pull-right">Забыли пароль?</a>
                    </div>
                    <button type="submit" class="btn btn-red">Войти</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<div class="modal fade" id="reg">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Регистрация</h4>
            </div>
            <div class="modal-body">
                <form action="" method="POST" role="form">
                    <div class="form-group">
                        <input type="text" class="form-control" name="" placeholder="Имя пользователя" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="" placeholder="E-mail" required>
                    </div>
                    <button type="submit" class="btn btn-red">Регистрация</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- modal -->


<?= $this->renderFile('@frontend/views/partial/contact-form.php'); ?>



<!--

-->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
