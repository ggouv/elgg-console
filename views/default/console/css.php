#elgg-console {
	left: 40%;
	min-width: 372px;
	position: fixed;
	top: 25%;
	z-index: 9999;
}
#elgg-console-code {
	cursor: move;
	background-color: rgba(50, 50, 50, 0.8);
	border-radius: 6px 6px 6px 6px;
	box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.5);
	padding: 5px;
	overflow: hidden;
	position: relative;
}
#elgg-console-code .elgg-head {
	background-color: rgba(30, 30, 30, 0.8);
	margin: -5px -5px 5px;
	padding-bottom: 5px;
}
#elgg-console-code .elgg-head h3 {
	color: #666666;
	float: left;
	padding: 4px 30px 0 5px;
}
#elgg-console-code .elgg-head a {
	cursor: pointer;
	display: inline-block;
	height: 18px;
	position: absolute;
	right: 5px;
	top: 5px;
	width: 18px;
}
#elgg-console-code .elgg-input-plaintext {
	float: left;
	min-width: 372px;
	background-color: rgba(255, 255, 255, 0.2);
	color: white;
}
#elgg-console-code textarea:focus {
	border: 1px solid red;
}
#elgg-console-code .elgg-button-submit {
	float: left;
	clear: both;
	background: #BB0000;
	border-color: red;
}
#elgg-console-code .toggle-button {
	float: right;
	margin-top: 6px;
}

#elgg-console-response {
	display: none;
	background-color: white;
	box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.5);
	margin: 0 3%;
	width: 94% !important;
	position: relative;
	z-index: -1;
	overflow: hidden;
	height: 43px;
	padding-bottom: 11px;
}
#elgg-console-response .response {
	overflow: auto;
	height: 100%;
}
#elgg-console-response #handle {
	background-color: #F5F5F5;
	color: #999999;
	cursor: ns-resize;
	font-size: 100%;
	line-height: 11px;
	overflow: hidden;
	text-align: center;
	position: absolute;
	bottom: 0;
	width: 100%;
}
.entity_scanner_over {
	border: 2px red solid !important;
}