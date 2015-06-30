<!DOCTYPE html>
<html>
	<head>
		<title>OffTopic: a Web Widget for Mailing Lists</title>
		<link href="{{ url('/css/style.css') }}" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div class="container">
			<div id="contents">
				<h3>What</h3>

				<p>
					OffTopic is a very simple web widget generator for mailing lists.
				</p>

				<h3>How</h3>

				<p>
					Subscribe (n.b. do not "invite", just "subscribe". OffTopic do not sends confirmation mails) the address <strong>offtopic@madbob.org</strong> to your mailing list, and in your website include an iframe such as
					<pre><?php echo htmlentities('<iframe src="http://ot.madbob.org/w/$the_mail_address_of_your_mailing_list"></iframe>') ?></pre>
				</p>

				<h3>Which</h3>

				<p>
					The mailing list actually subscribed to OffTopic are:
				</p>

				<ul>
					@foreach($lists as $l)
					<li>{{ $l->address }}</li>
					@endforeach
				</ul>

				<h3>Who</h3>

				<p>
					This free service is implemented and operated by <a href="http://madbob.org/">Roberto Guido</a>. Code is <a href="https://github.com/madbob/offtopic">available</a> under the AGPLv3 license.
				</p>
			</div>
			<div id="sidebar">
				<img src="{{ url('/img/logo.png') }}">
			</div>
		</div>
	</body>
</html>
