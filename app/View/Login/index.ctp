<?php ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Login</title>    
    <?php 
        echo $this->Html->css('Form');
        echo $this->Html->css('login');
        echo $this->Html->script('jquery-1.9.1');
    ?>
    <script type="text/javascript">
        function IsEmail(email) {
            var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
			return pattern.test(email);
        }
        function checkValidatte(form) {
            $("#txtEmail").css("border", "1px #ddd solid");
            $("#txtPass").css("border", "1px #ddd solid");
            var msg = new Array(
                "<?php echo __("msgNotValidate"); ?>",
                "<?php echo __("msgNotNull"); ?>"
            );
            i = 1;
            html = "";
            if ($("#txtCode").val() == ""){
                $("#txtCode").css("border", "2px Orange solid");
                html += "<div class='errtext'>" + (i++) + ". Code "+msg[0]+"</div>";
            }
            if (IsEmail($("#txtEmail").val()) != true && $("#txtEmail").val() != "") {
                $("#txtEmail").css("border", "2px Orange solid");
                html += "<div class='errtext'>" + (i++) + ". Email "+msg[0]+"</div>";
            }
            if ($.trim($("#txtEmail").val()) == "") {
                $("#txtEmail").css("border", "2px Orange solid");
                html += "<div class='errtext'>" + (i++) + ". Email "+msg[1]+"</div>";
            }
            if ($.trim($("#txtPass").val()) == "") {
                $("#txtPass").css("border","2px Orange solid");
                html += "<div class='errtext'>" + (i++) + ". Password "+msg[1]+"</div>";
            }
            
            if (html != "") {
                $("#validate").html(html);
            }
            else $("#frmLogOn").submit();            
        }
        function ddlLanguage_selected(){
            window.location.href =$("#ddlLanguage").val();
        }
        
    </script>
</head>
<body>
    <div class="logOnContent">   
        <div class="title"><?php echo __('login.title'); ?></div>
        <div class="subTitle">
            <?php echo __('login.sologan'); ?>            
        </div>
		<?php echo __(@$error); ?>
        <div class="boxLogon">
            <form method="post" action="login.php" name="frm" id="frmLogOn">
                <div class="label"><?php echo __('Language'); ?>:</div>
                <div style="margin-left: 5px;">                        
                    <select class="ddlLanguage txt" id="ddlLanguage" onchange="return ddlLanguage_selected();">
                        <?php 
                            foreach ($lstLanguage as $key=> $value){ 
                                if($key!='default'){
                        ?>
                        <option value="<?php echo $this->Html->url("/login/",true).@$value['id']; ?>" <?php echo @$lang==$value['id']? 'selected':''; ?> ><?php echo @$value['name']?></option>
                        <?php                         
                                } 
                            }
                        ?>
                    </select>                        
                </div>
                <div class="label"><?php echo __('Code'); ?></div>
                <div class="Controls"><input type="text" class="txt" id="txtCode" disabled  name="txtCode" style="width:260px;" value="<?php echo @$code; ?>"/></div>
                <div class="label"><?php echo __('Email'); ?></div>
                <div class="Controls"><input type="text" class="txt" id="txtEmail" name="txtEmail" style="width:260px;" /></div>
                <div class="label"><?php echo __('Password'); ?></div>
                <div class="Controls"><input type="password" class="txt" id="txtPass" name="txtPass" style="width:260px;" /></div>
                <div class="actionbutton">
                    <input type="submit" class="btn" id="summit" name="btnSubmit" value="<?php echo __('Login'); ?>" onclick="checkValidatte(this);return false;"/>                    
                </div>
                <div id="validate"></div>
                <div class="logOnMore">
                    <a href="#"><?php echo __('login.forgotPass'); ?></a>
                </div>
            </form>            
        </div>
    </div>
</body>
</html>