<div class="row">
    <div class="col-md-4">
    </div>    
    <div class="col-md-6">
        <a href="<?=base_url('Admin/projectFinancialDetails')?>" class="btn <?php  echo $title =='Project Financial Details' ? 'btn-primary' : 'btn-light'; ?>">Project Details</a> 
        <a href="<?=base_url('Admin/clientFinancialDetails')?>" class="btn <?php  echo $title == 'Client Financial Details' ? 'btn-primary' : 'btn-light'; ?>">Client</a>
        <a href="<?=base_url('Admin/contractorFinancialDetails')?>" class="btn <?php  echo $title == 'Contractor Financial Details' ? 'btn-primary' : 'btn-light'; ?>">Contractor</a>
        <a href="<?=base_url('Admin/employeeFinancialDetails')?>" class="btn <?php  echo $title == 'Employee Financial Details' ? 'btn-primary' : 'btn-light'; ?>">Employee</a>
    </div>
</div>