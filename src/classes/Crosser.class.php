<?php // 2
	require_once(CROSSER_ROOT_DIR . "/classes/CrosserException.class.php");
	require_once(CROSSER_ROOT_DIR . "/classes/CrosserLib.class.php");
	
	class Crosser
	{
		private $accounts;
		private $routes;
		
		private function SetAccounts($accounts)
		{
			$this->accounts = $accounts;
		}
		
		private function SetRoutes($routes)
		{
			$this->routes = $routes;
		}
		
		public function LoadConfig($profile = "default")
		{
			$filename = "./config/config." . $profile . ".php";
			if (!CrosserLib::IsSafeFilename($filename))
			{
				throw new CrosserException("Invalid config: wrong filename.");
			}
			
			if (!is_file($filename) || !is_readable($filename))
			{
				throw new CrosserException("Invalid config: file is not readable or does not exist.");
			}
			
			require($filename);
			
			$this->SetAccounts($accounts);
			$this->SetRoutes($routes);
		}
		
		public function DoTheWork()
		{
			
		}
	}
?>