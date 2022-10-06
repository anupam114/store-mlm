<style>
    .registration_form {
        background-image: url(../images/bg1.jpg);
        background-repeat: no-repeat;
        background-size: cover;
    }

    #multi-step-form-container {
        margin-top: 5rem;
        margin-bottom: 5rem;
        box-shadow: 0px 0px 30px #000;
        padding: 25px 15px;
        background: #fff;
    }

    .text-center {
        text-align: center;
    }

    .mx-auto {
        margin-left: auto;
        margin-right: auto;
    }

    .pl-0 {
        padding-left: 0;
    }

    .button {
        padding: 0.7rem 1.5rem;
        border: 1px solid #4361ee;
        background-color: #4361ee;
        color: #fff;
        border-radius: 5px;
        cursor: pointer;
    }

    .submit-btn {
        border: 1px solid #0e9594;
        background-color: #0e9594;
    }

    .mt-3 {
        margin-top: 2rem;
    }

    .d-none {
        display: none;
    }

    .form-step {
        border: 1px solid rgba(0, 0, 0, 0.1);
        border-radius: 20px;
        padding: 3rem;
    }

    .font-normal {
        margin-bottom: 50px;
        margin-top: 0;
        text-align: center;
        font-size: 25px;
        font-weight: 600;
    }

    ul.form-stepper {
        counter-reset: section;
        margin-bottom: 3rem;
    }

    ul.form-stepper .form-stepper-circle {
        position: relative;
    }

    ul.form-stepper .form-stepper-circle span {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translateY(-50%) translateX(-50%);
    }

    .form-stepper-horizontal {
        position: relative;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: space-between;
    }

    ul.form-stepper>li:not(:last-of-type) {
        margin-bottom: 0.625rem;
        -webkit-transition: margin-bottom 0.4s;
        -o-transition: margin-bottom 0.4s;
        transition: margin-bottom 0.4s;
    }

    .form-stepper-horizontal>li:not(:last-of-type) {
        margin-bottom: 0 !important;
    }

    .form-stepper-horizontal li {
        position: relative;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-flex: 1;
        -ms-flex: 1;
        flex: 1;
        -webkit-box-align: start;
        -ms-flex-align: start;
        align-items: start;
        -webkit-transition: 0.5s;
        transition: 0.5s;
    }

    .form-stepper-horizontal li:not(:last-child):after {
        position: relative;
        -webkit-box-flex: 1;
        -ms-flex: 1;
        flex: 1;
        height: 1px;
        content: "";
        top: 32%;
    }

    .form-stepper-horizontal li:after {
        background-color: #dee2e6;
    }

    .form-stepper-horizontal li.form-stepper-completed:after {
        background-color: #4da3ff;
    }

    .form-stepper-horizontal li:last-child {
        flex: unset;
    }

    ul.form-stepper li a .form-stepper-circle {
        display: inline-block;
        width: 40px;
        height: 40px;
        margin-right: 0;
        line-height: 1.7rem;
        text-align: center;
        background: rgba(0, 0, 0, 0.38);
        border-radius: 50%;
    }

    .form-stepper .form-stepper-active .form-stepper-circle {
        background-color: #4361ee !important;
        color: #fff;
    }

    .form-stepper .form-stepper-active .label {
        color: #4361ee !important;
        display: inline-block;
        vertical-align: top;
    }

    .form-stepper .form-stepper-active .form-stepper-circle:hover {
        background-color: #4361ee !important;
        color: #fff !important;
    }

    .form-stepper .form-stepper-unfinished .form-stepper-circle {
        background-color: #f8f7ff;
    }

    .form-stepper .form-stepper-completed .form-stepper-circle {
        background-color: #0e9594 !important;
        color: #fff;
    }

    .form-stepper .form-stepper-completed .label {
        color: #0e9594 !important;
    }

    .form-stepper .form-stepper-completed .form-stepper-circle:hover {
        background-color: #0e9594 !important;
        color: #fff !important;
    }

    .form-stepper .form-stepper-active span.text-muted {
        color: #fff !important;
    }

    .form-stepper .form-stepper-completed span.text-muted {
        color: #fff !important;
    }

    .form-stepper .label {
        font-size: 15px;
        margin-top: 0.5rem;
        vertical-align: top;
        display: inline-block;
    }

    .form-stepper a {
        cursor: default;
    }

    .form-step input {
        border: 1px solid #ccc;
        width: 100%;
        padding: 10px 5px;
        outline: none;
        border-radius: 4px;
        margin-bottom: 15px;
    }

    .form-step input::placeholder {
        font-size: 14px;
    }

    .form-step label {
        display: block;
        font-size: 14px;
    }

    .gender {
        padding: 10px 0px;
    }

    .gender label {
        display: inline-block;
    }

    .gender input {
        display: inline-block;
        width: auto;
    }

    .female {
        margin-left: 30px !important;
    }

    .form-step select {
        border: 1px solid #ccc;
        width: 100%;
        padding: 10px 5px;
        outline: none;
        border-radius: 4px;
        margin-bottom: 15px;
    }

    .form-step textarea {
        border: 1px solid #ccc;
        width: 100%;
        padding: 10px 5px;
        height: 70px;
        border-radius: 4px;
        margin-bottom: 15px;
    }

    .upload-file {
        height: 234px;
        border: 1px solid #ccc;
        position: relative;
    }

    .input--file {
        color: #7f7f7f;
        text-align: center;
        font-size: 14px;
        position: absolute;
        top: 42%;
    }

    .input--file i {
        font-size: 20px;
    }

    .input--file input[type="file"] {
        top: 0;
        left: 0;
        opacity: 0;
    }

    .statement {
        display: flex;
        justify-content: space-between;
    }

    .save-file {
        height: 234px;
        border: 1px solid #ccc;
        position: relative;
    }

    .photo-file {
        color: #7f7f7f;
        text-align: center;
        font-size: 18px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -10%);
    }

    .photo-file input[type="file"] {
        top: 0;
        left: 0;
        opacity: 0;
    }
</style>

<!-- Start Page Title Area -->
<div class="page-title-area page-title-bg2">
    <div class="container">
        <div class="page-title-content">
            <h2>Post Your Add</h2>
        </div>
    </div>
</div>
<!-- End Page Title Area -->

<!-- Start Latest Listing Area -->
<section class="listing-area ptb-100">
    <div class="container">
        <div class="col-6">
            <?php echo form_open('auth/login') ?>
                <div class="mb-3">
                    <label class="form-label">Email address</label>
                    <input type="email" class="form-control" name="email">
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="mb-3 form-check">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <?php echo form_close() ?>
        </div>
    </div>
</section>
<!-- End Latest Listing Area -->