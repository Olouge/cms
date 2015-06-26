<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 24.06.2015
 */
/* @var $this yii\web\View */
/* @var $packageModel PackageModel */

use \skeeks\cms\components\marketplace\models\PackageModel;
use \skeeks\cms\models\CmsExtension;
$self = $this;

?>


<? if ($code = \Yii::$app->request->get("code")) : ?>
    <div class="sx-box sx-p-10 sx-mb-10">
    <? if ($packageModel = PackageModel::fetchByCode($code)) : ?>

        <div class="row">
            <div class="col-lg-2">
                <img src="<?= $packageModel->image; ?>" style="width: 100%" />
            </div>
            <div class="col-lg-8">
                <h1><?= $packageModel->name; ?></h1>
                <h2><?= $packageModel->packagistCode; ?></h2>
                <a data-pjax="0" href="<?= $packageModel->url; ?>" class="btn btn-default btn-primary" target="_blank" title="Посмотреть на Маркетплейс (откроется в новом окне)">
                    <i class="glyphicon glyphicon-shopping-cart"></i> Маркетплейс
                </a>

                <? if ($packageModel->isInstalled()) : ?>
                    <a data-pjax="0" href="<?= $packageModel->url; ?>" class="btn btn-default btn-success" target="_blank" title="">
                        <i class="glyphicon glyphicon-ok"></i> Это решение установлено
                    </a>
                <? else : ?>
                    <a data-pjax="0" href="<?= $packageModel->url; ?>" class="btn btn-default btn-danger" target="_blank" title="">
                        <i class="glyphicon glyphicon-download-alt"></i> Установить
                    </a>

                <? endif; ?>

                <p></p>
                <p><?= $packageModel->description_short; ?></p>
            </div>
        </div>
        <? if ($images = $packageModel->images) : ?>
            <div class="row" style="margin-top: 15px;">
                <div class="col-lg-12">
                <h2>Фото и скриншоты</h2>
                <? foreach($images as $image) : ?>
                    <a href="<?= $image; ?>" class="sx-fancybox">
                        <img src="<?= $image; ?>" style="max-width: 300px;"/>
                    </a>
                <? endforeach; ?>
                </div>
            </div>
        <? endif; ?>

        <? if ($videoUrl = $packageModel->getVideoUrl()) : ?>
            <div class="row" style="margin-top: 15px;">
                <div class="col-lg-12">
                    <h2>Видео</h2>
                    <iframe allowfullscreen="" frameborder="0" height="315" src="<?= $videoUrl; ?>" width="560"></iframe>

                </div>
            </div>
        <? endif; ?>

        <div class="row" style="margin-top: 15px;">
              <div class="col-lg-12">

                  <? $form = \skeeks\cms\modules\admin\widgets\form\ActiveFormUseTab::begin(); ?>
                  <?= $form->fieldSet('Описание'); ?>
                      <?= $packageModel->description_full; ?>
                  <?= $form->fieldSetEnd(); ?>

                  <?= $form->fieldSet('Установка'); ?>
                      <?= $packageModel->installHelp; ?>
                  <?= $form->fieldSetEnd(); ?>

                  <?= $form->fieldSet('Поддержка'); ?>
                      <?= $packageModel->support; ?>
                  <?= $form->fieldSetEnd(); ?>

                  <? if ($packageModel->demoUrl) : ?>
                      <?= $form->fieldSet('Демо'); ?>
                          <a href="<?= $packageModel->demoUrl; ?>" target="_blank"><?= $packageModel->demoUrl; ?></a>
                      <?= $form->fieldSetEnd(); ?>
                  <? endif; ?>

                  <? if ($images = $packageModel->images) : ?>
                      <?= $form->fieldSet('Фото и скриншоты'); ?>
                        <div class="row" style="margin-top: 15px;">
                            <div class="col-lg-12">
                            <? foreach($images as $image) : ?>
                                <a href="<?= $image; ?>" class="sx-fancybox">
                                    <img src="<?= $image; ?>" style="max-width: 300px;"/>
                                </a>
                            <? endforeach; ?>
                            </div>
                        </div>
                      <?= $form->fieldSetEnd(); ?>
                <? endif; ?>


                  <? \skeeks\cms\modules\admin\widgets\form\ActiveFormUseTab::end(); ?>
              </div>
          </div>

    <? else: ?>
        Расширение не найдено
    <? endif; ?>
    </div>
<? else : ?>
    <div class="sx-box sx-p-10 sx-mb-10 sx-bg-primary">
        <p>В этом разделе показаны все расширения, которые успешно установлены и используются в вашем проекте.</p>
        <p>Вы так же, можете ознакомиться с версией установленного расширения, посмотреть его в маркетплейс.</p>
    </div>
<? endif; ?>
