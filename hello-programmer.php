<?php
/**
 * @package Hello_Programmer
 * @version 1.1.0
 */
/*
Plugin Name: Hello Programmer
Plugin URI: http://wordpress.org/plugins/hello-programmer/
Description: This is not just a plugin. It will add wisedom to your dashborad with randorm Programming Quotes.
Author: Sabbir Hasan
Version: 1.1.0
Author URI: https://iamsabbir.dev
*/

function hello_programmer_get_wisedom() {
	/** These are the wisedom to Hello Programmer */

	$wisedom = array(
		[
			'text' => "Programming isn't about what you know; it's about what you can figure out.",
			'author' => "Chris Pine"
		],
		[
			'text' => "The only way to learn a new programming language is by writing programs in it.",
			'author' => "Dennis Ritchie"
		],
		[
			'text' => "Sometimes it's better to leave something alone, to pause, and that's very true of programming.",
			'author' => "Joyce Wheeler"
		],
		[
			'text' => "Testing leads to failure, and failure leads to understanding.",
			'author' => "Burt Rutan"
		],
		[
			'text' => "The best error message is the one that never shows up.",
			'author' => "Thomas Fuchs"
		],
		[
			'text' => "The most damaging phrase in the language is.. it's always been done this way",
			'author' => "Grace Hopper"
		],
		[
			'text' => "Don't write better error messages, write code that doesn't need them.",
			'author' => "Jason C. McDonald"
		],
		[
			'text' => "Any fool can write code that a computer can understand. Good programmers write code that humans can understand.",
			'author' => "Martin Fowler"
		],
		[
			'text' => "First, solve the problem. Then, write the code.",
			'author' => "John Johnson"
		],
		[
			'text' => "Experience is the name everyone gives to their mistakes.",
			'author' => "Oscar Wilde"
		],
		[
			'text' => "In order to be irreplaceable, one must always be different",
			'author' => "Coco Chanel"
		],
		[
			'text' => "Java is to JavaScript what car is to Carpet.",
			'author' => "Chris Heilmann"
		],
		[
			'text' => "Sometimes it pays to stay in bed on Monday, rather than spending the rest of the week debugging Monday’s code.",
			'author' => "Dan Salomon"
		],
		[
			'text' => "Perfection is achieved not when there is nothing more to add, but rather when there is nothing more to take away.",
			'author' => "Antoine de Saint-Exupery"
		],
		[
			'text' => "Ruby is rubbish! PHP is phpantastic!",
			'author' => "Nikita Popov"
		],
		[
			'text' => "Code is like humor. When you have to explain it, it’s bad.",
			'author' => "Cory House"
		],
		[
			'text' => "Fix the cause, not the symptom.",
			'author' => "Steve Maguire"
		],
		[
			'text' => "Optimism is an occupational hazard of programming: feedback is the treatment.",
			'author' => "Kent Beck"
		],
		[
			'text' => "When to use iterative development? You should use iterative development only on projects that you want to succeed.",
			'author' => "Martin Fowler"
		],
		[
			'text' => "Simplicity is the soul of efficiency.",
			'author' => "Austin Freeman"
		],
		[
			'text' => "Before software can be reusable it first has to be usable.",
			'author' => "Ralph Johnson"
		],
		[
			'text' => "Make it work, make it right, make it fast.",
			'author' => "Kent Beck"
		],
	);

	// And then randomly choose a wisedom.
	return $wisedom[array_rand($wisedom)];
}

// This just echoes the chosen wisedom, we'll position it later.
function hello_programmer() {
	$chosen = hello_programmer_get_wisedom();
	// var_dump($chosen);
	$lang   = '';
	if ( 'en_' !== substr( get_user_locale(), 0, 3 ) ) {
		$lang = ' lang="en"';
	}

	printf(
		'<p id="hello-programmer"><span class="screen-reader-text">%s </span><span dir="ltr"%s>"%s" - %s</span></p>',
		__( 'Random Wisedom:' ),
		$lang,
		$chosen['text'],
		$chosen['author']
	);
}

// Now we set that function up to execute when the admin_notices action is called.
add_action( 'admin_notices', 'hello_programmer' );

// We need some CSS to position the paragraph.
function hello_programmer_css() {
	echo "
	<style type='text/css'>
	#hello-programmer {
		float: right;
		max-width: 600px;
    	text-align: center;
		padding: 5px 10px;
		margin: 0;
		font-size: 12px;
		line-height: 1.6666;
	}
	.rtl #hello-programmer {
		float: left;
	}
	.block-editor-page #hello-programmer {
		display: none;
	}
	@media screen and (max-width: 782px) {
		#hello-programmer,
		.rtl #hello-programmer {
			float: none;
			padding-left: 0;
			padding-right: 0;
		}
	}
	</style>
	";
}

add_action( 'admin_head', 'hello_programmer_css' );
