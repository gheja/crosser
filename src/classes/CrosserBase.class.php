<?php // 1
	class CrosserBase
	{
		public function IsReadSupported();
		public function IsWriteSupported();
		public function IsAuthenticated();
		
		public function Authenticate($credentials);
		public function Search($filters = null);
		public function FetchResult();
		public function FetchAllResults();
		public function Post($data);
		public function Deauthenticate();
	}
?>