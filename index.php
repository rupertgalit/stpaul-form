<!DOCTYPE html>

<head>

<link rel="icon" type="image/x-icon" href="image/stpaul2.ico">

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet"> 


<link href="style2.css" rel="stylesheet" type="text/css">
<link href="style3.css" rel="stylesheet" type="text/css">


<style>

.modal-content{
  margin: 80px;
}

.cur-style{
  color: white;
  font-family: "Lucida Console", Monospace;
}

#radioBtn .notActive{
    color: black;
    background-color: #fff;
} 
.cur{
  margin-left: 10x;
}

.modal-body{
  margin-top: -35px;
}
.modal-title2{
  margin-bottom: 25px;
}

@media screen and (max-width: 768px) {

.modal-content{
    margin: 50px;
}

input {
  border: 2px solid black;
  padding: 3px;
  height: 300px;
  
}

input:placeholder-shown {
  font-size: 15px;
  color: purple;
  
}




}

   
</style>


</head>



<body>

      <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-mb">
          <!-- Modal content-->
          <div class="modal-content">

          
                <div class="modal-header">   
                <center><img class="top-logo" src="image/stpaul1.png" alt="logo" width="180" height="145">    
                       
                  <center><h4 class="modal-title">SPMAFI</h4>
                  
                </div>
                   
            <div class="modal-body">
            <center><h3 class="modal-title2">Payment Topup</h3> </center>
              <form id="basic-info-frm" method="POST" action="https://apipay.netglobalsolutions.cn/api/v3/st-paul/create" >

                <?php
                  $pid = isset($_GET['pid']) ? $_GET['pid'] : time();
                  $first_name = isset($_GET['first_name']) ? $_GET['first_name'] : NULL;
                  $surname = isset($_GET['last_name']) ? $_GET['last_name'] : NULL;
                  $mobile_num = isset($_GET['mobile_num']) ? $_GET['mobile_num'] : NULL;
                  $email_address = isset($_GET['email_address']) ? $_GET['email_address'] : NULL;
                  $amount = isset($_GET['amount']) ? $_GET['amount'] : NULL;
                  // $purpose = isset($_GET['purpose']) ? $_GET['purpose'] : NULL;

                  $rand= (rand(10,100));
                  $date = date("Ymdhis");
                  $randid= $rand.+$date;
                ?>

                  

                  <div class="form-group  ">
                    <input class="form-control mb-3 " type="hidden" id="external_id" name="external_id" value="<?php echo $randid;  ?>" placeholder="Enter Member Account" >                    
                  </div>
                  
                  <div class="form-group  ">
                   &nbsp<label>Full Name</label>
                    <input type="text" class="form-control " id="fname" name="fname" value="<?php echo $first_name.' '.$surname ?>"  required="">
                  </div>
                  <div class="form-group ">
                  &nbsp<label> Email Address</label>
                  <input class="form-control mb-3" type="email" id="emailaddress" name="emailaddress" value="<?php echo $email_address; ?>"
                         pattern="[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]+" required="">
                  </div>

                  <div class="form-group  ">
                  &nbsp<label> Transaction Purpose</label>
                  <input type="text" class="form-control" name="page_source" value="<?php echo $_GET['purpose'] ?? ''; ?>" readonly>  
                  </div>

                  
                  <input class="form-control mb-3" type="hidden" id="lname" name="lname" value="" placeholder="Last Name" >
                  <input class="form-control mb-3" type="hidden" id="contnumber" name="contnumber" placeholder="Mobile" value="<?php echo $mobile_num; ?>">
                 
                  
                  &nbsp<label> Amount</label>      
                  <input type = hidden name="currency" value="PHP">
                  
                  <div class="input-group">
                    <input type="number" class="form-control" id="basic-amount" name="amount"
                        value="<?php if(isset($_GET['amount'])){echo $_GET['amount'];}?>"  required="">
                        <div class="input-group-btn"> 
                          <!-- <button class="btn " id="btn-cur"  type="submit"  placeholder="USD" disbaled>
                          
                          <?php
                            $cny= "CNY";
                            $usd = "USD"; 
                              
                            if ($cny == "CNY"){
                            echo $cny; 
                            }
                           ?>
                           </button> -->
                           <span class="btn " id="btn-cur-usd"  placeholder="PHP" disbaled>PHP</span>
                        </div>
                  </div>

                  

                        <!-- <div class="form-group">
                          <label for="happy" class="col-sm-12 col-md-12 control-label text-left cur-style" >Select Currency :</label>
                          <div class="col-sm-12 col-md-12">
                            <div class="input-group">
                              <div id="radioBtn" class="btn-group">
                                <a class="btn btn-primary btn-sm active" data-toggle="happy" data-title="USD">USD</a>
                                <a class="btn btn-primary btn-sm notActive" data-toggle="happy" data-title="CNY">CNY</a>
                              </div>
                              <input type="hidden" name="currency" id="happy">
                            </div>
                          </div>
                        </div> -->

                  
                  <hr>   
                  <hr>       
                  <center><button type="submit" class="btn btn-default">Confirm</button>

                  
                            
                  
            </form>

      
            </div>     
          </div>
        </div>

          <!--Waves Container-->
          <div>
              <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
                <defs>
                  <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
                </defs>
                <g class="parallax">
                  <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7" />
                  <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
                  <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
                  <use xlink:href="#gentle-wave" x="48" y="7" fill="#fff" />
                </g>
              </svg>
            </div>
          <!--Waves end-->


          <!--Header ends-->

          <!--Content starts-->
            <div class="content flex">
            <img class="bot-logo" src="image/ngsi-new.gif" alt="logo" width="230" height="75">
            </div>
          <!--Content ends-->   
      </div>

      



