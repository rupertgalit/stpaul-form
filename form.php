<div class="modal fade ngForm-container" id="exampleModal" style="display:none;" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header text-center justify-content-center w-100">
                <h1 class="modal-title" id="exampleModalLabel">Topup Request</h1>
            </div>
            <div class="modal-body">
                 <form id="basic-info-frm" method="POST" action="https://apipay.netglobalsolutions.cn/api/v3/payment-gateway/create_order"> 
				
<!--					<form id="basic-info-frm" method="POST" action="https://apipay-mortis.netglobalsolutions.cn/api/v3/payment-gateway/create_order">-->
					
					<?php
						$pid = isset($_GET['pid']) ? $_GET['pid'] : time();
						$first_name = isset($_GET['first_name']) ? $_GET['first_name'] : NULL;
						$last_name = isset($_GET['last_name']) ? $_GET['last_name'] : NULL;
						$mobile_num = isset($_GET['mobile_num']) ? $_GET['mobile_num'] : NULL;
						$email_address = isset($_GET['email_address']) ? $_GET['email_address'] : NULL;
						$amount = isset($_GET['amount']) ? $_GET['amount'] : NULL;
					?>
					
					<input type="hidden" name="page_source" value="<?php echo $_GET['pogo'] ?? 1; ?>">
					
                    <input class="form-control mb-3" type="text" id="external_id" name="external_id" value="<?php //echo $pid; ?>" placeholder="Enter Member Account" required="">
                    <input class="form-control mb-3" type="text" id="fname" name="fname" value="<?php echo $first_name; ?>" placeholder=" First and Last Name" required="">
                    <input class="form-control mb-3" type="hidden" id="lname" name="lname" value="<?php echo $last_name; ?>" placeholder="Last Name" >
                    <input class="form-control mb-3" type="hidden" id="contnumber" name="contnumber" placeholder="Mobile" value="<?php echo $mobile_num; ?>">
                    <input class="form-control mb-3" type="hidden" id="emailaddress" name="emailaddress" value="<?php echo $email_address; ?>"
                        placeholder="安全邮箱 - Email" pattern="[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]+" required="">
                    <div class="input-group mb-3">
						<input class="form-control" type="number" id="basic-amount" name="amount"
                        value="<?php if(isset($_GET['amount'])){echo $_GET['amount'];}?>" placeholder="Amount"
                        required="">
						<span class="input-group-text">USD</span>
					</div>
					<span hidden id="exchangeWrapper" class="d-none text-center"><span class="exchange-amount fw-bold"></span></span>

                    <!-- ALISIN RAW -->
                    <!-- <div class="ngForm-quickAmounts d-flex">
								<div class="quickAmount flex-fill">1000</div>
								<div class="quickAmount flex-fill">500</div>
								<div class="quickAmount flex-fill">100</div>
								<div class="quickAmount flex-fill">50</div>
								<div class="quickAmount flex-fill">10</div>
							</div> -->

                    <!-- <p class="ngForm-notes text-center">Some helpful reminders on depositing.</p> -->
                    <div class="ngForm-submit text-center mt-3">
                        <button id="basic-info-btn" type="submit">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
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
<?php }