<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <!--<a class="navbar-brand" href="#">GLAMME.ID</a>-->
      <?=anchor(base_url(), 'GLAMME.ID', ['class'=>'navbar-brand'])?>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <!--<ul class="nav navbar-nav">
        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
     <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>-->
      <ul class="nav navbar-nav navbar-right">
        <li><?php echo anchor(base_url(), 'Home');?></li>
        <?php if($this->session->userdata('username')) { ?>
        <li><?php echo anchor('customer/payment_confirmation', 'Payment Confirmation');?></li>
        <li><?php echo anchor('customer/shopping_history', 'History');?></li>
        <?php } ?>
        <!--<li>
          <a href="#">
            <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
            Inside Cart: <?=$this->cart->total_items();?>  items
          </a>
        </li>-->

        <li>
          <?php
            $text_cart_url = '<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>';
            $text_cart_url .= ' Inside Cart: ' . $this->cart->total_items() .' items';
          ?>
          <?=anchor('welcome/cart', $text_cart_url)?>
        </li>
        <!--<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>-->
        <?php if($this->session->userdata('username')) {?>
          <li><div style="line-height:50px;"> You Are: <?=$this->session->userdata('username')?></li>
          <li><?php echo anchor('logout', 'Logout');?></li>
        <?php } else { ?>
          <li>
            <?php echo anchor('login', 'Login');?>
          </li>
          <?php } ?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>