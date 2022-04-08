<div class="row">
    <div class="col-md-4">
    </div>    
    <div class="col-md-6">
        <a href="<?=base_url('Admin/projectList')?>" class="btn <?php  echo $title =='Project List' ? 'btn-primary' : 'btn-light'; ?>">Projects</a>
        <a href="<?=base_url('Admin/assignedProjectList')?>" class="btn <?php  echo $title == 'Assigned Project List' ? 'btn-primary' : 'btn-light'; ?>">Projects Details</a>
    </div>
</div>