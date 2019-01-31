<?php
use yii\helpers\Url;
use yii\bootstrap\Modal;
use app\models\Announcements;
?>

<?php
$announcements = Announcements::find()->where(['id'=> $id])->all();
foreach($announcements as $announcement) 
{
$file = $announcement['attachment'];
echo \yii2assets\pdfjs\PdfJs::widget([
  'url'=> Url::base().$file
]); }?>