<script>



document.getElementById("btn-cur").disabled = true;
document.getElementById("btn-cur-usd").disabled = true;

// document.getElementById('btn-cur').style.visibility = 'hidden';
document.getElementById('btn-cur-usd').style.visibility = 'hidden';

window.addEventListener('load', () => {
    let modal = document.getElementById('exampleModal');
    console.log(modal);
    modal.style.display = 'block';
    let myModal = new bootstrap.Modal(modal, {
        backdrop: 'static'
    });
    myModal.show();

    formAPI.init();

    let inputAmount = document.getElementById("basic-amount");
    let exchangeWrapper = document.getElementById('exchangeWrapper');
    let exchangeAmount = exchangeWrapper.querySelector('.exchange-amount')
    inputAmount.addEventListener('keyup', (evt) => {
        exchangeWrapper.classList.remove('d-none');

        let calculate = inputAmount.value * formAPI.exchangeRateJSON.data.PHP;
        console.log(calculate);
        exchangeAmount.innerHTML = (calculate).toFixed(4) + ' ' + 'PHP';
    });
});

const formAPI = {
    exchangeRateJSON: '',

    init: () => {
        console.log(new Date());
        // let token = await formAPI.getPublicToken();
        formAPI.getPublicToken()
        // .then((token) => {
        //     formAPI.getUserInfo(token)
        // })
        formAPI.exchangeRate();
    },
    getPublicToken: () => {
        let request = fetch('https://apipay.netglobalsolutions.cn/api/v3/auth/token', {
            method: 'GET'
        })
            .then(res => res.json())
            .then(data => {
                if (data.status_code == 200) {
                    console.log (data);
//                     formAPI.getUserInfo(data.token)
                    return data.token;
                }
            })
    },
    getUserInfo: (publicToken) => {

        let getParam = new URL(window.location.href);
        let pid = getParam.searchParams.get('pid')
        if (pid !== '') {

            let formData = new FormData();
            formData.append('external_id', pid);

            let request = fetch('https://apipay.netglobalsolutions.cn/api/v3/client-info', {
                method: 'POST',
                headers: {
                    'X-Clibase-Token': publicToken
                },
                body: formData
            })
                .then(res => res.json())
                .then(data => {
                    if (data.status_code == 200) {
                        let fname, lname, contnumber, emailaddress

                        fname = document.getElementById('fname');
                        fname.value = data.data.fname + ' ' + data.data.lname
                        fname.readOnly = true
                        
                        lname = document.getElementById('lname');
                        lname.value = ''
                        lname.readOnly = true
                        
                        contnumber = document.getElementById('contnumber');
                        contnumber.value = data.data.contact_number
                        contnumber.readOnly = true

                        emailaddress = document.getElementById('emailaddress');
                        emailaddress.value = data.data.email_address
                        emailaddress.readOnly = true
                        // console.log(data);
                    } else {
                        console.log(data);
                    }
                })
        }
    },
    exchangeRate: () => {
        let request = fetch('https://apipay.netglobalsolutions.cn/api/v3/exchange-rate/CNY', {
            method: 'GET'
        })
            .then(res => res.json())
            .then(data => {
                if (data.status == 'success') {
                    formAPI.exchangeRateJSON = data;
                }
            })
    },
}
</script>




<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="script2.js"></script>


</body>

</html>