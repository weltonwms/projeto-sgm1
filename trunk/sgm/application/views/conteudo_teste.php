

<script src="<?php echo base_url('assets/plugins/jquery.cycle.all.js')?>"></script>
 
 
<script type="text/javascript" charset="utf-8">
$(document).ready(function(){
  $('#slide').cycle( {
    sync:  false,
    fx: 'zoom'
  } );
});
</script>

<div id="slide">
     <img src="<?php echo base_url('assets/imgs/logo1.png')?>"  width="580" height="200" />
        <img src="<?php echo base_url('assets/imgs/logo1.png')?>" width="580" height="200" />
</div>
