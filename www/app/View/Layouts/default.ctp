<?php
/**
 *
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('bootstrap-theme');
		echo $this->Html->css('bootstrap-theme.min');
		echo $this->Html->css('bootstrap');
		echo $this->Html->css('bootstrap.min');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>


	<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Live Mix Helper</a>
        </div>

        <div class="navbar-collapse collapse">
        	<?php if (AuthComponent::user('id')): ?>
    			<?php echo $this->element('navbar'); ?>
    		<?php endif; ?>

			<?php if (!AuthComponent::user('id')): ?>
	          <?php echo $this->Form->create('User', array(
	          	'class'=>"navbar-form navbar-right",
	          	'url' => array('controller' => 'users','action'=>'login')
	          )); ?>
	            <div class="form-group">
	              <?php echo $this->Form->input('username', array(
	              	'class'=>"form-control",
	          		'value'=>"username",
	          		'label'=>false)); ?>
	            </div>
	            <div class="form-group">
	              <?php echo $this->Form->input('password', array(
	              	'class'=>"form-control",
	          		'value'=>"password",
	          		'label'=>false)); ?>
	            </div>
	            <button type="submit" class="btn btn-success">Log in</button>
	          </form>
    		<?php endif; ?>
        </div><!--/.navbar-collapse -->
      </div>
    </div>

    

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <?php echo $this->Session->flash(); ?>
      <div class="container">
        <?php echo $this->fetch('content'); ?>
        <!--<p><a class="btn btn-primary btn-lg" role="button">Learn more &raquo;</a></p>-->
      </div>
    </div>

    <!--
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h2>Heading</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2>Heading</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
       </div>
        <div class="col-md-4">
          <h2>Heading</h2>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
      </div>
    </div>
  	-->

    <hr>

	
	<footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
    	<p>&copy; 2013 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
    </footer>
	
	<?php echo $this->element('sql_dump'); ?>
  	<?php debug($this->Session->read()); ?>

  	<?php echo $this->Html->script('https://code.jquery.com/jquery-1.10.2.min.js'); ?>
  	<?php echo $this->Html->script('bootstrap.min'); ?>

</body>
</html>
