<html>
	<head>
		<style>
			* {
				margin: 0;
				padding: 0;
			}

			body {
				font-family: Helvetiva, sans-serif;
				padding: 10px;
			}

			div {
				padding: 5px;
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
			<h3>{{ $thread->title }}</h3>
			<p><span class="name">{{ $latest->contact->printableName() }}</span><span class="date">{{ $latest->printableDate() }}</span></p>
		</div>
		@endforeach
	</body>
</html>