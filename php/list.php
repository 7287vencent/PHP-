<?php
//防跳墙，需要在登录后的每个页面上包含
require('check_login.php');
//echo "<p>{$_SESSION['username']}，你好！<a href='logout.php'>注销</a></p>"
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>用户列表</title>
    <style>
        table{
            width:60%;
            border-collapse: collapse;
        }
        table,th,td{
			border: black solid;
			font-weight: bolder;
			color: #ffb900;
        }
		body{
			background-image: url(images/y_IMG_5771.jpg);
			background-size: 100%;
			
		}
		table{
			text-align: center;
			font-size: 25px;
			position: relative;
			left: 280px;
		}
		.guanli{
			position: relative;
			left: 550px;
		}
    </style>
</head>
<body>
	 <p class ="p1" style=" font-size: 25px; color: #fff6a1; text-align: center;"><?=$_SESSION['username']?>，你好！<a href='logout.php' style=" text-decoration: none; text-align: center; font-size: 22px; color:white;">注销</a></p>

	<div class="guanli">
		<input type="button" value="读者信息管理" onclick="reader()" style="font-size: 20px;font-weight:bolder">
    	<input type="button" value="作者信息管理" onclick="author()" style="font-size: 20px;font-weight: bolder">
	</div>
    <div class="reader" id="reader">

        <?php
    require('cn.php');
    $sql="select * from reader";
    $sql_au="select * from author";
    ?>
    <table>
        <caption style="font-weight: bolder">读者列表</caption>
        <thead>
            <tr>
                <th>姓名</th>
                <th>性别</th>
                <th>联系电话</th>
                <th>个人简介</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pdo->query($sql) as $value) {?>
            <tr>
                <td><?=$value['rd_name']?></td>
                <td><?=$value['rd_sex']?></td>
                <td><?=$value['rd_phone']?></td>
                <td><?=$value['rd_introduce']?></td>  
                <td><a href="root_reader_edit.php?id=<?=$value['rd_id']?>">修改</a>
                 <a href="root_reader_del.php?id=<?=$value['rd_id']?>" onclick="return del_comfirm();">删除</a></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    </div>
    
    <div class="author" id="author" style="display: none;" >
        <table>
        <caption>作者列表</caption>
        <thead>
            <tr>
                <th>姓名</th>
                <th>性别</th>
                <th>联系电话</th>
                <th>个人简介</th>
                 <th>操作</th>
            </tr>
        </thead>

         <tbody>
            <?php foreach ($pdo->query($sql_au) as $value) {?>
            <tr>
                <td><?=$value['au_name']?></td>
                <td><?=$value['au_sex']?></td>
                <td><?=$value['au_phone']?></td>
                <td><?=$value['au_introduce']?></td>  
                  <td><a href="root_author_edit.php?id=<?=$value['au_id']?>">修改</a>
                 <a href="root_author_del.php?id=<?=$value['au_id']?>" onclick="return del_comfirm();">删除</a></td>
            </tr>
            <?php } ?>
        </tbody>

    </table>

    </div>
    <script>
        function reader()
        {
            document.getElementById('reader').style.display='block';
            document.getElementById('author').style.display='none';   
        }

        function author()
        {
            // alert("adsfasdf");
            document.getElementById('author').style.display='block';   
            document.getElementById('reader').style.display='none';
        }


        function del_comfirm(){
            if (confirm('是否确认删除？')) {
                return true;
            }else{
                return false;
            }
        }
    </script>
</body>
</html>