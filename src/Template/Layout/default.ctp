<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Field Day Logging';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('main.css?V=' . time()); ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>

    <script src="/js/main.js?v=<?= time(); ?>" type="text/javascript"></script>
    <?= $this->fetch('script') ?>

</head>
<body>
    <div class="top-bar row expanded" data-topbar role="navigation">

        <div class="columns large-9">
            <h1><?= $config->club_call; ?> <?= $config->class; ?> <?= $config->section; ?></h1>
        </div>
        <div class="columns large-1 pull-right">
            <h2><?= $config->station_name; ?></h2>
        </div>
        <div class="columns large-2 pull-right">
            <?= $this->html->link(__('<i class="fi-wrench"></i> Configure Station'), ['controller'=>'radios', 'action'=>'configure'], ['class'=>'button secondary pull-right middle', 'escape'=>false]); ?>
        </div>
    </div>

    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
        
        
    </footer>
</body>

</html>
