

<?php $__env->startSection('title', 'Admin Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-sm-flex text-center justify-content-between align-items-center mb-4">
    <h3 class="mb-sm-0 mb-1 fs-18">Manage Country</h3>
    <ul class="ps-0 mb-0 list-unstyled d-flex justify-content-center">
        <li>
            <a href="<?php echo e(route('admin.index')); ?>" class="text-decoration-none">
                <i class="ri-home-2-line" style="position: relative; top: -1px;"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li>
            <span class="fw-semibold fs-14 heading-font text-dark dot ms-2">Country</span>
        </li>
    </ul>
</div>
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card bg-white border-0 rounded-10 mb-4">
            <div class="card-body p-4">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center border-bottom pb-20 mb-20">
                        <h4 class="fw-semibold fs-18 mb-0">Edit Country</h4>
                    </div>

                    <form action="<?php echo e(route('country.update', $country->id)); ?>" method="POST"
                        enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('post'); ?>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group mb-4">
                                    <label class="label" for="menutitle">Country Name :</label>
                                    <span class="star">*</span>
                                    <div class="form-group position-relative">
                                        <input name="country_name" id="country_name" type="text"
                                            class="form-control text-dark ps-5 h-58"
                                            value="<?php echo e($country->country_name); ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-4">
                                    <label class="label" for="country_name_hindi">Country Name in Hindi :</label>
                                    <span class="star">*</span>
                                    <div class="form-group position-relative">
                                        <input type="text" class="form-control text-dark ps-5 h-58"
                                            name="country_name_hindi" id="country_name_hindi" required
                                            value="<?php echo e($country->country_name_hindi); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-4">
                                    <label class="label" for="texttype">Status :</label>
                                    <span class="star">*</span>
                                    <div class="form-group position-relative">
                                        <select class="form-select form-control ps-5 h-58" name="status" id="status"
                                            required>
                                            <option value="1" class="text-dark"
                                                <?php echo e($country->status == 1 ? 'selected' : ''); ?>>Active</option>
                                            <option value="0" class="text-dark"
                                                <?php echo e($country->status == 0 ? 'selected' : ''); ?>>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex ms-sm-3 ms-md-0">
                                <button class="btn btn-success text-white fw-semibold" type="submit">Update</button>
                                &nbsp;
                                <a href="<?php echo e(route('country.index')); ?>" class="btn btn-secondary text-white">Back</a>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lbsnaa-website\resources\views/admin/manage_country/edit.blade.php ENDPATH**/ ?>