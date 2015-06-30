<html>
	<head>
		<style>
			* {
				margin: 0;
				padding: 0;
			}

			body {
				font-family: Helvetiva, sans-serif;
				font-size: 13px;
				padding: 10px;
			}

			div {
				padding: 7px;
			}

			div:not(:first-child) {
				border-top: 1px solid #BBB;
			}

			p {
				margin-top: 5px;
			}

			span {
				display: inline-block;
				width: 50%;
			}

			.date {
				text-align: right;
			}
		</style>
	</head>
	<body>
		@foreach($threads as $thread)
		<?php
		$latest = $thread->mails()->first();
		?>

		<div>
			<h4>{{ $thread->title }}</h4>
			<p>{{ $thread->mails()->count() }} messages</p>
			<p>Last from {{ $latest->contact->printableName() }}, {{ $latest->printableDate() }}</p>
		</div>
		@endforeach
	</body>
</html>
