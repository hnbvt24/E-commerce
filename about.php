<?php include 'header.php';?>
<script src="https://maps.googleapis.com/maps/api/js?v=3.
      exp&sensor=false"></script>
<!-- Main Content of the page -->
        <main>

            <!-- Add a minimum-width attribute to css in all these boxes? So it won't conitnue to get smaller....-->

                <figure class="pic">
                    <img src="images/sweettreats-secondslide.png" alt="Sweet Treats">
                </figure>
                
                <!-- About Us Section -->
                <div id="about" class="about bgAboutGreen">
                    <section class="row">
                        <div class="text">
                            <h1>About Us</h1>
                            <div class="material">
                                <div class="aboutPic animation-element slide-left col-sm-offset-1 col-sm-4 col-xs-12">
                                    <img src="images/haley.jpg" alt="Creator of this site">
                                </div>
                                <div class="col-sm-offset-1 col-sm-6 col-xs-12">
                                <p>This is an imaginary bake-shop of which I deemed the name "Sweet Treats".
                                    This website is a project that I have created in my Independent Study
                                    at Virginia Tech. The goal of this project was to learn how to better
                                    create and design a website, and to learn to create an e-commerce website.
                                    Through this project, I have learned how to better structure my pages,
                                    use php and javascript to create dynamic pages, and the overall idea
                                    of how to design and build a website for a business who would want to make
                                    their products available online to a wider range of users.
                                    This site allows a user to enter in shipping/billing information, which gets
                                    stored in a database, but none of the information that is stored is used for 
                                    any personal gain except that it is only for the purposes of testing to make
                                    sure the site does in fact work properly.
                                    This site does not actually sell baked goods or any item and is a ficticious
                                    store. Please do not submit real information.
                                    I hope you enjoy viewing this website!</p>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div id="menu" class="menu bgWhite">
                    <section class="row">
                        <div>
                            <h1>Menu</h1>
                            <div class="material">
                                <div class="animation-element slide-left menu col-sm-7 col-xs-12">
                                    <img src="images/menu_items.png" alt="menu">
                                </div>
                                <div class="icon col-sm-offset-1 col-sm-3 col-xs-12 text-center">
                                    <h2>Store Hours:</h2>
                                    <h3>
                                        Mon-Fri: 7:30am - 9pm<br/>
                                        Saturday: 10am - 9pm<br/>
                                        Sunday: 11am-5pm
                                    </h3>
                                    <div>
                                        <img src="images/menu.png" alt="menu-icon">
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6 remove-padding">
                                        <form action="images/menu_items.png" method="get">
                                            <button type="submit" formtarget="_blank" class="btn btn-default">Printable Menu</button>
                                        </form>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6 remove-padding">
                                        <form action="store.php" method="get">
                                            <button type="submit" class="btn btn-default">Online Store</button>
                                        </form>
                                    </div>
                                
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div id="location" class="bgTan">
                    <section class="row">
                        <div class="text">
                            <h1>Location</h1>
                            <div class="material">
                                <div id="map" class=" col-sm-6 col-xs-12">
                                    <iframe class="col-sm-12" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" width="600" height="400" src="https://maps.google.com/maps?hl=en&q=307 Washington St. SW, Blacksburg, VA 24060&ie=UTF8&t=roadmap&z=16&iwloc=B&output=embed"><div><small><a href="http://embedgooglemaps.com">embedgooglemaps.com</a></small></div><div><small><a href="http://www.premiumlinkgenerator.com/">premiumlinkgenerator.com</a></small></div></iframe>
                                <em style="margin-left: 15px;">This is not an actual location for Sweet Treats.</em>
                                </div>
                                <div class="location col-sm-offset-1 col-sm-5 col-xs-12">
                                    <p>Visit Sweet Treat's store, located in Blacksburg, Virginia. Treat yourself to a variety of different sweets or a large bundle of the same kind. Our in-store location has a few extra items not yet hosted online and we offer more exclusive discounts and giveaways for those who visit us in the store.</p>
                                    <address>
                                        Sweet Treats<br/>
                                        307 Washington St.<br/>
                                        Blacksburg, VA 24060
                                    </address>

                                    <div class="city">
                                        <img src="images/city-street.png" alt="town">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div id="contact" class="bgWhite">
                    <section class="row">
                        <div class="text">
                                <h1>Contact Us</h1>
                                <div class="material">
                                    <div class="pull-left col-sm-5 col-xs-12">
                                        <p>If you have questions, concerns, suggestions, or would like to just say hello, please fill out the contact form and we'll get back to you soon. We appreciate your comments and love to get feedback from our customers!<br/><br/>
                                            Feel free to also call or email us:<br/>
                                            <span>sweettreats@vt.edu | 540-555-1234</span>
                                        </p>
                                        <h2>Catering/Special Request:</h2>
                                        <p>Planning a birthday party, annicersary, wedding, graduation? We provide catering for events with a variety of any combination of our baked goods, and made YOUR WAY! Click the link below to fill out our catering form to be eligible for our services at your event and we will be in contact with you soon.</p>
                                        <div>
                                                <div class="col-xs-4 col-sm-3 col-md-4 remove-padding">
                                                    <form method="get" action="thank-you.php">
                                                        <input type="submit" class="btn btn-default" name="cateringsubmit" value="Catering Form">
                                                    </form>
                                                </div>
                                                <div class="col-xs-4 col-sm-3 col-sm-offset-2 col-md-4 col-md-offset-0 remove-padding">
                                                    <form method="get" action="special-order.php">
                                                        <input type="submit" class="btn btn-default" name="submitspecial" value="Special Request">
                                                    </form>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            <div class="pull-left col-md-offset-1 col-sm-6 col-xs-12">
                                    <form class="normalform" method="request" action="thank-you.php">
                                        <div class="row">
                                            <div class="form-group">
                                                <label for="inputName">Name</label>
                                                <input type="text" class="form-control required" id="inputName" placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <label for="inputEmail">Email</label>
                                                <input type="text" class="form-control required" id="inputEmail" placeholder="Email">
                                                <span style="color:red;" id="errorEmail"></span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <label for="subject">Subject</label>
                                                <select class="form-control required" id="subject">
                                                    <option value="">Select Subject</option>
                                                    <option value="question">Question</option>
                                                    <option value="specialRequest">Special Request</option>
                                                    <option value="suggestion">Suggestion</option>
                                                    <option value="other">Other</option>
                                                </select>
                                                <span style="color:red;" id="errorSubject"></span>
                                            </div>      
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <label for="inputComment">Comment</label>
                                                <textarea class="form-control required" rows="5" id="inputComment" placeholder="What would you like to tell us?"></textarea>
                                                <span style="color:red;" id="errorComment"></span>
                                            </div>
                                            <button id="contactsubmit" type="submit" class="btn btn-default" name="contactsubmit">Submit</button>
                                            </div>
                                    </form>
                            </div>
                        </div>
                    </section>
                </div>
        </main>
