<div class="row">
    <div class="col-md-4">
    </div>    
    <div class="col-md-6">
        <a href="<?=base_url('Admin/employeeContactList')?>" class="btn <?php  echo $title =='Employee Contact List' ? 'btn-primary' : 'btn-light'; ?>">Employee</a>
        <a href="<?=base_url('Admin/contractorContactList')?>" class="btn <?php  echo $title == 'Contractor Contact List' ? 'btn-primary' : 'btn-light'; ?>">Contractor</a>
        <a href="<?=base_url('Admin/clientContactList')?>" class="btn <?php  echo $title == 'Client Contact List' ? 'btn-primary' : 'btn-light'; ?>">Client</a>
    </div>
</div>