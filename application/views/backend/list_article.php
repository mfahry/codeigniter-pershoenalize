<script>
	$(document).ready(function(){
		$("#colors #list-customer a").click(function(){
			var dataUrl = $(this).attr("rel");
			var title = $(this).attr("title");
			if(title == "delete"){
				$("#modal-form-delete-one").modal();
				$("#modal-form-delete-one #link-to-delete").attr("href",dataUrl);
			}else{
				$("#modal-form-one .modal-content").load(dataUrl);
				$("#modal-form-one").modal();
			}
			
		});
	});
	
	function paging(startWith, limit, dataUrl){
		$("#colors").hide();
		$("#colors").load(dataUrl+"?start_with="+startWith+"&limit="+limit);
		$("#colors").show(1000);
	}
</script>
<div id="list-customer">
	<div class="table-responsive">
		<table class="table" width="100%">
			<thead>
				<tr>
					<th style="color:rgba(30, 135, 75, 0.95); font-size:15px; font-family:'Broadway'"><center>#</center></th>
					<th style="color:rgba(30, 135, 75, 0.95); font-size:15px; font-family:'Broadway'"><center>ARTICLE ID</center></th>
					<th style="color:rgba(30, 135, 75, 0.95); font-size:15px; font-family:'Broadway'"><center>ARTICLE TITLE</center></th>
					<th style="color:rgba(30, 135, 75, 0.95); font-size:15px; font-family:'Broadway'"><center>FOR PAGE</center></th>
					<th style="color:rgba(30, 135, 75, 0.95); font-size:15px; font-family:'Broadway'"><center>RELATED ARTICLE</center></th>
					<th style="color:rgba(30, 135, 75, 0.95); font-size:15px; font-family:'Broadway'"><center>THUMBNAIL PATH</center></th>
					<th style="color:rgba(30, 135, 75, 0.95); font-size:15px; font-family:'Broadway'" colspan="2"><center>ACTION</center></th>
				</tr>
			</thead>
			<tbody>
				<?php
				if($article->num_rows() > 0)
				{
					$no = 1;
					foreach($article->result()  as $row)
					{ ?>
						<tr style="font-family:Candara; font-size:13px; padding:5px;">
							<td class="text-center"><?php echo $no++; ?></td>
							<td><?php echo $row->article_id; ?></td>
							<td><?php echo $row->article_title; ?></td>
							<td><?php echo $row->for_page; ?></td>
							<?php
								$sql=mysql_query("SELECT article_id_related FROM article_related WHERE article_id='$row->article_id'");
								$data=mysql_fetch_array($sql);
								
								$id=$data['article_id_related'];
								
								$sql1=mysql_query("SELECT article_title FROM article WHERE article_id='$id'");
								$data1=mysql_fetch_array($sql1);
								if($id > 0){
							?>
							<td><?php echo $data1['article_title']; ?></td>
							<?php }else{ ?>
							<td><?php echo "No Related Article"; ?></td>
							<?php } ?>
							<td><a href="<?php echo base_url("uploads/article/".$row->thumbnail_path); ?>"><?php echo $row->thumbnail_path; ?></a></td>
							<td align="center"><a rel="<?php echo base_url("article/edit?article_id=".$row->article_id); ?>" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span> Edit</a></td>
							<td align="center"><a rel="<?php echo base_url("article/delete?article_id=".$row->article_id); ?>" class="btn btn-danger" title="delete"><span class="glyphicon glyphicon-remove"></span> Delete</a></td>
						</tr>	
					<?php
					}
				} 
				else
				{ ?>
					<tr>
						<td colspan="6" align="center"><i>empty data. please create new data </i></td>
					</tr>
				<?php
				} ?>
			</tbody>
		</table>
	</div>
	<div class="text-center bg-warning" style="margin:10px 0px; padding:10px;s">
		<!--<a rel="<?php //echo base_url("color/add"); ?>" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Add data</a>-->
	</div>
</div>

<ul class="pager">
	<?php
	/*if($count <= 10){}	
	else if($start_with > 0 && ($start_with+10) < $count){ ?>
		<li class="previous" style="cursor:pointer;"><a onclick="paging('<?php echo ($start_with-10); ?>','10','<?php echo base_url("color/view")?>')">&larr; Older</a></li>
		<li class="next" style="cursor:pointer;"><a onclick="paging('<?php echo ($start_with+10); ?>','10', '<?php echo base_url("color/view")?>')">Newer &rarr;</a></li>
	<?php
	}
	else if($start_with == 0){?>
		<li class="next" style="cursor:pointer;"><a onclick="paging('<?php echo ($start_with+10); ?>','10','<?php echo base_url("color/view")?>')">Newer &rarr;</a></li>
	<?php
	} 
	else { ?>
		<li class="previous" style="cursor:pointer;"><a onclick="paging('<?php echo ($start_with-10); ?>','10','<?php echo base_url("color/view")?>')">&larr; Older</a></li>
	<?php
	}*/?>
</ul>

<div class="modal fade" id="modal-form-one" tabindex="-1" role="dialog" aria-labelledby="modal-form-one-label" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title" id="modal-form-one-label" style="color:rgba(30, 135, 75, 0.95); font-size:17px; font-family:'Broadway'" class="text-justify">Group part</h4>
		  </div>
		  <div class="modal-body">
			Hallo
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			<button type="button" class="btn btn-primary">Save changes</button>
		  </div>
		</div>
	</div>
</div>	

<div class="modal fade" id="modal-form-delete-one" tabindex="-1" role="dialog" aria-labelledby="modal-form-delete-one-label" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title" id="modal-form-delete-one-label" style="color:rgba(30, 135, 75, 0.95); font-size:17px; font-family:'Broadway'" class="text-justify">Confirmation</h4>
		  </div>
		  <div class="modal-body">
				<p style="font-family:Candara; font-size:13px;">Are you sure for delete this item ?</p>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			<a class="btn btn-danger" href="" id="link-to-delete">Delete</a>
		  </div>
		</div>
	</div>
</div>
