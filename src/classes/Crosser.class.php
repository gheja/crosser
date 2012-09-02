<?php // 3
	require_once(CROSSER_ROOT_DIR . "/classes/CrosserException.class.php");
	require_once(CROSSER_ROOT_DIR . "/classes/CrosserLib.class.php");
	
	class Crosser
	{
		private $accounts;
		private $routes;
		private $plugin_definitions; // kind of...
		
		public function __construct()
		{
			$this->plugin_definitions = array(
				"twitter" => array("classname" => "CrosserTwitter", "files" => array("/classes/CrosserTwitter.class.php")),
			);
		}
		
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
		
		public function DoThePrechecks()
		{
			foreach ($this->routes as $route_name => $route)
			{
				/* TODO: these checks could be moved to various methods, like AccountExists(), PluginExists(), ... */
				
				/* check the "from" account, before doing actual work */
				$from = $route['from'];
				
				if (!array_key_exists($this->accounts, $from['account']))
				{
					trhow new CrosserException("Account \"" . $from['account'] . "\" does not exist, it was referenced in route \"". $route_name "\" as \"from\".");
				}
				
				if (!array_key_exists($this->plugin_definitions, $this->accounts[$from['account']]['type']))
				{
					trhow new CrosserException("Could not find plugin definition for account type \"" . $this->accounts[$from['account']]['type'] . "\", referenced by account \"" . $from['account'] . "\", referenced in route \"". $route_name "\" as \"from\".");
				}
				
				/* check the "to" account(s), before doing actual work */
				foreach ($route['to'] as $to_id => $to)
				{
					if (!array_key_exists($this->accounts, $to['account']))
					{
						trhow new CrosserException("Account \"" . $to['account'] . "\" does not exist, it was referenced in route \"". $route_name "\" as \"to\".");
					}
					
					if (!array_key_exists($this->plugin_definitions, $this->accounts[$to['account']]['type']))
					{
						trhow new CrosserException("Could not find plugin definition for account type \"" . $this->accounts[$to['account']]['type'] . "\", referenced by account \"" . $to['name'] . "\", referenced in route \"". $route_name "\" as \"from\".");
					}
				}
			}
			
			return true;
		}
		
		public function DoTheWork()
		{
			if (!$this->DoThePrechecks())
			{
				throw new CrosserException("DoThePrechecks() returned false, something might be wrong."); // not a too informative message, hopefully will be never shown as every failure should throw an exception.
			}
			
			foreach ($this->routes as $route_name => $route)
			{
			}
		}
	}
?>
