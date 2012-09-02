<?php
	require_once(CROSSER_ROOT_DIR . "/classes/CrosserBase.class.php");
	
	class CrosserTwitter extends CrosserBase
	{
		public function IsReadSupported()
		{
			return true;
		}
		
		public function IsWriteSupported()
		{
			return false;
		}
		
		public function IsAuthenticated()
		{
			return $this->session != null;
		}
		
		public function Authenticate($credentials)
		{
			
		}
		
		public function Search($filters = null);
		public function FetchResult();
		public function FetchAllResults();
		public function Post($data);
		public function Deauthenticate();
	}
?>