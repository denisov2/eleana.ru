<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/eleana/img/logo.png" style="height: 50px; width: 50px; max-width: 50px; border-radius:15%;"
                     class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Администратор</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Поиск..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Меню', 'options' => ['class' => 'header']],

                    [
                        'label' => 'Магазин',
                        'icon' => 'fa fa-share',
                        'url' => '#',


                        'items' => [
                            ['label' => 'Продукты', 'icon' => 'fa fa-dashboard', 'url' => ['/shop/product']],
                            ['label' => 'Заказы (приход)', 'icon' => 'fa fa-dashboard', 'url' => ['/shop/incoming']],
                            ['label' => 'Типы цен', 'icon' => 'fa fa-dashboard', 'url' => ['/shop/price-type']],
                            ['label' => 'Склады', 'icon' => 'fa fa-dashboard', 'url' => ['/shop/stock']],
                            ['label' => 'Производители', 'icon' => 'fa fa-dashboard', 'url' => ['/shop/producer']],
                            ['label' => 'Категории', 'icon' => 'fa fa-dashboard', 'url' => ['/shop/category']],
                            ['label' => 'Дополнитеьные поля', 'icon' => 'fa fa-dashboard', 'url' => ['/field/field']],

                        ],
                    ],

                    ['label' => 'Заказы', 'url' => ['/order/order']],

                    [
                        'label' => 'Управление контентом',
                        'icon' => 'fa fa-share',
                        'url' => '#',


                        'items' => [
                            ['label' => 'Список страниц', 'icon' => 'fa fa-dashboard', 'url' => ['/page']],
                            ['label' => 'Создать страницу', 'icon' => 'fa fa-dashboard', 'url' => ['/page/create']],
                            ['label' => 'Меню', 'icon' => 'fa fa-dashboard', 'url' => ['#']],


                        ],
                    ],


                    [
                        'label' => 'Покупатели',
                        'icon' => 'fa fa-share',
                        'url' => ['/user/admin'],

                    ],

                    ['label' => 'Настройки сайта', 'url' => ['/config']],

                    ['label' => 'Перейти к витрине', 'url' => '/'],


                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],

                    /*
                    [
                        'label' => 'Пример вложенности',
                        'icon' => 'fa fa-share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii'],],
                            ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug'],],
                            [
                                'label' => 'Level One',
                                'icon' => 'fa fa-circle-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Level Two', 'icon' => 'fa fa-circle-o', 'url' => '#',],
                                    [
                                        'label' => 'Level Two',
                                        'icon' => 'fa fa-circle-o',
                                        'url' => '#',
                                        'items' => [
                                            ['label' => 'Level Three', 'icon' => 'fa fa-circle-o', 'url' => '#',],
                                            ['label' => 'Level Three', 'icon' => 'fa fa-circle-o', 'url' => '#',],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    */
                ],
            ]
        ) ?>

    </section>

</aside>
