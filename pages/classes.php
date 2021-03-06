<?php
class user{
	private $UserName,$UserMail,$UserPassword;
	
	// Verkrijg UserID
	public function getUserId(){
		return $this->UserId;
	}
	public function setUserId($UserId){
		$this->UserId=$UserId;
	}

	// Verkrijg Username
	public function getUserName(){
		return $this->UserName;
	}
	public function setUserName($UserName){
		$this->UserName=$UserName;
	}

	// Verkrijg UserMail
	public function getUserMail(){
		return $this->UserMail;
	}
	public function setUserMail($UserMail){
		$this->UserMail=$UserMail;
	}

	// Verkrijg Userpassword
	public function getUserPassword(){
		return $this->UserPassword;
	}
	public function setUserPassword($UserPassword){
		$this->UserPassword=$UserPassword;
	}
	
	// Inser new user table
	public function InsertUser(){
		include "connection.php";
		$req=$bdd->prepare("INSERT INTO users (UserName,UserMail,UserPassword) VALUES (:UserName,:UserMail,:UserPassword)");
		$req->execute(array(
			'UserName'=>$this->getUserName(),
			'UserMail'=>$this->getUserMail(),
			'UserPassword'=>$this->getUserPassword()
		));	
	}
	
	public function UserLogin(){
		include "connection.php";
		$req=$bdd->prepare("SELECT * FROM users WHERE UserMail=:UserMail AND UserPassword=:UserPassword");
		
		$req->execute(array(
			'UserMail'=>$this->getUserMail(),
			'UserPassword'=>$this->getUserPassword()
		));
		if($req->rowCount()==0){
			header("Location: ../index.php?error=1");
			return false;
		}else{
			while($data=$req->fetch()){
				$this->setUserId($data['UserId']);
				$this->setUserName($data['UserName']);
				$this->setUserPassword($data['UserPassword']);
				$this->setUserMail($data['UserMail']);
				header("Location: ../home.php");
				return true;
			}
		}
	}
}

class chat{
	private $ChatId,$ChatUserId,$ChatText;
	
	public function getChatId(){
		return $this->ChatId;
	}
	public function setChatId($ChatId){
		$this->ChatId = $ChatId;
	}
	
	public function getChatUserId(){
		return $this->ChatUserId;
	}
	public function setChatUserId($ChatUserId){
		$this->ChatUserId = $ChatUserId;
	}
	
	public function getChatText(){
		return $this->ChatText;
	}
	public function setChatText($ChatText){
		$this->ChatText = $ChatText;
	}
	
	public function InsertChatMessage(){
		include "connection.php";
		
		$req=$bdd->prepare("INSERT INTO chats(ChatUserId, ChatText) VALUES(:ChatUserID,:ChatText)");
		echo $req->execute(array(
			'ChatUserID'=>$this->getChatUserId(),
			'ChatText'=>$this->getChatText()
		));
	}
	
	public function DisplayMessage(){
		include "connection.php";
		$ChatReq=$bdd->prepare("SELECT * FROM chats ORDER BY ChatId DESC");
		$ChatReq->execute();
		
		while($DataChat= $ChatReq->fetch()){
			$UserReq=$bdd->prepare("SELECT * FROM users WHERE UserId =:UserId");
			$UserReq->execute(array(
				'UserId'=>$DataChat['ChatUserId']
			));
			$DataUser = $UserReq->fetch();
			?>
            <span class="UserNameS"><?php echo $DataUser['UserName']; ?></span> says:<br/>
           <span class="ChatMessageS"><?php echo $DataChat['ChatText']; ?></span><br/>
			<?php
		}
	}
}
?>












