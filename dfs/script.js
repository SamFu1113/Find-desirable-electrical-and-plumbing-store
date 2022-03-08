// JavaScript Document
 $(function(){
        })
        function openDialog(){
            document.getElementById('light').style.display='block';
            document.getElementById('fade').style.display='block'
        }
        function closeDialog(){
            document.getElementById('light').style.display='none';
            document.getElementById('fade').style.display='none'
        }
		function changeDialog()
		{
			
			
			document.getElementById('light').innerHTML=
			'<form method="post" action="register.php">'
			+'账  户：'
			+'<input type="text" name="username"><br/><br/>'
			+'密  码：'
			+'<input type="password" name="password"><br/><br/>'
			+'密码确认：'
			+'<input type="password" name="password2">'
			+'<input type="submit" value="注册" name="sub">'
			+'</form>'+'<a href = "javascript:void(0)" onclick = "closeDialog()">點這裏關閉本窗口</a>';
			
		}
			
			
			
			
