<div class="col-md-3 left_col">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
      <a href="main.php" class="site_title"><i class="fa fa-paw"></i> <span><?=COMPANY?></span></a>
    </div>

    <div class="clearfix"></div>

    <!-- menu profile quick info -->
    <a href="profile.php?info=me">
      <div class="profile clearfix">
        <div class="profile_pic">
          <img src="image/<?=find('admin',$_SESSION['user'],'img') ?>" alt="..." class="img-circle profile_img">
        </div>
        <div class="profile_info">
          <span>Welcome,</span>
          <h2><?=ucwords(find('admin',$_SESSION['user'],'name'))?></h2>
        </div>
      </div>
    </a>
    <!-- /menu profile quick info -->

    <br />

    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
          <li><a><i class="fa fa-sliders"></i>Manage<span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="category.php">Category</a></li>
              <li><a href="owner.php">Owner</a></li>
              <li><a href="gallery.php">Gallery</a></li>
              <li><a href="social.php">Social Links</a></li>
              <li><a href="post.php">Posts</a></li>
              <li><a href="comment.php">Comments</a></li>

            </ul>
          </li>

        </ul>
      </div>


    </div>
    <!-- /sidebar menu -->

    <!-- /menu footer buttons -->
    <div class="sidebar-footer hidden-small">
      <a data-toggle="tooltip" data-placement="top" title="Settings">
        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="FullScreen">
        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="Lock">
        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="Logout" href="logout.php">
        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
      </a>
    </div>
    <!-- /menu footer buttons -->
  </div>
</div>