<?php include 'footer.php';?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">
//Check to make sure all required form fields are filled in.
//Found code structure at JQuery By Example --- http://www.jquerybyexample.net/2012/12/jquery-to-check-all-textboxes-empty.html
$(document).ready(function() {
    $('#contactsubmit').click(function(e) {
      var isValid = true;
      $('input[type="text"].required').each(function() {
         if ($.trim($(this).val()) == '') {
             isValid = false;
             $(this).css({
                 "border": "1px solid #ff0000",
                 "background": "#efefef"
             });
         } else {
             $(this).css({
                 "border": "",
                 "background": ""
         });
       }
    });

    // Check to see if Subject is selected
   
        if($('#subject').val() == '') {
            isValid = false;
            document.getElementById('errorSubject').innerHTML = "Please choose a Subject<br/>";
        } else {
            document.getElementById('errorSubject').innerHTML = "";
        } 

    // Check to see if Subject is selected
    
        if($('#inputComment').val() == '') {
            isValid = false;
            document.getElementById('errorComment').innerHTML = "Please write us what you're thinking.<br/>";
        } else {
            document.getElementById('errorComment').innerHTML = "";
        } 

    // Reg Expressions to validate the form inputs
        var emailReg = /^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        var email = document.getElementById('inputEmail').value;

    //Check new email
    if(! emailReg.test(email)) {
            isValid = false;
            document.getElementById('errorEmail').innerHTML = 'Please type in correct email (i.e. john@gmail.com)';
        } else {
            document.getElementById('errorEmail').innerHTML = '';
        }

    if (isValid == false) {
           e.preventDefault();
       } else { 
       }
    });
});      

//Code from CSS-Tricks Chris Coyier https://css-tricks.com/snippets/jquery/smooth-scrolling/
$(function() {
    $('a[href*=#]:not([href=#])').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
            if (target.length) {
                $('html,body').animate({
                scrollTop: target.offset().top
                }, 1000);
                return false;
            }
        }
    });
});

//Add animation to page, float in images from sides of pages or fade in by Simon Codrington http://www.sitepoint.com/scroll-based-animations-jquery-css3/
    var $animation_elements = $('.animation-element');
    var $window = $(window);

    function check_if_in_view() {
      var window_height = $window.height();
      var window_top_position = $window.scrollTop();
      var window_bottom_position = (window_top_position + window_height);
     
      $.each($animation_elements, function() {
        var $element = $(this);
        var element_height = $element.outerHeight();
        var element_top_position = $element.offset().top;
        var element_bottom_position = (element_top_position + element_height);
     
        //check to see if this current container is within viewport
        if ((element_bottom_position >= window_top_position) &&
            (element_top_position <= window_bottom_position)) {
          $element.addClass('in-view');
        } else {
          $element.removeClass('in-view');
        }
      });
    }

    $window.on('scroll resize', check_if_in_view);
    $window.trigger('scroll');
</script>