<div class="row">
    <div class="col-md-4">
    </div>    
    <div class="col-md-6">
        <a href="<?=base_url('Admin/generateInvoice')?>" class="btn <?php  echo $title == 'Generate Invoice' ? 'btn-primary' : 'btn-light'; ?>">For Client / Contractor</a>
        <a href="<?=base_url('Admin/generateEmployeeInvoice')?>" class="btn <?php  echo $title == 'Generate Employee Invoice' ? 'btn-primary' : 'btn-light'; ?>">For  Employee</a>
    </div>
</div>