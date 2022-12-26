<?php

class UserTest extends \PHPUnit\Framework\TestCase
{


	protected $user;
	public function testUserName()
	{
		$user = new \App\Models\User;

		$user->setusername('manjurulomi');
		$this->assertEquals($user->getUsername(), 'manjurulomi');

	}

	public function testFirstAndLastName()
	{
		$user = new \App\Models\User;

		$user->setFirstName('manjurul');

		$user->setLastName('omi');

		$this->assertEquals($user->getFirstName(), 'manjurul');

		$this->assertEquals($user->getLastName(), 'omi');
	}


	public function testNumberOfPost()
	{
		$user = new \App\Models\User;

		$user->setnum_posts('2');

		$this->assertEquals($user->getNumPosts(), '2');
	}
	public function testProfilePictureCanBeGet()
	{
		$user = new \App\Models\User;

		$user->setProfile_pic('omi.png');

		$this->assertEquals($user->getProfilePic(), 'omi.png');
	}
	public function testUserIsCLosedOrNot()
	{
		$user = new \App\Models\User;

		$user->setUserclosed('no');

		$this->assertEquals($user->getProfilePic(), false);
	}
	public function testUserIsFriendOrNot()
	{
		$user = new \App\Models\User;
		
		$username_to_check= 'manjurul';
		$friendlist= ['manjurul','iftekhar', 'momojo'];
	

		$this->assertEquals($user->isFriend($username_to_check,$friendlist), true);
	}
	public function testIfThereIsFriendReqFrom()
	{
		$user = new \App\Models\User;	
		$username= 'Xenon';
		$request_list= ['manjurul','iftekhar', 'momojo'];
		$this->assertEquals($user->didReceiveRequest($username,$request_list), true);
	}
	public function testIfThereIsFriendReqTo()
	{
		$user = new \App\Models\User;	
		$username= 'manjurul';
		$request_list= ['manjurul','iftekhar', 'momojo'];
		$this->assertEquals($user->didSendRequest($username,$request_list), true);
	}
	public function testIfSendFriendReqWorks()
	{
		$user = new \App\Models\User;	
		$username= 'manjurul';
		$this->assertEquals($user->sendRequest($username), true);
	}
	public function testIfremoveFriendWorks()
	{
		$user = new \App\Models\User;
		$user_to_remove_index= 1;
		$request_list= ['manjurul','iftekhar', 'momojo'];	
		$After_remove_request_list= ['manjurul', 'momojo'];			
		$this->assertEquals($user->removeFriend($user_to_remove_index,$request_list), $After_remove_request_list);
	}
	public function testGetFriendArrayWorks()
	{
		$user = new \App\Models\User;
		$request_list= ['manjurul','iftekhar', 'momojo'];	
		$user->setFriendArray($request_list);

		$this->assertEquals($user->getFriendArray(), $request_list);
	}
	public function testNumberOFfriendReq()
	{
		$user = new \App\Models\User;
		$request_list= ['manjurul','iftekhar', 'momojo'];	
		$arrlength = count($request_list);
		$user->setFriendArray($request_list);

		$this->assertEquals($user->getNumberOfFriendRequests($request_list), $arrlength);
	}

	
}