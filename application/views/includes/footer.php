
</div>
</div>
        <?php if($this->session->flashdata('success')){ ?>
            <div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php } if($this->session->flashdata('error')){  ?>
            <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>
            </div>
        <?php } if($this->session->flashdata('warning')){  ?>
            <div class="alert alert-warning">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong>Warning!</strong> <?php echo $this->session->flashdata('warning'); ?>
            </div>
        <?php } if($this->session->flashdata('info')){  ?>
            <div class="alert alert-info">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong>Info!</strong> <?php echo $this->session->flashdata('info'); ?>
            </div>
        <?php } ?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>