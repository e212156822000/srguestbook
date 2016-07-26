<?php
session_start();
include("check_session.php");
if(isset($_SESSION["login"])) {
	if(check_session()) {
		header("Location:logout.php");
	}
}
?>
<!DOCTYPE html>
<html lang="zh-TW">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="pure.min.css">
	<link rel="stylesheet" type="text/css" href="main.css">
	<script src="jquery-1.11.3.min.js"></script>
	<title>留言板</title>
</head>
<script type="text/javascript" src="main.js"></script>

	
</script>
<body>
	<div id="SiteName">
		<a href="main.php">農場留言板</a>
		<a href="member.php"><img id="user_page" src="user_page1.png"></img></a>
		<a href="logout.php"><img id="logout" src="logout1.png"></img></a>
	</div>
	<div id="content">
		<?php include("show_post.php") ?>
		<div class="board">
			<div class="title">新增留言</div>
			<p class="post_content">
			<form method="post">
				<label>標題：</label><input type="text" name="title" id="title" /><br><br>
				<label>留言者：</label><?php echo $_SESSION['username'] ?><br><br>
				<label>留言內容：</label><br>
				<textarea rows="4" cols="50" name="comment" id="comment">
				</textarea>
				<input type="hidden" value=$_SESSION id="seed" />
				<br>
				<button id="submit" class="pure-button button-secondary">確認送出</button>
			</form>
			</p>
		</div>
	</div>	
	<div id="footer">
		@參考資料：配色網站、wiki。<br>
		@There is no copyright<br>
		@謝謝學長姐的教導，還有亞亭給我做網頁的指示。
	</div>

</body>

</html>