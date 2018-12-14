<?php
use yii\helpers\Url;
use yii\bootstrap\Modal;
use app\models\UsefulAttachments;
?>

<?php
$attachments = UsefulAttachments::find()->where(['id'=> $id])->all();
foreach($attachments as $attachment) 
{
$file = $attachment['attachment'];
echo \yii2assets\pdfjs\PdfJs::widget([
  'url'=> Url::base().$file
]); }?>