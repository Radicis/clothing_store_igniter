<div id="map"></div>

<div class="registration_form">
    <h1>Contact Us</h1>
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
            <?php echo $this->session->flashdata('msg'); ?>

        </div>
    </div>
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


