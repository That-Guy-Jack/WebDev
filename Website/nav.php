<?php 
function is_mobile() {
    if (empty($_SERVER['HTTP_USER_AGENT'])) {
        $is_mobile = false;
    } else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') !== false
        // many mobile devices (all iPhone, iPad, etc.)
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Android') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Silk/') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Kindle') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mobi') !== false) {
        $is_mobile = true;
    } else {
        $is_mobile = false;
    }
    return $is_mobile;
}

if (is_mobile()) {
			echo '
			<div class="mnav">
			<img class="nav-logo" src="https://hotbeans.net/img/logo.svg"></img>
			<a href="https://hotbeans.net/">Home</a>
			<a href="https://hotbeans.net/who">Who are we</a>
			<a href="https://hotbeans.net/portfolios">Portfolios</a>
			<a href="https://hotbeans.net/contact-us">Contact Us</a>
			<a class="nav-login" href="https://hotbeans.net/account">Login/Register</a>
		  </div>';
		} else {
			echo '
			<div class="nav">
			<img class="nav-logo" src="https://hotbeans.net/img/logo.svg"></img>
			<a href="https://hotbeans.net/">Home</a>
			<a href="https://hotbeans.net/who">Who are we</a>
			<a href="https://hotbeans.net/portfolios">Portfolios</a>
			<a href="https://hotbeans.net/contact-us">Contact Us</a>
			<a class="nav-login" href="https://hotbeans.net/account">Login/Register</a>
		  </div>';
		}	
?>