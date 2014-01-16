<div class="page-header">
	<div class="row">
		<div class="col-md-10">
			<h2><?php echo __($title); ?></h2>
		</div>
		<div class="col-md-2">
			<?php if(isset($add)): ?>
			<a href="/<?php echo $this->request->controller;?>/add">
				<button type="button" class="btn btn-default"><?php echo $add;?></button>
			</a>
			<?php endif; ?>
			<?php if(isset($edit) && isset($id)): ?>
			<a href="/<?php echo $this->request->controller;?>/edit/<?php echo $id;?>">
				<button type="button" class="btn btn-default"><?php echo $edit;?></button>
			</a>
			<?php endif; ?>
			<?php if(isset($del) && isset($id)): ?>
			<a href="/<?php echo $this->request->controller;?>/delete/<?php echo $id;?>">
				<button type="button" class="btn btn-default"
					onclick="if (confirm(&quot;Are you sure you want to delete # 8?&quot;)) { document.post.submit(); } event.returnValue = false; return false;"><?php echo $del;?></button>
  				
			</a>
			<?php endif; ?>
		</div>
	</div>
</div>