<!-- NAVIGATION -->
<nav id="navigation">
    <!-- container -->
    <div class="container">
        <!-- responsive-nav -->
        <div id="responsive-nav">
            <!-- NAV -->
            <ul class="main-nav nav navbar-nav">
                <li class="<?php echo ($this->uri->segment(1) == 'user' && $this->uri->segment(2) == '') ? 'active' : ''; ?>">
                    <a href="<?php echo base_url('user'); ?>">Home</a>
                </li>
                <li class="<?php echo ($this->uri->segment(2) == 'catalogue') ? 'active' : ''; ?>">
                    <a href="<?php echo base_url('user/catalogue'); ?>">Catalogue</a>
                </li>
                <li class="<?php echo ($this->uri->segment(2) == 'about') ? 'active' : ''; ?>">
                    <a href="<?php echo base_url('user/about'); ?>">About Us</a>
                </li>
            </ul>
            <!-- /NAV -->
        </div>
        <!-- /responsive-nav -->
    </div>
    <!-- /container -->
</nav>
<!-- /NAVIGATION -->
