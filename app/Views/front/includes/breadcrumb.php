<style>
    .breadcrumb-item + .breadcrumb-item::before {
        content: none !important;
    }
</style>
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>You Are Here</h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=base_url('/');?>">home</a></li>
                        <li class="breadcrumb-item"> / <?=$title?></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>