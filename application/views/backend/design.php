<div class="row" style="padding:10px 20px;">
	<?php 
	foreach($shoe->result() as $row){ ?>
		<div class="col-xs-3 text-center">
			<a href="<?php echo base_url("custom/design_admin_detail/".$row->shoe_id); ?>" style="color:#000;">
			<img src="<?php echo base_url("uploads/shoe/".$row->shoe_path); ?>" alt="<?php echo $row->shoe_name;?>" style="max-width:100%;"/>
			<h2 style="font-family:Tekton Pro; font-size:15px;"><?php echo $row->shoe_name;?></h2>
			</a>
		</div>
	<?php
	} ?>
  </div>