<?php

use yii\helpers\Html;
use yii\helpers\Url;


?>
<div class="modal fade" id="ask">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Задать вопрос</h4>
            </div>
            <div class="modal-body">

                <form action="/" method="GET" role="form">
                    <div class="form-group">
                        <input type="text" class="form-control" name="" placeholder="Имя" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="" placeholder="Телефон" required>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="" placeholder="E-mail" required>
                    </div>
                    <button type="submit" class="btn btn-red">Отправить</button>
                </form>


            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- MODAL END -->