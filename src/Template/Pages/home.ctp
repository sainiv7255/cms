<html>

<head>
    <title>Form</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,500' rel='stylesheet' type='text/css'>
    <link href='custom.css' rel='stylesheet' type='text/css'>
</head>

<body>

    <div class="container">

        <div class="row">
<div class="col-xl-8" id="timer" data-hours="0" data-minutes="3" data-seconds="0"></div>
            <div class="col-xl-8 offset-xl-2">

              

               
    <?php
                echo $this->Form->create('',[],['id'=>'contact-form']);
                 ?>

               

                    <div class="messages"></div>

                    <div class="controls">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="form_name">Firstname *</label>
                                    <input id="form_name" type="text" name="name" class="form-control" placeholder="Please enter your firstname *" required="required"
                                        data-error="Firstname is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="form_lastname">Lastname *</label>
                                    <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Please enter your lastname *" required="required"
                                        data-error="Lastname is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="form_email">Email *</label>
                                    <input id="form_email" type="email" name="email" class="form-control" placeholder="Please enter your email *" required="required"
                                        data-error="Valid email is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="form_phone">Date Of Birth *</label>
                                    <input id="form_phone" type="date" name="phone" class="form-control" placeholder="Please enter your phone">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="form_message">Message *</label>
                            <textarea id="form_message" name="message" class="form-control" placeholder="Message for me *" rows="4" required="required"
                                data-error="Please, leave us a message."></textarea>
                            <div class="help-block with-errors"></div>
                        </div>


                        <div class="form-group">
                            <div class="g-recaptcha" data-sitekey="6LfKURIUAAAAAO50vlwWZkyK_G2ywqE52NU7YO0S" data-callback="verifyRecaptchaCallback" data-expired-callback="expiredRecaptchaCallback"></div>
                            <input class="form-control d-none" data-recaptcha="true" required data-error="Please complete the Captcha">
                            <div class="help-block with-errors"></div>
                        </div>


                        <input type="submit" class="btn btn-success btn-send" value="Send message">

                       

                    </div>

                      <?php
                   echo $this->Form->end();
              ?>

            </div>
            <!-- /.8 -->

        </div>
        <!-- /.row-->

    </div>
    <!-- /.container-->

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script src="validator.js"></script>
    <script src="contact.js"></script>
	<script>
	$(function () {

    window.verifyRecaptchaCallback = function (response) {
        $('input[data-recaptcha]').val(response).trigger('change')
    }

    window.expiredRecaptchaCallback = function () {
        $('input[data-recaptcha]').val("").trigger('change')
    }

    $('#contact-form').validator();

    $('#contact-form').on('submit', function (e) {
        if (!e.isDefaultPrevented()) {
            var url = "contact.php";

            $.ajax({
                type: "POST",
                url: url,
                data: $(this).serialize(),
                success: function (data) {
                    var messageAlert = 'alert-' + data.type;
                    var messageText = data.message;

                    var alertBox = '<div class="alert ' + messageAlert + ' alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' + messageText + '</div>';
                    if (messageAlert && messageText) {
                        $('#contact-form').find('.messages').html(alertBox);
                        $('#contact-form')[0].reset();
                        grecaptcha.reset();
                    }
                }
            });
            return false;
        }
    })
});



	</script>
	<script>
	/*
** How to use:
*** Create a parent element
*** set id="timer"
*** set data-hours for the hours counter
*** set data-minutes for the hours counter
*** set data-seconds for the hours counter
**** note
** if you dont set data-hours, data-minutes, data-seconds by default these set value 0
** if you dont set data-timer-end by default it's set timer-end
*/

const oneSec = 1000,
      container = document.getElementById('timer');

let dataHours 	= container.getAttribute('data-hours'),
    dataMinutes = container.getAttribute('data-minutes'),
    dataSeconds = container.getAttribute('data-seconds'),
		timerEnd 		= container.getAttribute('data-timer-end'),
		timerOnEndMsg = "data-timer-end";

if (dataHours == '' || dataHours == null || dataHours == NaN) {
  dataHours = "0";
}
if (dataMinutes == '' || dataMinutes == null || dataMinutes == NaN) {
  dataMinutes = "0";
}
if (dataSeconds == '' || dataSeconds == null || dataSeconds == NaN) {
  dataSeconds = "0";
}

let hoursSpan = document.createElement('span'),
    minutesSpan = document.createElement('span'),
    secondsSpan = document.createElement('span'),
    separator1 = document.createElement('span'),
    separator2 = document.createElement('span'),
    separatorValue = ":",
    max = 59,
    s = parseInt(dataSeconds) > max ? max : parseInt(dataSeconds),
    m = parseInt(dataMinutes) > max ? max : parseInt(dataMinutes),
    h = parseInt(dataHours);

secondsSpan.classList.add('time');
minutesSpan.classList.add('time');
hoursSpan.classList.add('time');
separator1.classList.add('separator');
separator1.textContent = separatorValue;
separator2.classList.add('separator');
separator2.textContent = separatorValue;

checkValue = (value)=>{
  if (value < 10) {
    return "0" + value;
  } else {
    return value;
  }
}

hoursSpan.textContent = checkValue(dataHours);
minutesSpan.textContent = checkValue(dataMinutes);
secondsSpan.textContent = checkValue(dataSeconds);

timer = (sv,mv,hv)=>{

  s = parseInt(sv);
  m = parseInt(mv);
  h = parseInt(hv);
  
  if (s > 0) {
    return s -= 1;
  } else {
    s = max;
    if (m > 0) {
      return m -= 1;
    } else {
      m = max;
      if (h > 0) {
        return h -= 1;
      }
    }
  }
}

finished = ()=>{
  max = 0;
	let timerEnd = container.getAttribute(timerOnEndMsg);
	container.setAttribute(timerOnEndMsg, 'true');
	if (timerEnd == '' || timerEnd == null) {
		container.textContent = "timer-end";
	} else {
		container.textContent = timerEnd;
	}
}

counter = setInterval(()=>{

  if (h == 0 && m == 0 && s == 0) {
    clearInterval(counter, finished());
  }

  if (s >= 0) {
    timer(s,m,h);
    hoursSpan.textContent   = checkValue(h);
    minutesSpan.textContent = checkValue(m);
    secondsSpan.textContent = checkValue(s);
  }
}, oneSec);

let children = [hoursSpan, separator1, minutesSpan, separator2, secondsSpan];

for (child of children) {
  container.appendChild(child);
}
	</script>
</body>

</html>