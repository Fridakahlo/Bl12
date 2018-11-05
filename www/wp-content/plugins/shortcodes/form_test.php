<?php
/*
* Plugin Name: Shortcodes

* Description: Create your WordPress shortcode.
* Version: 1.0
* Author: InkThemes
* Author URI: https://inkthemes.com
*/

function form_creation(){

if(isset($_POST['submitted'])) {
	if(trim($_POST['contactName']) === '') {
		$nameError = 'Please enter your name.';
		$hasError = true;
	} else {
		$name = trim($_POST['contactName']);
	}

	if(trim($_POST['email']) === '')  {
		$emailError = 'Please enter your email address.';
		$hasError = true;
	} else if (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['email']))) {
		$emailError = 'You entered an invalid email address.';
		$hasError = true;
	} else {
		$email = trim($_POST['email']);
	}

	if(trim($_POST['comments']) === '') {
		$commentError = 'Please enter a message.';
		$hasError = true;
	} else {
		if(function_exists('stripslashes')) {
			$comments = stripslashes(trim($_POST['comments']));
		} else {
			$comments = trim($_POST['comments']);
		}
	}

	if(!isset($hasError)) {
		$emailTo = get_option('admin_email');

		$subject = '[PHP Snippets] From '.$name;
		$body = "Name: $name \n\nEmail: $email \n\nComments: $comments";
		$headers = 'From: '.$name.' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;

		wp_mail($emailTo, $subject, $body, $headers);
		$emailSent = true;
	
	if(isset($emailSent) && $emailSent == true) { ?>
		<div class="thanks">
			<p><?php _e('Thanks, your email was sent successfully','bl12');?>.</p>
		</div>
<?php } else { ?>
	<?php if(isset($hasError) || isset($captchaError)) { ?>
		<p class="error">Sorry, an error occured.<p>
	<?php } ?>
	}

} ?>
	<form action="<?php the_permalink(); ?>" id="adhsform" method="post">
	<ul>
		<li>
			<label for="contactName">Name:</label>
			<input type="text" name="contactName" id="contactName" value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>" class="required requiredField" />
			<?php if($nameError != '') { ?>
				<span class="error"><?=$nameError;?></span>
			<?php } ?>
		</li>

		<li>
			<label for="email">Email</label>
			<input type="text" name="email" id="email" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>" class="required requiredField email" />
			<?php if($emailError != '') { ?>
				<span class="error"><?=$emailError;?></span>
			<?php } ?>
		</li>	

		<li><label for="commentsText">Message:</label>
			<textarea name="comments" id="commentsText" rows="20" cols="30" class="required requiredField"><?php if(isset($_POST['comments'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['comments']); } else { echo $_POST['comments']; } } ?></textarea>
			<?php if($commentError != '') { ?>
				<span class="error"><?=$commentError;?></span>
			<?php } ?>
		</li>

		<li>
			<input type="submit">Send email</input>
		</li>
	</ul>
		<input type="hidden" name="submitted" id="submitted" value="true" />
	</form>
				
<?php
}
add_shortcode('test', 'form_creation');
?>