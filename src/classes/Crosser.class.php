<?php
	class Crosser
	{
		private $accounts;
		private $routes;
		
		function SetAccounts($accounts)
		{
			$this->accounts = $accounts;
		}
		
		function SetRoutes($routes)
		{
			$this->routes = $routes;
		}
		
		function LoadConfig($profile = "default")
		{
			$filename = "./config/config." . $profile . ".php";
			if (!is_safe_filename($filename))
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
		
		function DoTheWork()
		{
			
		}
	}
?>