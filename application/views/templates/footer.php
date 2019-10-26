<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.3.1.slim.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/popper.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/bootstrap-4.3.1/js/bootstrap.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/slick.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/default.js');?>"></script>
<?php if (isset($scripts) && isset($slug) && !empty($scripts)):?>
    <script src="<?php echo site_url('files/' . $slug . '.js');?>"></script>
<?php endif;?>
</body>
</html>
