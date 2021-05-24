<?php include("includes/front_end_header.php");?>
<style>
    .verify{
        background: #fff;
        width: 80%;
        margin: 20px auto;
        padding: 40px;
        box-shadow: 0 0 10px -3px grey;
    }
   .accept_btn{
        border: 1px solid #009247;
        padding: 12px 35px;
        font-size: 15px;
        background: #fff;
   }
   .verify label{
       font-weight: bold;
   }
   .condation{
       font-size: 15px!important;
   }
   
   @media screen and (max-width: 500px) and (min-width: 340px){
       .verify{
           width: 92%;
           padding-top: 10px;
       }
       .verify h2{
           font-size: 20px;
           
           font-weight: bold;
       }
       .verify p{
           font-size: 12px;
           padding-bottom: 10px;
       }
       .condation{
           font-size: 12px!important;
       }
       .accept_btn{
             padding: 6px 16px;
            font-size: 12px;
       }
   }
   
</style>

    <div class="container-fluid verify">
       <div class="row">
           <h2>Verify Personal Information</h2>
           <p>Before Accepting the agreement, you must first verify your personal information</p>
       </div>
       <div class="row">
           <form>
                <div class="row form-group">
                   <div class="col-sm-6">
                       <label>First Name</label>
                       <input type="text" name="f_name" class="form-control" >
                   </div>
                   <div class="col-sm-6">
                       <label>First Name</label>
                       <input type="text" name="f_name" class="form-control" >
                   </div>
                </div>
                <div class="row form-group">
                   <div class="col-sm-6">
                       <label>Coampny Name(optional)</label>
                       <input type="text" name="company_name" class="form-control" >
                   </div>
                   <div class="col-sm-6">
                       <label>Address</label>
                       <input type="text" name="adress" class="form-control" >
                   </div>
               </div>
               <div class="row form-group">
                   <div class="col-sm-6">
                       <label>Coampny Name(optional)</label>
                       <input type="text" name="company_name" class="form-control" >
                   </div>
                   <div class="col-sm-6">
                       <label>CITY/Country</label>
                       <input type="text" name="country" class="form-control" >
                   </div>
               </div>
               <div class="row form-group">
                   <div class="col-sm-11 condation">
                       <input type="checkbox" name="company_name"  >
                       I ACKNOWLEDGE THAT THE INFORMATION PROVIDE ABOVE IS TRUE AND ACCEPT AND AGREE TO THE TERMS OF THE <span style="color: #009247;">NON-DISCLOUSER AGREEMENT.</span>
                   </div>
        
               </div>
               <div class="row form-group">
                   <div class="col-sm-2">
                       <input type="submit" name="submit"  value="ACCEPT" class="btn accept_btn" >
                      
                   </div>
        
               </div>
           </form>
       </div>
    </div>

<?php include("includes/front_end_footer.php");?>


