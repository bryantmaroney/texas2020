<div class="mobile_view_content">
    <header class="header c-hide">
        <div class="burger_icon">
            <a href="#" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                <img src="<?=base_url()?>assets/images/burger-icon.png" alt="">    
            </a>                   
        </div>             
        <div class="logo">
            <img src="<?=base_url()?>assets/images/logo-mob.png" alt="">
        </div> 
        <div class="collapse navbarToggle" id="navbarToggleExternalContent">
            <ul>
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
                <li><a href="#">Link 3</a></li>
            </ul>
        </div>        
    </header>
    <div class="body_content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="mobile-title">
                        <h1 class="mobile-title-text">
                            FIND YOUR <br>CANDIDATES
                            <p>IN THESE FOUR ELECTIONS</p>
                        </h1>
                        
                    </div>
                    <div class="district_images d-flex flex-wrap">
                        <a href="#"><img src="<?=base_url()?>assets/images/1.png" alt="">
                            <h2>U.S. <br> Senate</h2>
                        </a>
                        <a href="#"><img src="<?=base_url()?>assets/images/2.png" alt="">
                            <h2>U.S. <br> House</h2>
                        </a>
                        <a href="#"><img src="<?=base_url()?>assets/images/3.png" alt="">
                            <h2>Texas <br> house</h2>
                        </a>
                        <a href="#"><img src="<?=base_url()?>assets/images/4.png" alt="">
                            <h2>Texas <br> Senate</h2>
                        </a>
                    </div>
                    <div class="row  d-flex justify-content-center">
                        <div class="col-lg-6 c-hide-d">
                            <h2 class="form_heading">
                                Find your districts and compare <br> your candidates
                            </h2>
                        </div>
                        <div class="col-lg-6 col-md-10">
                            <form class="form_card" method="post" action="home/getInfoStep1">
                                <!-- <input placeholder="Email Address" type="text"> -->
                                <input placeholder="Street Address" type="text" name="address" value="<?=isset($_SESSION['inputs']['address']) ? $_SESSION['inputs']['address'] : '' ?>" required>
                                <div class="d-flex justify-content-between" >
                                    <input class="city" placeholder="City" type="text" name="city" value="<?=isset($_SESSION['inputs']['city']) ? $_SESSION['inputs']['city'] : '' ?>" required>
                                    <input class="zip" placeholder="Zip" type="text" name="zipcode"  pattern=".{5}" title="You can use only 5 digit Zip Code" value="<?=isset($_SESSION['inputs']['zipcode']) ? $_SESSION['inputs']['zipcode'] : '' ?>" required>
                                </div>   
                                <button class="start_btn" type="submit"><i class="fa fa-caret-right" aria-hidden="true"></i> show me candidates</button>
                                <?php 
                                    if($this->session->flashdata('message')) {
                                        echo "<p class='search-message'>" . $this->session->flashdata('message') . "</p>";
                                    }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>