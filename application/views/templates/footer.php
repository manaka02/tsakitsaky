<div class="span_11">
		<div class="col-md-6 col_4">
			<!-- <link rel="stylesheet" href="css/clndr.css" type="text/css" /> -->
			<script src="<?php echo base_url();?>assets/js/underscore-min.js" type="text/javascript"></script>
			<script src= "<?php echo base_url();?>assets/js/moment-2.2.1.js" type="text/javascript"></script>
			<script src="<?php echo base_url();?>assets/js/clndr.js" type="text/javascript"></script>
			<script src="<?php echo base_url();?>assets/js/site.js" type="text/javascript"></script>
			<!----End Calender -------->
		</div>


   </div>
    <!-- /#wrapper -->
    <!-- Bootstrap Core JavaScript -->
    <link href="<?php echo base_url();?>assets/css/jqvmap.css" rel='stylesheet' type='text/css' />
    <script src="<?php echo base_url();?>assets/js/jquery.vmap.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.vmap.sampledata.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.vmap.world.js" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: '#333333',
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#666666',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#C8EEFF', '#006491'],
                normalizeFunction: 'polynomial'
            });
        });
    </script>
    <!-- <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script> -->
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/parsley.js"></script>
</body>
</html>
