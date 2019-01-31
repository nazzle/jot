<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
?>
    <!-- login area start -->
            <div class="login-box ptb--100">
                <form action="<?= Url::to(['site/login'])?>" method="Post">
                    <div class="login-form-head">
                        <h1>Judiciary Of Tanzania</h1>
                        <h4>Sign In (For Only Authenticated Staff)</h4>
                        <p>Hello there, Sign in using credentials from Administrator</p>
                    </div>
                    <div class="login-form-body">
                        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                        <?= $form->field($model, 'password')->passwordInput() ?>

                        <?= $form->field($model, 'rememberMe')->checkbox() ?>

                        <div style="color:#999;margin:1em 0">
                            If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
                        </div>

                        <div class="submit-btn-area">
                            <?= Html::submitButton('Login <i class="fa fa-send"></i>', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                        </div>

                       <?php ActiveForm::end(); ?>
                        <div class="form-footer text-center mt-5">
                            <p class="text-muted">Don't have an account? <a href="register.html">Contact Admin</a></p>
                        </div>
                    </div>
                </form>
            </div>
    <!-- login area end -->
