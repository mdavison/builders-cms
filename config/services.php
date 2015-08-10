<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Third Party Services
	|--------------------------------------------------------------------------
	|
	| This file is for storing the credentials for third party services such
	| as Stripe, Mailgun, Mandrill, and others. This file provides a sane
	| default location for this type of information, allowing packages
	| to have a conventional place to find your various credentials.
	|
	*/

	'mailgun' => [
		'domain' => 'sandbox066304b2d82647ca90e3cdb76bb9f36d.mailgun.org',
		'secret' => 'key-502a9aea4a186f0b2a9d4b0c7dbcd77c',
	],

	'mandrill' => [
		'secret' => 'pXlvXdxSlEbarM2hT4SqwQ',
	],

	'ses' => [
		'key' => '',
		'secret' => '',
		'region' => 'us-east-1',
	],

	'stripe' => [
		'model'  => 'User',
		'secret' => '',
	],

];
