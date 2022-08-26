<?php include "nav.php" ?>
 
<script>
        $(function () {
            
            $('#message').keyup(function () {
    var characterCount = $(this).val().length,
        current = $('#current_message'),
        maximum = $('#maximum_message'),
        theCount = $('#the-count_message');
    var maxlength = $(this).attr('maxlength');
    var changeColor = 0.75 * maxlength;
    current.text(characterCount);

    if (characterCount > changeColor && characterCount < maxlength) {
        current.css('color', '#FF4500');
        current.css('fontWeight', 'bold');
    }
    else if (characterCount >= maxlength) {
        current.css('color', '#B22222');
        current.css('fontWeight', 'bold');
    }
    else {
        var col = maximum.css('color');
        var fontW = maximum.css('fontWeight');
        current.css('color', col);
        current.css('fontWeight', fontW);
    }

});

            });
    </script>  

   
    <script type="text/javascript">
    function addHiddenField(formID, name, value)
{
	var input = document.createElement("input");
	input.setAttribute("type", "hidden");
	input.setAttribute(name, "name_you_want");
	input.setAttribute(value, "value_you_want");
	document.getElementById(formID).appendChild(input);
}

function GetCookie(cookie_name)
{
  if (document.cookie.length>0)
    {
    cookie_start=document.cookie.indexOf(cookie_name + "=");
    if (cookie_start!=-1)
      { 
      cookie_start=cookie_start + cookie_name.length+1; 
      cookie_end=document.cookie.indexOf(";",cookie_start);
      if (cookie_end==-1) cookie_end=document.cookie.length;
      return unescape(document.cookie.substring(cookie_start,cookie_end));
      } 
    }
  return "";
}

function str_replace(search, replace, subject) {
	return subject.split(search).join(replace);
}
    </script>


    <!-- DAFORMJSBEGIN -->
    <!-- JSCAPTCHAREFRESH -->

    <script type="text/javascript">

        function SetCookieValues() {
          
}

    function SetCookies() {
      
}

    </script>


    <script type="text/javascript">
function chkFormular()
{


	return true;
}
</script>


    <!-- JSCRIPT2 -->
    <!-- DAFORMJSEND -->
    
</head>
<body onLoad="SetCookieValues();">
  
<div class="container mainContainer" style="width:70%"> 
<!-- FORMTITLE_BEGIN -->
<div class="row">
    <div class="col-md-12"> 
        <br>
      <h1 class="text-center">Contact Us</h1>
    </div>
</div>
<!-- FORMTITLE_END -->


  <form action="https://www.ekiwi-scripts.de/form/v4/formmail_v4.php" method="POST" name="DAFORM" onSubmit="SetCookies();return chkFormular();" enctype="multipart/form-data" target="_self">
  <input type="hidden" name="formid" value="986731">
  <input type="hidden" name="settings" value="cXZ7ZHJrY2Vicg==">
  <input type="hidden" name="redirect" value="https://omkalpatarucarriers.com.np/thanks.php">
  <input type="hidden" name="subject" value="Contact us">
  <input type="hidden" name="admin" value="f3Z6dns5enZ/cmR/IyJXcHp2fns5dHh6">
  <input type="hidden" name="admin1" value="">
  <input type="hidden" name="admin2" value="">
  <input type="hidden" name="typemail" value="html">
  <input type="hidden" name="crypt" value="1">
  <input type="hidden" name="conf_csv" value="0">
  <input type="hidden" name="conf_csv2" value="0">
  <input type="hidden" name="einleittext" value="">
  <input type="hidden" name="conf_MailtextEnd" value="">
  <input type="hidden" name="copyfields" value="-1">  
  <input type="hidden" name="copyip" value="-1">
  <input type="hidden" name="hide_empty_fields" value="0">
  <input type="hidden" name="settings_encoding" value="utf-8">  
  <input type="hidden" name="conf_pdf" value="0">
  <input type="hidden" name="conf_lang" value="en">
  <input type="hidden" name="ReturnToSender" value="0">
   <input type="hidden" name="label__name" value="TmFtZQ==">
   <input type="hidden" name="label__email" value="RU1haWwgYWRkcmVzcw==">
   <input type="hidden" name="label__message" value="WW91ciBNZXNzYWdl">
   <input type="hidden" name="label__Files" value="RmlsZXM=">

  
<div class="form-group">
		<label for="name" class="control-label">Name</label>
		<input type="text" name="name" class="form-control" id="name" placeholder="" maxLength="100">
</div>

<div class="form-group">
		<label for="email" class="control-label">EMail address<span style="color: red;"> *</span></label>
		<input type="text" name="email" class="form-control" id="email" value="" maxLength="200" required oninvalid="this.setCustomValidity('Please enter your email address so that we can contact you.')"
	oninput="this.setCustomValidity('')" pattern="(?:[a-z0-9!#$%&amp;&apos;*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&amp;&apos;*+/=?^_`{|}~-]+)*|&quot;(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*&quot;)@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])">
</div>

<div class="form-group">
	<label for="message" class="control-label">Your Message<span style="color: red;"> *</span></label>
	<textarea id="message" class="form-control" name="message" rows="10" maxlength="500" required oninvalid="this.setCustomValidity('Please leave your message.')"
	oninput="this.setCustomValidity('')"></textarea><div id="the-count_message" style="font-family: inherit; font-style: inherit; float: right; padding: 0.1em 0 0 0; font-size: 0.95em;"><span id="current_message">0</span>
<span id="maximum_message"> / 500</span></div>

</div>
<br>

<div class="form-group">
	<label for="Files" class="control-label form-control-file">Files</label>
	<input id="Files" name="Files[]" multiple="multiple" class="input-file" type="file" >
</div>

<div class="form-group">
	<p style="color:red;">* mandatory information</p>
<hr>
</div>


<div class="form-group">
      <button type="submit" class="btn btn-success">Send Message</button>
      <button type="reset" class="btn btn-danger">Reset</button>
</div>
</form>

</div>
<br>


<script type="text/javascript">


</script>
<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>





</body>
<?php include "footer.php" ?>
</html>