<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>テンプレ</title>
	</head>
	<body>
		
		<?php

			require_once '_database_conf.php';
			require_once '_h.php';
			
			try
			{
			
				//作成（Create）
				
				$pro_name='だいこん';
				$pro_price='100';

				$db = new PDO($dsn, $dbUser, $dbPass);
				$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				$sql='INSERT INTO table3(name,price) VALUES (:namae, :nedan)';
				$stmt=$db->prepare($sql);
				$stmt->bindValue(':namae', $pro_name, PDO::PARAM_STR);
				$stmt->bindValue(':nedan', $pro_price, PDO::PARAM_INT);
				$stmt->execute();

				$db=null;

			
			}
			catch (Exception $e)
			{
				echo 'エラーが発生しました。内容: ' . h($e->getMessage());
	 			exit();
			}
		?>
		

	</body>
</html>