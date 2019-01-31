<?php
use yii\helpers\Url;
use yii\bootstrap\Modal;
use app\models\HakiBulletin;

$this->title = 'Document View';
?>

<?php
$HakiBulletins = HakiBulletin::find()->where(['id'=> $id])->all();
foreach($HakiBulletins as $HakiBulletin) 
{
$file = $HakiBulletin['attachment'];
echo \yii2assets\pdfjs\PdfJs::widget([
  'url'=> Url::base().$file
]); }?>