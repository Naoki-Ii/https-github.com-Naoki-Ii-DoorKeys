<?php
require_once ('/Users/nk/github/DoorKeys/conf.php');
require_once ('/Users/nk/github/DoorKeys/function.php');

session_start();

$user_name = $_SESSION["NAME"];
$email = $_SESSION["EMAIL"];
$session_password = $_SESSION["PASSWORD"];
$user_task = $_SESSION["TASK"];
$user_img = $_SESSION["IMG"];

//ログインしていない場合　ログイン画面にリダイレクト
if (!isset($_SESSION["EMAIL"]) || (!isset($_SESSION["NAME"]))) {
  header('Location: http://localhost:8888/login.php');
  exit();
}

if($_SESSION["pc_exprience"] === '' || isset($_SESSION["pc_exprience"]) === FALSE){
  header('Location: http://localhost:8888/question.php');
  exit();
}

$post = get_request_method();
if($post === 'POST'){
  $hobby = get_post_data('hobby');

  if($hobby === 'illustration'){
    $_SESSION["hobby"] = 'a';
  }else if($hobby === 'game'){
    $_SESSION["hobby"] = 'b';
  }else if($hobby === 'puzzle'){
    $_SESSION["hobby"] = 'c';
  }else if($hobby === 'math'){
    $_SESSION["hobby"] = 'd';
  }else if($hobby === 'education'){
    $_SESSION["hobby"] = 'e';
  }else if($hobby === 'degign'){
    $_SESSION["hobby"] = 'f';
  }


}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UFT-8">
  <title>ARG新人用掲示板-Doorkey's-</title>
  <link rel="stylesheet" href="Style/stylesheet.css">
</head>
<body>
  <header>
      <p id="logo_img"><a href="index.php"><img src="Images/logo-image.png"></a></p>
      <div class="login-text">
        <img src="<?php echo entity_str($user_img); ?>" alt="user_img">
        <?php echo 'ようこそ  '. entity_str($user_name). '  さん';?>
        <a href="logout.php">ログアウトはこちら</a>
      </div>
  </header>
  <main>
   <div class="big-container">
     <div class="main-container">
       <a href="index.php">
         <div class="side-box">
           <p>HOME</p>
         </div>
       </a>
       <a href="friend.php">
         <div class="side-box">
           <p>同期</p>
         </div>
       </a>
       <a href="bbs.php">
         <div class="side-box">
           <p>広場</p>
         </div>
       </a>
       <a href="question.php">
       <div class="side-box">
         <p>アンケート</p>
       </div>
       </a>
       <a href="setting.php">
         <div class="side-box">
           <p>設定</p>
         </div>
       </a>
    </div>
   <div class="sub-container">
     <div class="question-list">
       <form action="6difficulty.php" method="post">
         <h1>Q:どちらかというと自分の作品（成果物）を多くの人に見てもらいたい</h1>
         <input type="radio" name="self_reveal" value="true" checked>
         <label>そう思う</label>
         <input type="radio" name="self_reveal" value="false">
         <label>まったく思わない</label>
        <button type="submit" name="button">次へ</button>
       </form>
     </div>
   </div>
 </div>
 </main>

 <footer>
   <p>copyright(c) & Debeloped  by ARG-ARQ:I.i K.k</p>
 </footer>
</body>
</html>