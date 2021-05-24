<?php include("includes/front_end_header.php");?>
<style>
    .invoice{
        background: #f1f7f9;
        width: 80%;
        margin: 20px auto;
    }
    .logo{
        padding: 11px;   
    }
    .invoice_id h5{
        color: #009247;
        font-weight: bold;
        padding: 10px;
    }
    .invoice_address{
        padding-top: 30px;
        padding-bottom: 20px;
    }
    
    .client_address p{
        font-weight: bold;
        color: #333;
    }
    .freelancer_address p{
        font-weight: bold;
        color: #333;
    }
    label{
        font-size: 14px;
        font-weight: bold;
        color: #009247;
    }
    .invoice_ammount{
        color: #333!important;
        padding-top: 30px;
        
    }
    .invoice_field{
        margin-top: 25px;
    }
    .total_earning{
        background: #009247;
        color: #fff;
    }
    .footer_invoice{
        background: #009247;
        color: #fff;
        padding: 10px;
    }
    
    @media screen and (max-width: 767px){
        .freelancer_address {
            text-align: left;
            padding-top: 15px;
        }
        .invoice_id h5{
            margin-top: 18px;
        }
        label{
            font-size: 13px;
        }
        .invoice{
            width: 92%;
        }
        .first_para{
            display: none;
        }
    }
</style>

    <div class="container-fluid invoice">
        <div class="row ">
            <div class="col-sm-6 col-xs-6">
                <img src="<?php echo base_url() ?>uploads/logo.png" class="logo img-responsive " />
            </div>
            <div class="col-sm-6 col-xs-6 text-right invoice_id">
                <h5>Invoice Id:33366</h5>
            </div>
        </div>
        <div class="row invoice_address">
            <div class="col-sm-6 col-xs-12">
                <div class="row client_address">
                    <div class="col-sm-3">
                        <p>Client Address:</p>
                    </div>
                    <div class="col-sm-4">
                        <p>House no 5 Street 80 G-8/4, Islambad Pakistan</p>
                    </div>
                    
                </div>
            </div>
            <div class="col-sm-6 col-xs-12  ">
               <div class="row freelancer_address text-right">
                    <div class="col-sm-4 col-sm-offset-4">
                        <p>Freelancer Address:</p>
                    </div>
                    <div class="col-sm-4">
                        <p>House no 5 Street 80 G-8/4, KPK Pakistan</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-5">
                <div class="form-group">
                    <label>Job Title</label>
                    <input type="text" name="title" class="form-control" >
                </div>
            </div>
            <div class="col-sm-2 col-sm-offset-5">
                <div class="form-group">
                    <label>Job Title</label>
                    <input type="text" name="title" class="form-control" >
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2">
                <div class="form-group">
                    <label>Job Type</label>
                    <input type="text" name="title" class="form-control" value="Fixed" >
                </div>
            </div>
             <div class="col-sm-2 col-sm-offset-6 col-xs-6 col-xs-offset-2">
                <div class="form-group">
                    <label class="invoice_ammount">Invoice Amount</label> 
                </div>
            </div>
            <div class="col-sm-2 col-xs-4">
                <div class="form-group">
                    <input type="text" name="invo_amount" class="form-control invoice_field" value="£100" >
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2 col-sm-offset-8 col-xs-6 col-xs-offset-2">
                <div class="form-group">
                    <label class="invoice_ammount">Service Charges</label> 
                </div>
            </div>
            <div class="col-sm-2 col-xs-4">
                <div class="form-group">
                    <input type="text" name="serv_charges" class="form-control invoice_field" value="£20" >
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2 col-sm-offset-8 col-xs-6 col-xs-offset-2">
                <div class="form-group">
                    <label class="invoice_ammount">Total Earning</label> 
                </div>
            </div>
            <div class="col-sm-2 col-xs-4">
                <div class="form-group">
                    <input type="text" name="serv_charges" class="form-control invoice_field total_earning" value="£80" >
                </div>
            </div>
        </div>
        <div class="row footer_invoice">
            <p class="first_para">Some sample text for page.Some text for this page.Some sample text for this page.Some sample text for this page.Some sample text for this page.Some sample text for page.</p>
            <p>Some sample text for page.Some text for this page.Some sample text for this page.Some sample text for this page.Some sample text for this page.Some sample text for page.</p>
        </div>
    </div>

<?php include("includes/front_end_footer.php");?>


