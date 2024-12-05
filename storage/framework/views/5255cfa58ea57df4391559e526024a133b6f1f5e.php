
<?php $__env->startSection('title', 'Admin Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-sm-flex text-center justify-content-between align-items-center mb-4">
    <h3 class="mb-sm-0 mb-1 fs-18">All Vacancy</h3>
    <ul class="ps-0 mb-0 list-unstyled d-flex justify-content-center">
        <li>
            <a href="<?php echo e(route('admin.index')); ?>" class="text-decoration-none">
                <i class="ri-home-2-line" style="position: relative; top: -1px;"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li>
            <span class="fw-semibold fs-14 heading-font text-dark dot ms-2">Vacancy</span>
        </li>
    </ul>
</div>
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card bg-white border-0 rounded-10 mb-4">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center border-bottom pb-20 mb-20">
                <h4 class="fw-semibold fs-18 mb-0">Add Vacancy</h4>
            </div>
            <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
                <form action="<?php echo e(route('manage_vacancy.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        
                        <div class="col-lg-2">
                            <div class="form-group mb-4">
                                <label class="label" for="language">Language :</label>
                                <span class="star">*</span>
                                <div class="form-group position-relative">
                                    <input class="form-check-input" type="radio" name="language" value="1">
                                    <label class="form-check-label" for="english">
                                        English
                                    </label>
                                    <input class="form-check-input" type="radio" name="language" value="2">
                                    <label class="form-check-label" for="hindi">
                                        Hindi
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!-- New Dropdown for Research Centre -->
                        <div class="col-lg-5">
                            <!-- New Dropdown for Research Centre -->
                        <div class="form-group mb-4">
                            <label for="research_centre_id" class="label">Select Research Centre *</label>
                            <select name="research_centre" id="research_centre_id" class="form-control text-dark ps-5 h-58" required>
                                <option value="">Select Research Centre</option>
                                <?php $__currentLoopData = $researchCentres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($id); ?>"><?php echo e($name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        </div>

                        
                        <div class="col-lg-5">
                            <div class="form-group mb-4">
                                <label class="label" for="job_title">Job Title :</label>
                                <span class="star">*</span>
                                <div class="form-group position-relative">
                                    <input type="text" class="form-control text-dark ps-5 h-58" name="job_title"
                                        id="job_title">
                                </div>
                            </div>
                        </div>
                            <!-- Job Description with Textarea -->
                        <div class="col-lg-12">
                            <div class="form-group mb-4">
                                <label class="label" for="job_description">Job Description :</label>
                                <span class="star">*</span>
                                <textarea 
                                    class="form-control" 
                                    name="job_description" 
                                    id="job_description" 
                                    rows="5"></textarea>
                            </div>
                        </div>


                        <div class="col-lg-6">
                            <div class="form-group mb-4">
                                <label class="label" for="content_type">Content Type :</label>
                                <span class="star">*</span>
                                <div class="form-group position-relative">
                                    <select class="form-select form-control ps-5 h-58" name="content_type" id="content_type" required>
                                        <option value="" class="text-dark">Select</option>
                                        <option value="PDF" class="text-dark">PDF File Upload</option>
                                        <option value="Website" class="text-dark">Website URL</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6" id="document_upload" style="display:none;">
                            <div class="form-group mb-4">
                                <label class="label" for="document_upload">Document Upload :</label>
                                <span class="star">*</span>
                                <div class="form-group position-relative">
                                    <input type="file" class="form-control text-dark ps-5 h-58" name="document_upload"
                                        id="document_upload">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6" id="website_link" style="display:none;">
                            <div class="form-group mb-4">
                                <label class="label" for="website_link">Website Link :</label>
                                <span class="star">*</span>
                                <div class="form-group position-relative">
                                    <input type="url" class="form-control text-dark ps-5 h-58" name="website_link"
                                        id="website_link">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6" id="document_upload">
                            <div class="form-group mb-4">
                                <label class="label" for="publish_date">Publish Date :</label>
                                <span class="star">*</span>
                                <div class="form-group position-relative">
                                    <input type="date" class="form-control text-dark ps-5 h-58" name="publish_date"
                                        id="publish_date" value="<?php echo e(old('publish_date')); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6" id="website_link">
                            <div class="form-group mb-4">
                                <label class="label" for="expiry_date">Expiry Date :</label>
                                <span class="star">*</span>
                                <div class="form-group position-relative">
                                    <input type="date" class="form-control text-dark ps-5 h-58" name="expiry_date"
                                        id="expiry_date" value="<?php echo e(old('expiry_date')); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mb-4">
                                <label class="label" for="texttype">Product Status:</label>
                                <span class="star">*</span>
                                <div class="form-group position-relative">
                                    <select class="form-select form-control ps-5 h-58" name="status" id="status" required>
                                        <option value="" class="text-dark">Select</option>
                                        <option value="1" class="text-dark">Active</option>
                                        <option value="0" class="text-dark">Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex ms-sm-3 ms-md-0">
                            <button class="btn btn-success text-white fw-semibold" type="submit">Submit</button> &nbsp;
                            <a href="<?php echo e(route('manage_vacancy.index')); ?>" class="btn btn-secondary text-white">Cancel</a>
                        </div>
                    </div>
                </form>


            </div>
        </div>
    </div>
</div>


    <script>
	    document.getElementById('content_type').addEventListener('change', function() {
	        var contentType = this.value;
	        
	        if (contentType === 'PDF') {
	            document.getElementById('document_upload').style.display = 'block';
	            document.getElementById('website_link').style.display = 'none';
	        } else if (contentType === 'Website') {
	            document.getElementById('website_link').style.display = 'block';
	            document.getElementById('document_upload').style.display = 'none';
	        } else {
	            document.getElementById('document_upload').style.display = 'none';
	            document.getElementById('website_link').style.display = 'none';
	        }
	    });
	</script>
    <script src="<?php echo e(asset('admin_assets/js/ckeditor.js')); ?>"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

<script>
    ClassicEditor
    .create( document.querySelector( '#job_description' ) )
    .catch( error => {
    console.error( error );
    });
</script>

<?php $__env->stopSection(); ?>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        let today = new Date().toISOString().split('T')[0];
        
        const startDateInput = document.querySelector('input[name="publish_date"]');
        const endDateInput = document.querySelector('input[name="expiry_date"]');
        
        // Set min date for both start and end date on page load
        startDateInput.setAttribute('min', today);
        endDateInput.setAttribute('min', today);

        // Update end date min whenever start date is changed
        startDateInput.addEventListener('change', function() {
            endDateInput.setAttribute('min', this.value);
        });
    });
</script>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lbsnaa-website\resources\views/admin/micro/manage_vacancy/create.blade.php ENDPATH**/ ?>