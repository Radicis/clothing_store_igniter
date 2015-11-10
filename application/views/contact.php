


<div class="contact">
    <div class="contact_left">
        <div class="contact_info">
            <h3>Find Us Here</h3>
            <div id="map" class="map">
                <iframe width="100%" height="175" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Lighthouse+Point,+FL,+United+States&amp;aq=4&amp;oq=light&amp;sll=26.275636,-80.087265&amp;sspn=0.04941,0.104628&amp;ie=UTF8&amp;hq=&amp;hnear=Lighthouse+Point,+Broward,+Florida,+United+States&amp;t=m&amp;z=14&amp;ll=26.275636,-80.087265&amp;output=embed"></iframe><br><small><a href="https://maps.google.co.in/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Lighthouse+Point,+FL,+United+States&amp;aq=4&amp;oq=light&amp;sll=26.275636,-80.087265&amp;sspn=0.04941,0.104628&amp;ie=UTF8&amp;hq=&amp;hnear=Lighthouse+Point,+Broward,+Florida,+United+States&amp;t=m&amp;z=14&amp;ll=26.275636,-80.087265" style="color:#242424;text-shadow:0 1px 0 #ffffff; text-align:left;font-size:12px;padding: 5px;">View Larger Map</a></small>
            </div>
        </div>
        <div class="company_address">
            <h3>Company Information :</h3>
            <p>500 Blank Street,</p>
            <p>Cork,</p>
            <p>Ireland</p>
            <p>Phone:(021) 222 666 444</p>
            <p>Fax: (021) 000 00 00 0</p>
            <p>Email: <a href="mailto:info@clothesigniter.com">ingo@clothesigniter.com</a></p>
            <p>Follow on: <a href="#">Facebook</a>, <a href="#">Twitter</a></p>
        </div>
    </div>
    <div class="contact_right">
        <div class="contact-form">
            <h3>Contact Us</h3>
            <div class="registration_form">
                <?php $attributes = array("class" => "form-horizontal", "name" => "contactform");
                echo form_open("site/contact", $attributes);?>

                <div class="form-group">
                    <input class="form-control" name="name" placeholder="Your Full Name" type="text" value="<?php echo set_value('name'); ?>" />
                    <span class="text-danger"><?php echo form_error('name'); ?></span>
                </div>

                <div class="form-group">
                    <input class="form-control" name="email" placeholder="Your Email" type="email" value="<?php echo set_value('email'); ?>" />
                    <span class="text-danger"><?php echo form_error('email'); ?></span>
                </div>

                <div class="form-group">
                    <input class="form-control" name="subject" placeholder="Subject" type="text" value="<?php echo set_value('subject'); ?>" />
                    <span class="text-danger"><?php echo form_error('subject'); ?></span>
                </div>

                <div class="form-group">
                    <textarea class="form-control" name="message" placeholder="Your Message"><?php echo set_value('message'); ?></textarea>
                    <span class="text-danger"><?php echo form_error('message'); ?></span>
                </div>

                <div class="form-group">
                    <input name="submit" type="submit" class="green-button" value="Send" />
                </div>

                <?php echo form_close(); ?>


            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>





<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD169v2fy1ptsLoahXLOpN5zVZqRpKy3co&v=3.21"></script>

<script>

    var map;

    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 53.41291, lng: -8.24389},
            zoom: 8
        });
        var marker = new google.maps.Marker({
            position: {lat: 53.41291, lng: -8.24389},
            map: map,
            title: 'Clothes Igniter!'
        });

    }

    initMap();


</script>


