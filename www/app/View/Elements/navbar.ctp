<ul class="nav navbar-nav">
  <li <?php if($this->params['controller']=='musics') echo 'class="active"'; ?>>
    <?php echo $this->Html->link(
      'Musiques',
      array(
        'controller' => 'musics',
        'action' => 'index'
      )
    );?>
  </li>
  <li <?php if($this->params['controller']=='artists') echo 'class="active"'; ?>>
    <?php echo $this->Html->link(
      'Artistes',
      array(
        'controller' => 'artists',
        'action' => 'index'
      )
    );?>
  </li>
  <li <?php if($this->params['controller']=='kinds') echo 'class="active"'; ?>>
    <?php echo $this->Html->link(
      'Genres',
      array(
        'controller' => 'kinds',
        'action' => 'index'
      )
    );?>
  </li>
  <li <?php if($this->params['controller']=='labels') echo 'class="active"'; ?>>
    <?php echo $this->Html->link(
      'Labels',
      array(
        'controller' => 'labels',
        'action' => 'index'
      )
    );?>
  </li>
  <li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Mon Compte<b class="caret"></b></a>
    <ul class="dropdown-menu">
      <li><a href="#">Modifier profil</a></li>
      <li>
        <?php echo $this->Html->link(
          'Se déconnecter',
          array(
            'controller' => 'users',
            'action' => 'logout'
          )
        );?>
      </li>
    </ul>
  </li>
</ul>