<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="form.css">
    <link rel="shortcut icon" href="img/UniBlend logo.jpeg" type="image/x-icon">
    <title>Schedule Zoom Meeting</title>
</head>
<body>
    <style>
        body {
	font-family: Arial, sans-serif;
	background-color: #f2f2f2;
	padding: 20px;
}

.container {
	background-color: #fff;
	padding: 20px;
	border-radius: 5px;
	box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.row {
	display: flex;
	flex-wrap: wrap;
	margin-bottom: 20px;
}

.col {
	flex: 1;
	margin-right: 20px;
}

label {
	display: block;
	margin-bottom: 5px;
	font-weight: bold;
}

input[type="text"],
input[type="number"],
input[type="password"],
select {
	width: 100%;
	padding: 8px;
	border: 1px solid #ccc;
	border-radius: 5px;
	box-sizing: border-box;
	margin-bottom: 10px;
}

input[type="checkbox"] {
	margin-right: 10px;
}

.btn[type=".btn"],
.btn[type="submit"] {
	background-color: #4CAF50;
	color: white;
	padding: 10px 20px;
	border: none;
	border-radius: 5px;
	cursor: pointer;
	font-size: 16px;
	margin-bottom: 10px;
}

.btn[type=".btn"] {
	background-color: #f44336;
}

.btn[type=".btn"]:hover {
	background-color: #e53935;
}

.btn[type="submit"]:hover {
	background-color: #45a049;
}

input[type="datetime-local"] {
	padding: 8px;
	border: 1px solid #ccc;
	border-radius: 5px;
	box-sizing: border-box;
	margin-bottom: 10px;
	appearance: none;
	-webkit-appearance: none;
	background-color: #fff;
	padding-right: 35px;
}

input[type="datetime-local"]::-webkit-inner-spin-.btn,
input[type="datetime-local"]::-webkit-outer-spin-.btn {
	-webkit-appearance: none;
	margin: 0;
}

input[type="datetime-local"]::-webkit-calendar-picker-indicator {
	position: absolute;
	right: 0;
	top: 0;
	bottom: 0;
	width: 35px;
	background: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'><path d='M8 5h13v14H8V5zm4.57 5.07l10.34 10.34-2.83 2.83-10.34-10.34-2.83 2.83z' fill='%23666'/></svg>") no-repeat center right #999;
	cursor: pointer;
}

    </style>
	<div class="container">
        <h2>Schedule UniBlend Meeting</h2>
		<form action="#">
			<div class="row">
				<div class="col">
					<label for="meeting-title">Meeting Title:</label>
					<input type="text" id="meeting-title" name="meeting-title" required>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<label for="duration">Duration (minutes):</label>
					<input type="number" id="duration" name="duration" min="1" max="240" value="2" required>
				</div>
				<div class="col">
					<label for="start-time">Start Time:</label>
					<input type="datetime-local" id="start-time" name="start-time" required>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<label for="password">Password:</label>
					<input type="text" id="password" name="password" pattern="[0-9]{4}-[0-9]{2}-[0-9]{4}" required>
				</div>
				<div class="col">
					<label for="allow-join-before-host">Allow Join Before Host:</label>
					<input type="checkbox" id="allow-join-before-host" name="allow-join-before-host">
				</div>
			</div>
			<div class="row">
				<div class="col">
					<label for="host-video">Enable Host Video:</label>
					<input type="checkbox" id="host-video" name="host-video" checked>
				</div>
				<div class="col">
					<label for="participant-video">Enable Participant Video:</label>
					<input type="checkbox" id="participant-video" name="participant-video" checked>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<label for="auto-recording">Auto Recording:</label>
					<select id="auto-recording" name="auto-recording">
						<option value="none" selected>None</option>
						<option value="cloud">Cloud</option>
						<option value="local">Local</option>
					</select>
				</div>
				<div class="col">
					<label for="screen-share">Screen Share:</label>
					<input type="checkbox" id="screen-share" name="screen-share">
				</div>
			</div>
			<button type="submit" id="submit" name="submit" class="btn">Start</button>
		</form>
	</div>
</body>
</html>
