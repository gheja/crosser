<?php
	class CrosserLib
	{
		static public function IsSafeFilename($filename)
		{
			return !preg_match('/\.\./', $filename);
		}
	}
?>