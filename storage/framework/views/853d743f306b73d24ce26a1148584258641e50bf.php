

<?php $__env->startSection('title', 'Admin Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-sm-flex text-center justify-content-between align-items-center mb-4">
    <h3 class="mb-sm-0 mb-1 fs-18">Manage Survey</h3>
    <ul class="ps-0 mb-0 list-unstyled d-flex justify-content-center">
        <li>
            <a href="<?php echo e(route('admin.index')); ?>" class="text-decoration-none">
                <i class="ri-home-2-line" style="position: relative; top: -1px;"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li>
            <span class="fw-semibold fs-14 heading-font text-dark dot ms-2">Survey</span>
        </li>
    </ul>
</div>
<div class="card bg-white border-0 rounded-10 mb-4">
    <div class="card-body p-4">
        <div class="d-sm-flex text-center justify-content-between align-items-center border-bottom pb-20 mb-20">
            <h4 class="fw-semibold fs-18 mb-sm-0">Survey</h4>
            
            <a href="<?php echo e(route('survey.create')); ?>">
                <button class="border-0 btn btn-success py-2 px-3 px-sm-4 text-white fs-14 fw-semibold rounded-3">
                    <span class="py-sm-1 d-block">
                        <i class="ri-add-line text-white"></i>
                        <span>Add Survey</span>
                    </span>
                </button>
            </a>
        </div>
        <div class="default-table-area members-list">
    <div class="table-responsive">
        <table class="table align-middle" id="myTable">
            <thead>
                <tr class="text-center">
                    <th class="col">#</th>
                    <th class="col">Survey Title</th>
                    <th class="col">Start Date </th>
                    <th class="col">Expire Date </th>
                    <th class="col">language</th>
                    <th class="col">Actions</th>
                    <th class="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $survey; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                        <td><?php echo e($loop->iteration); ?></td> <!-- Auto-incrementing index -->
                            <td><?php echo e($record->survey_title); ?></td>
                            <td><?php echo e($record->start_date); ?></td>
                            <td><?php echo e($record->end_date); ?></td>
                            <td><?php echo e($record->language == 1 ? 'English' : 'Hindi'); ?></td>
                            <td>
                                <a href="<?php echo e(route('survey.edit', $record->id)); ?>" class="btn bg-success text-white btn-sm">Edit</a>
                                <form action="<?php echo e(route('survey.destroy', $record->id)); ?>" method="POST" style="display:inline;">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="btn btn-sm btn-primary text-white">Delete</button>
                                </form>
                            </td>
                            <td><div class="form-check form-switch">
            <input class="form-check-input status-toggle" type="checkbox" role="switch"  data-table="manage_surveys" 
            data-column="status" data-id="<?php echo e($record->id); ?>" <?php echo e($record->status ? 'checked' : ''); ?>>
          </div></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>
    </div>
</div>

<?php $__env->stopSection(); ?> 

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lbsnaa-website\resources\views/admin/manage_survey/index.blade.php ENDPATH**/ ?>