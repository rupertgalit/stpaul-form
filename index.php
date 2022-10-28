<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>St. Paul University Philippines- Donation Form</title>

  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/style2.css">

  <style>
    

  </style>


</head>
<body>
    <!--Hey! This is the original version
of Simple CSS Waves-->


<div class="header">

    <!--Content before waves-->
    <div class="inner-header flex">
        <br>
        <br>
    
        <div class="main-block">
            <br>

            <div>
             
            </div>

            <img class="top-logo" src="assets/image/stpaullogo.png" alt="flowers" width="280" height="128">
            <h1>Donation Top Up</h1>

            

        <form id="basic-info-frm" method="POST" action="https://apipay.netglobalsolutions.cn/api/v3/st-paul/create">


        <?php
			$pid = isset($_GET['pid']) ? $_GET['pid'] : time();
			$first_name = isset($_GET['first_name']) ? $_GET['first_name'] : NULL;
			$last_name = isset($_GET['last_name']) ? $_GET['last_name'] : NULL;
			$mobile_num = isset($_GET['mobile_num']) ? $_GET['mobile_num'] : NULL;
			$email_address = isset($_GET['email_address']) ? $_GET['email_address'] : NULL;
			$amount = isset($_GET['amount']) ? $_GET['amount'] : NULL;

            $rand= (rand(10,100));
            $date = date("Ymdhis");
            $randid= $rand.+$date;
		?>


        <hr>
        <!-- <div class="account-type">
          <input type="radio" value="none" id="radioOne" name="account" checked/>
          <label for="radioOne" class="radio">Personal</label>
          <input type="radio" value="none" id="radioTwo" name="account" />
          <label for="radioTwo" class="radio">Company</label>
        </div> -->
        
        <hr>
        <input type="hidden" name="page_source" value="<?php echo $_GET['pogo'] ?? 1; ?>">
					
                    <input class="form-control mb-3" type="hidden" id="external_id" name="external_id" value="<?php echo $randid;  ?>" placeholder="Enter Member Account" >
                    <input class="form-control mb-3" type="text" id="fname" name="fname" value="<?php echo $first_name; ?>" placeholder=" First and Last Name" required="">
                    <input class="form-control mb-3" type="hidden" id="lname" name="lname" value="<?php echo $last_name; ?>" placeholder="Last Name" >
                    <input class="form-control mb-3" type="hidden" id="contnumber" name="contnumber" placeholder="Mobile" value="<?php echo $mobile_num; ?>">
                    <input class="form-control mb-3" type="text" id="emailaddress" name="emailaddress" value="<?php echo $email_address; ?>"
                    
                        placeholder=" Email" pattern="[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]+" required="">

                        <input type = hidden name="currency" value="CNY">
                    <div class="input-group mb-3">
                      <textarea class="form-control mb-3" placeholder="Message"></textarea>
						<input class="form-control" type="number" id="basic-amount" name="amount"
                        value="<?php if(isset($_GET['amount'])){echo $_GET['amount'];}?>" placeholder="Amount"
                        required="">
						<span class="input-group-text">USD</span>
					</div>
					<span hidden id="exchangeWrapper" class="d-none text-center"><span class="exchange-amount fw-bold"></span></span>
        
          <!-- <input type="text" name="external_id" id="external_id" placeholder="ID" required/> -->
        <!-- <label id="icon" for="name"><i class="fas fa-envelope"></i></label> -->
        <!-- <input type="text" name="fname" id="fname" placeholder="Name" required/> -->
        <!-- <label id="icon" for="name"><i class="fas fa-user"></i></label> -->
        <!-- <input type="email" name="emailaddress" id="emailaddress" placeholder="email" required/> -->

        <!-- <textarea rows="3" cols="50" name="comment" placeholder="Message" ></textarea> -->

        <!-- <label id="icon" for="name"><i class="fas fa-unlock-alt"></i></label> -->
        <!-- <input type="number" name="basic-amount" id="basic-amount" placeholder="Amount" required/>
        <span>USD</span> -->
        <br>
        
        
        <hr>
        
        <hr>
        <div class="btn-block">
          <!-- <p>By clicking Register, you agree on our <a href="https://www.w3docs.com/privacy-policy">Privacy Policy for W3Docs</a>.</p> -->
          <button type="submit" >Submit</button>
        </div>
      </form>

      </div>

    </div>

    
    <!--Waves Container-->
    <div>
    <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
    viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
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
    

    </div>
    <!--Header ends-->
    
    <!--Content starts-->
    <div class="content flex">
      <!-- <p>By.Goodkatz | Free to use </p> --> 
      <img class="top-logo" src="assets/image/ngsi.jpg" alt="logo" width="210" height="100">
      <br>
    </div>
    <!--Content ends-->


</body>



<script>
window.addEventListener('load', () => {
    

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
                body: formDatas
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


</html>