<h1>Homepage</h1>
<?php
    if($this->session->is_logged_in){
        echo  $this->session->username;
    }
?>
